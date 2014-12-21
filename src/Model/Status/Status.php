<?php
/**
 * File Status.php
 * Created at: 2014-12-21 17-35
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\GlsTracking\Model\Status;


class Status
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $final = false;

    /**
     * @param string $code
     * @param string $name
     * @param bool $final
     */
    public function __construct($code, $name, $final = false)
    {
        $this->code = $code;
        $this->name = $name;
        $this->final = $final;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return boolean
     */
    public function isFinal()
    {
        return $this->final;
    }
}
