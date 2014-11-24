<?php
/**
 * Parameters.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 16:07
 */

namespace Webit\GlsTracking\Model;

/**
 * Class Parameters
 * @package Webit\GlsTracking\Model
 */
class Parameters
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $value;

    public function __construct($code, $value)
    {
        $this->code = $code;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
