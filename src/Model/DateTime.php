<?php
/**
 * DateTime.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 15:58
 */

namespace Webit\GlsTracking\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class DateTime
 * @package Webit\GlsTracking\Model
 */
class DateTime
{
    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("Year")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $year;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("Month")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $month;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("Day")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $day;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("Hour")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $hour;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("Minut")
     * @JMS\Groups({"input"})
     *
     * @var int
     */
    private $minute;

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     * @param int $hour
     * @param int $minute
     */
    public function __construct($year, $month, $day, $hour = 0, $minute = 0)
    {
        $this->setYear($year);
        $this->setMonth($month);
        $this->setDay($day);
        $this->setHour($hour);
        $this->setMinute($minute);
    }

    /**
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param int $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return int
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @param int $hour
     */
    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    /**
     * @return int
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * @param int $minute
     */
    public function setMinute($minute)
    {
        $this->minute = $minute;
    }

    /**
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param int $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

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

    /**
     * @param \DateTime $dateTime
     * @return DateTime
     */
    public static function fromDateTime(\DateTime $dateTime)
    {
        return new DateTime(
            (int) $dateTime->format('Y'),
            (int) $dateTime->format('m'),
            (int) $dateTime->format('d'),
            (int) $dateTime->format('H'),
            (int) $dateTime->format('i')
        );
    }
}
