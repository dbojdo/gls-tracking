<?php
require __DIR__.'/../vendor/autoload.php';

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use Webit\SoapApi\SoapClient\SoapClientFactory;
use Webit\GlsTracking\Api\Factory\TrackingApiFactory;
use Webit\SoapApi\Input\InputNormalizerSerializedBased;
use Webit\SoapApi\Hydrator\HydratorSerializer;
use Webit\GlsTracking\Api\Exception\ExceptionFactory;

AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__.'/../vendor/jms/serializer/src'
);

if (is_file(__DIR__ .'/config.php') == false) {
    throw new \LogicException('Missing required file "examples/config.php". Create it base on "examples/onfig.php.dist".');
}

$config = require __DIR__ .'/config.php';

$serializer = SerializerBuilder::create()->build();

$clientFactory = new SoapClientFactory();
$normalizer = new InputNormalizerSerializedBased($serializer);
$hydrator = new HydratorSerializer($serializer);
$exceptionFactory = new ExceptionFactory();

$apiFactory = new TrackingApiFactory($clientFactory, $normalizer, $hydrator, $exceptionFactory);

return $apiFactory;
