<?php

namespace DivLooper\ElasticAPMBundle;

use PhilKra\Agent;

class ElasticAPMAgent
{
    public $agent;

    public function __construct(array $config)
    {
        $this->agent = new Agent([
            'appName' => $config['app_name'],
            'appVersion' => $config['app_version'],
            'serverUrl' => $config['elastic_apm_server'],
            'secretToken' => $config['secret_token'],
        ]);
    }
}
