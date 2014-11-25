<?php
/**
 * Parameters.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 16:07
 */

namespace Webit\GlsTracking\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Parameters
 * @package Webit\GlsTracking\Model
 */
class Parameters
{
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("ParamCode")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $code;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("ParamValue")
     * @JMS\Groups({"input"})
     *
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
