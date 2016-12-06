<?php
/**
 * CollectionEnsuringDeserialisationListener.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created at: 2016/12/06 13:55
 */

namespace Webit\GlsTracking\Model\Serialiser;

use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class CollectionEnsuringDeserialisationListener
{
    /**
     * @var string[]
     */
    private $fields;

    /**
     * CollectionEnsuringDeserialisationListener constructor.
     * @param \string[] $fields
     */
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserialise(PreDeserializeEvent $event)
    {
        $data = $event->getData();

        foreach ($this->fields as $field) {
            if (isset($data[$field])) {
                $data[$field] = $this->ensureCollection($data[$field]);
            }
        }

        $event->setData($data);
    }

    /**
     * @param array $data
     * @return array
     */
    private function ensureCollection($data)
    {
        if (! is_array($data)) {
            return (array)$data;
        }

        if (count($data) == 0) {
            return $data;
        }

        if (isset($data[0])) {
            return $data;
        }

        return array($data);
    }
}
