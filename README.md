# GLS Tracking SDK

## Installation

Add the **webit/gls-tracking** into **composer.json**

```json
{
    "require": {
        "php":              ">=5.3.2",
        "webit/gls-tracking": "^2.0"
    }
}
```

## Configuration / Usage

### API Factory preparation

```php
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
file_put_contents('/your/docs/dir/' . $pod->getFileName(), $pod->getFile());
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
 
## Tests
 
### Unit / Integration tests

```bash
./vendor/bin/phpunit --testsuite unit
```

### API tests

***Requires valid GLS Tracking API credentials and valid parcel numbers***

Copy **phpunit.xml.dist** to **phpunit.xml** then edit **env** variables accordingly 

```bash
./vendor/bin/phpunit --testsuite api
```
