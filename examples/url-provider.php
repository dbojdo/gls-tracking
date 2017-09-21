<?php
require __DIR__.'/bootstrap.php';

use Webit\GlsTracking\UrlProvider\TrackingUrlProviderFactory;
$factory = new TrackingUrlProviderFactory();

/** @var array $config */

$username = 'username';

$urlProvider = $factory->createTrackingUrlProvider();

$reference = $config['parcel-no'];

$url = $urlProvider->getStandardTrackingUrl($reference, $config['country'], $config['language']);

printf("Url for tracking \"%s\" (standard): %s\n", $reference, $url);

$url = $urlProvider->getEncryptedTrackingUrl($credentials, $reference, $config['language']);

printf("Url for tracking \"%s\" (encrypted): %s\n", $reference, $url);

$customerReference = 'customer-ref';
$customerNo = 'customer-no';
$url = $urlProvider->getEncryptedCustomerReferenceTrackingUrl($credentials, $customerReference, $customerNo, $config['language']);

printf("Url for tracking \"%s\" with customer \"%s\": %s\n", $customerReference, $customerNo, $url);
