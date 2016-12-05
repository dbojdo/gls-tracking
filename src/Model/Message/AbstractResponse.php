<?php
/**
 * AbstractResponse.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 16:05
 */

namespace Webit\GlsTracking\Model\Message;

use JMS\Serializer\Annotation as JMS;
use Webit\GlsTracking\Model\ExitCode;

/**
 * Class AbstractResponse
 * @package Webit\GlsTracking\Model
 */
abstract class AbstractResponse
{
    /**
     * @JMS\Type("Webit\GlsTracking\Model\ExitCode")
     * @JMS\SerializedName("ExitCode")
     *
     * @var ExitCode
     */
    private $exitCode;

    public function __construct(ExitCode $exitCode = null)
    {
        $this->exitCode = $exitCode;
    }

    public function getExitCode()
    {
        return $this->exitCode;
    }
}
