<?php
/**
 * CustomerReference.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 16:01
 */

namespace Webit\GlsTracking\Model;

/**
 * Class CustomerReference
 * @package Webit\GlsTracking\Model
 */
class CustomerReference
{
    /**
     * @var string
     */
    private $type;

    /**
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
