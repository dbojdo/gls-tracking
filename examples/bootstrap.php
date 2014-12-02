<?php
require __DIR__.'/../vendor/autoload.php';

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use Webit\SoapApi\SoapClient\SoapClientFactory;
use Webit\GlsTracking\Api\Factory\TrackingApiFactory;
use Webit\SoapApi\Input\InputNormalizerSerializerBased;
use Webit\SoapApi\Hydrator\HydratorSerializerBased;
use Webit\GlsTracking\Api\Exception\ExceptionFactory;
use Webit\SoapApi\Util\BinaryStringHelper;
use Webit\SoapApi\SoapApiExecutorFactory;
AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__.'/../vendor/jms/serializer/src'
);

if (is_file(__DIR__ .'/config.php') == false) {
    throw new \LogicException(
        'Missing required file "examples/config.php". Create it base on "examples/config.php.dist".'
    );
}

$config = require __DIR__ .'/config.php';

$serializer = SerializerBuilder::create()->build();

$clientFactory = new SoapClientFactory();
$executorFactory = new SoapApiExecutorFactory();
$normalizer = new InputNormalizerSerializerBased($serializer);
$hydrator = new HydratorSerializerBased($serializer, new BinaryStringHelper());
$exceptionFactory = new ExceptionFactory();

$apiFactory = new TrackingApiFactory($clientFactory, $executorFactory, $normalizer, $hydrator, $exceptionFactory);

return $apiFactory;
