<?php
/**
 * CustomerReference.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 16:01
 */

namespace Webit\GlsTracking\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CustomerReference
 * @package Webit\GlsTracking\Model
 */
class CustomerReference
{
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("ReferenceType")
     *
     * @var string
     */
    private $type;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("ReferenceValue")
     *
     * @var string
     */
    private $value;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
