<?php
/**
 * AbstractResponse.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 16:05
 */

namespace Webit\GlsTracking\Model;

/**
 * Class AbstractResponse
 * @package Webit\GlsTracking\Model
 */
abstract class AbstractResponse
{
    /**
     * @var ExitCode
     */
    private $exitCode;

    public function getExitCode()
    {
        return $this->exitCode;
    }
}
