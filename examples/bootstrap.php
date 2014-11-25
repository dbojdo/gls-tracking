<?php
require __DIR__.'/../vendor/autoload.php';

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use Webit\GlsTracking\Api\Factory\SoapClientFactory;
use Webit\GlsTracking\Api\Factory\TrackingApiFactory;

AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__.'/../vendor/jms/serializer/src'
);

$serializer = SerializerBuilder::create()->build();
$clientFactory = new SoapClientFactory();
$apiFactory = new TrackingApiFactory($clientFactory, $serializer);

return $apiFactory;
