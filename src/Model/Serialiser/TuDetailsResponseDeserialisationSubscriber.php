<?php
/**
 * TuDetailsResponseDeserialisationListener.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created at: 2016/12/05 15:20
 */

namespace Webit\GlsTracking\Model\Serialiser;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class TuDetailsResponseDeserialisationSubscriber implements EventSubscriberInterface
{
    /**
     * @var CollectionEnsuringDeserialisationListener
     */
    private $innerListener;

    /**
     * TuDetailsResponseDeserialisationListener constructor.
     */
    public function __construct()
    {
        $this->innerListener = new CollectionEnsuringDeserialisationListener(
            array('CustomerReference', 'History')
        );
    }


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
        $this->innerListener->onPreDeserialise($event);
    }
}
