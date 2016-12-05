<?php
use Doctrine\Common\Annotations\AnnotationRegistry;

require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__.'/../vendor/jms/serializer/src'
);
