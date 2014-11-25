<?php
require __DIR__.'/../vendor/autoload.php';

use Webit\GlsTracking\UrlProvider\TrackingUrlProviderFactory;
$factory = new TrackingUrlProviderFactory();

$username = 'username';
$password = 'password';

$urlProvider = $factory->createTrackingUrlProvider($username, $password);

$reference = 'reference-no';
$url = $urlProvider->getTrackingUrl($reference);

printf("Url for tracking \"%s\": %s\n", $reference, $url);

$customerReference = 'customer-ref';
$customerNo = 'customer-no';
$url = $urlProvider->getCustomerReferenceTrackingUrl($customerReference, $customerNo);

printf("Url for tracking \"%s\" with customer \"%s\": %s\n", $customerReference, $customerNo, $url);
