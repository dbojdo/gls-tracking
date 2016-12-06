<?php
/**
 * ExitCode.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 15:53
 */

namespace Webit\GlsTracking\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ExitCode
 * @package Webit\GlsTracking\Model
 */
class ExitCode
{
    const CODE_OK = 0;
    const CODE_AUTHENTICATION_ERROR = 502;
    const CODE_NO_DATA_FOUND = 998;
    const CODE_IMAGE_NOT_FOUND = 999;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("ErrorCode")
     *
     * @var int
     */
    private $code;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("ErrorDscr")
     *
     * @var string
     */
    private $description;

    /**
     * ExitCode constructor.
     * @param int $code
     * @param string $description
     */
    public function __construct($code, $description)
    {
        $this->code = $code;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function isSuccessfully()
    {
        return $this->code == self::CODE_OK;
    }
}
