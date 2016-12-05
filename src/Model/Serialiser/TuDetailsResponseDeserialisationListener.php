<?php
/**
 * TuDetailsResponseDeserialisationListener.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@8x8.com>
 * Created on 05/12/2016 15:20
 * Copyright (C) 8x8, Inc.
 */

namespace Webit\GlsTracking\Model\Serialiser;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class TuDetailsResponseDeserialisationListener implements EventSubscriberInterface
{

    /**
     * Returns the events to which this class has subscribed.
     *
     * Return format:
     *     array(
     *         array('event' => 'the-event-name', 'method' => 'onEventName', 'class' => 'some-class', 'format' => 'json'),
     *         array(...),
     *     )
     *
     * The class may be omitted if the class wants to subscribe to events of all classes.
     * Same goes for the format key.
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            array(
                'event' => 'serializer.pre_deserialize',
                'method' => 'onPreDeserialise',
                'class' => 'Webit\GlsTracking\Model\Message\TuDetailsResponse',
                'format' => 'json'
            )
        );
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserialise(PreDeserializeEvent $event)
    {
        $data = $event->getData();

        if (isset($data['CustomerReference']) && is_array($data['CustomerReference'])) {
            $data['CustomerReference'] = $this->ensureCollection($data['CustomerReference']);
        }

        if (isset($data['History']) && is_array($data['History'])) {
            $data['History'] = $this->ensureCollection($data['History']);
        }

        $event->setData($data);
    }

    /**
     * @param array $data
     * @return array
     */
    private function ensureCollection(array $data)
    {
        if (count($data) == 0) {
            return $data;
        }

        if (isset($data[0])) {
            return $data;
        }

        return array($data);
    }
}
