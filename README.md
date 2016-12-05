# GLS Tracking SDK

## Installation
### via Composer

Add the **webit/gls-tracking** into **composer.json**

```json
{
    "require": {
        "php":              ">=5.3.2",
        "webit/gls-tracking": "^1.0"
    }
}
```

## Configuration / Usage

### API Factory preparation

```php
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\EventDispatcher\EventDispatcherInterface;
use JMS\Serializer\SerializerBuilder;
use Webit\GlsTracking\Model\Serialiser\TuDetailsResponseDeserialisationListener;
use Webit\SoapApi\SoapClient\SoapClientFactory;
use Webit\GlsTracking\Api\Factory\TrackingApiFactory;
use Webit\SoapApi\Input\InputNormalizerSerializerBased;
use Webit\SoapApi\Hydrator\HydratorSerializerBased;
use Webit\GlsTracking\Api\Exception\ExceptionFactory;
use Webit\SoapApi\Util\BinaryStringHelper;
use Webit\SoapApi\SoapApiExecutorFactory;
use Webit\GlsTracking\Model\UserCredentials;

AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__.'/../vendor/jms/serializer/src'
);

$builder = SerializerBuilder::create();
$builder->addDefaultListeners();
$builder->configureListeners(function (EventDispatcherInterface $dispatcher) {
   $dispatcher->addSubscriber(new TuDetailsResponseDeserialisationListener());
});
$serializer = $builder->build();

$clientFactory = new SoapClientFactory();
$executorFactory = new SoapApiExecutorFactory();
$normalizer = new InputNormalizerSerializerBased($serializer);
$hydrator = new HydratorSerializerBased($serializer, new BinaryStringHelper());
$exceptionFactory = new ExceptionFactory();

$apiFactory = new TrackingApiFactory($clientFactory, $executorFactory, $normalizer, $hydrator, $exceptionFactory);

```

### Tracking API

```php

$credentials = new UserCredentials('user', 'pass');

$api = $apiFactory->createTrackingApi($credentials);
$details = $api->getParcelDetails($parcelNo);

/** @var \Webit\GlsTracking\Model\Event $event */
printf("Details of parcel \"%s\"\n", $parcelNo);
foreach ($details->getHistory() as $event) {
    printf(
        "%s - Status: %s (%s), Location: %s, %s (%s)\n",
        $event->getDate(),
        $event->getCode(),
        $event->getDescription(),
        $event->getLocationName(),
        $event->getCountryName(),
        $event->getLocationCode()
    );
}
printf("Received by: %s\n", $details->getSignature());

$pod = $api->getProofOfDelivery($parcelNo);
printf("Proof of delivery filename: %s\n", $pod->getFileName());
```

### Tracking Url Provider

```php
use Webit\GlsTracking\UrlProvider\TrackingUrlProviderFactory;
$factory = new TrackingUrlProviderFactory();

/** @var array $config */

$username = 'username';

$urlProvider = $factory->createTrackingUrlProvider();

$reference = 'parcel-no';

$url = $urlProvider->getStandardTrackingUrl($reference, 'EN', 'EN');

printf("Url for tracking \"%s\" (encrypted): %s\n", $reference, $url);

$url = $urlProvider->getEncryptedTrackingUrl($credentials, $reference, $config['language']);

printf("Url for tracking \"%s\" (encrypted): %s\n", $reference, $url);

$customerReference = 'customer-ref';
$customerNo = 'customer-no';
$url = $urlProvider->getEncryptedCustomerReferenceTrackingUrl($credentials, $customerReference, $customerNo, $config['language']);

printf("Url for tracking \"%s\" with customer \"%s\": %s\n", $customerReference, $customerNo, $url);
```

### Examples

To configure the examples:
 * Copy ***examples/config.php.dist*** to  ***examples/config.php***
 * Change the values accordingly


Run:
 ```bash
 php examples/details.php
 php examples/url-provider.php
 ```
 