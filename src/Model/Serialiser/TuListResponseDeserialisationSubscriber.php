<?php
/**
 * ToLustResponseDeserialisationListener.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created at: 2016-12-06 13:54
 */

namespace Webit\GlsTracking\Model\Serialiser;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class TuListResponseDeserialisationSubscriber implements EventSubscriberInterface
{
    /**
     * @var CollectionEnsuringDeserialisationListener
     */
    private $innerListener;

    /**
     * ToListResponseDeserialisationListener constructor.
     */
    public function __construct()
    {
        $this->innerListener = new CollectionEnsuringDeserialisationListener(
            array('TUList')
        );
    }

    /**
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return array(
            array(
                'event' => 'serializer.pre_deserialize',
                'method' => 'onPreDeserialise',
                'class' => 'Webit\GlsTracking\Model\Message\TuListResponse',
                'format' => 'json'
            )
        );
    }

    public function onPreDeserialise(PreDeserializeEvent $event)
    {
        $this->innerListener->onPreDeserialise($event);
    }
}
