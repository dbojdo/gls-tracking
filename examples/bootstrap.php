<?php
use Doctrine\Common\Annotations\AnnotationRegistry;
use Webit\GlsTracking\Api\Factory\TrackingApiFactory;
use Webit\GlsTracking\Model\UserCredentials;

$loader = include __DIR__.'/../vendor/autoload.php';
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

if (is_file(__DIR__ .'/config.php') == false) {
    throw new \LogicException(
        'Missing required file "examples/config.php". Create it base on "examples/config.php.dist".'
    );
}

$config = require __DIR__ .'/config.php';

$apiFactory = new TrackingApiFactory();

$credentials = new UserCredentials($config['username'], $config['password']);

return $apiFactory;
