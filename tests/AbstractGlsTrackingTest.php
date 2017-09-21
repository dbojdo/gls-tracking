<?php
/**
 * AbstractGlsTrackingTest.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created at: 2016-12-06 12:05
 */

namespace Webit\GlsTracking\Tests;

use JMS\Serializer\SerializerInterface;
use Webit\GlsTracking\Api\Factory\SerializerFactory;

abstract class AbstractGlsTrackingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SerializerInterface
     */
    private $serialiser;

    protected function serialiser()
    {
        if (! $this->serialiser) {
            $serializerFactory = new SerializerFactory();

            $this->serialiser = $serializerFactory->create();
        }

        return $this->serialiser;
    }
}
