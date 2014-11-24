<?php
/**
 * DateTime.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 15:58
 */

namespace Webit\GlsTracking\Model;

/**
 * Class DateTime
 * @package Webit\GlsTracking\Model
 */
class DateTime
{
    /**
     * @var int
     */
    private $year;

    /**
     * @var int
     */
    private $month;

    /**
     * @var int
     */
    private $day;

    /**
     * @var int
     */
    private $hour;

    /**
     * @var int
     */
    private $minute;

    /**
     * @return \DateTime
     */
    public function getDateTime()
    {
        return \DateTime::createFromFormat(
            'Y-m-d H:i:s',
            sprintf('%04d-%02d-%02d %02d:%02d:00', $this->year, $this->month, $this->day, $this->hour, $this->minute)
        );
    }
}
