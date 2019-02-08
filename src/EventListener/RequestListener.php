<?php

namespace DivLooper\ElasticAPMBundle\EventListener;

use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;
use DivLooper\ElasticAPMBundle\ElasticAPMAgent;

class RequestListener
{
    private $confog;
    private $apm;

    public function __construct(ElasticAPMAgent $elasticAPMAgent)
    {
        $this->apm = $elasticAPMAgent;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (HttpKernel::MASTER_REQUEST != $event->getRequestType()) {
            return;
        }

        $routeName = $event->getRequest()->get('_route');
        $controllerName = $event->getRequest()->get('_controller');

        $this->apm->agent->startTransaction(sprintf('%s (%s)', $controllerName, $routeName));
    }

    public function onKernelTerminate(PostResponseEvent $event)
    {
        if (HttpKernel::MASTER_REQUEST != $event->getRequestType()) {
            return;
        }

        $routeName = $event->getRequest()->get('_route');
        $controllerName = $event->getRequest()->get('_controller');

        $this->apm->agent->stopTransaction(sprintf('%s (%s)', $controllerName, $routeName));
        $this->apm->agent->send();
    }
}
