# Elastic APM Symfony Bundle

## Installation 

#### Step 1: Download DivLooperElasticAPMBundle using composer
Require the bundle with composer:
```
$ composer require divlooper/elastic-apm-bundle
```
#### Step 2: Enable the bundle
Enable the bundle in the `bundles.php` config file:

```php
<?php
// config/bundle.php

return [
    // ...
    DivLooper\ElasticAPMBundle\DivLooperElasticAPMBundle::class => ['all' => true],
    // ...
];

```

#### Step 3: Configure DivLooperElasticAPMBundle 
Add the following configuration to config/packages/div_looper_elastic_apm.yaml file.

```yaml
div_looper_elastic_apm:
    app_name: 'My Symfony Project'
    app_version: '1.0'
    elastic_apm_server: 'http://127.0.0.1:8200'
    secret_token: 'x0x0x0x0x0x'
```
