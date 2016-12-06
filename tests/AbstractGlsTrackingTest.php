<?php
/**
 * AbstractGlsTrackingTest.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created at: 2016-12-06 12:05
 */

namespace Webit\GlsTracking\Tests;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\EventDispatcher\EventDispatcherInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Webit\GlsTracking\Model\Serialiser\CollectionEnsuringDeserialisationListener;
use Webit\GlsTracking\Model\Serialiser\TuDetailsResponseDeserialisationSubscriber;
use Webit\GlsTracking\Model\Serialiser\TuListResponseDeserialisationSubscriber;

abstract class AbstractGlsTrackingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SerializerInterface
     */
    private $serialiser;

    public static function setUpBeforeClass()
    {
        AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            __DIR__.'/../vendor/jms/serializer/src'
        );
    }

    protected function serialiser()
    {
        if (! $this->serialiser) {
            $builder = SerializerBuilder::create();
            $builder->addDefaultListeners();
            $builder->configureListeners(function (EventDispatcherInterface $dispatcher) {
                $dispatcher->addSubscriber(new TuDetailsResponseDeserialisationSubscriber());
                $dispatcher->addSubscriber(new TuListResponseDeserialisationSubscriber());
            });

            $this->serialiser = $builder->build();
        }

        return $this->serialiser;
    }

    public static function tearDownAfterClass()
    {
        AnnotationRegistry::reset();
    }
}
