<?php

namespace Webit\GlsTracking\Api\Factory;

use JMS\Serializer\EventDispatcher\EventDispatcherInterface;
use JMS\Serializer\SerializerBuilder;
use Webit\GlsTracking\Model\Serialiser\TuDetailsResponseDeserialisationSubscriber;
use Webit\GlsTracking\Model\Serialiser\TuListResponseDeserialisationSubscriber;

class SerializerFactory
{
    /**
     * @return \JMS\Serializer\Serializer
     */
    public function create()
    {
        $builder = SerializerBuilder::create();
        $builder->addDefaultListeners();
        $builder->configureListeners(function (EventDispatcherInterface $dispatcher) {
            $dispatcher->addSubscriber(new TuDetailsResponseDeserialisationSubscriber());
            $dispatcher->addSubscriber(new TuListResponseDeserialisationSubscriber());
        });

        return $builder->build();
    }
}
