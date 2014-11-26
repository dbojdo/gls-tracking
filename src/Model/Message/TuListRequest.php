<?php
/**
 * File: TuListRequest.php
 * Created at: 2014-11-25 06:03
 */
 
namespace Webit\GlsTracking\Model\Message;

use Webit\GlsTracking\Model\DateTime;
use Webit\GlsTracking\Model\Parameters;

/**
 * Class TuListRequest
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class TuListRequest extends AbstractRequest
{

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("CustomRef")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $customRef;

    /**
     * @JMS\Type("Webit\GlsTracking\Model\DateTime")
     * @JMS\SerializedName("DateFrom")
     *
     * @var DateTime
     */
    private $dateFrom;

    /**
     * @JMS\Type("Webit\GlsTracking\Model\DateTime")
     * @JMS\SerializedName("DateTo")
     *
     * @var DateTime
     */
    private $dateTo;

    /**
     * @param DateTime $dateFrom
     * @param DateTime $dateTo
     * @param string $reference
     * @param string $customerRef
     * @param Parameters $parameters
     */
    public function __construct(
        DateTime $dateFrom,
        DateTime $dateTo,
        $reference = null,
        $customerRef = null,
        Parameters $parameters = null
    ) {
        parent::__construct($reference, $parameters);

        $this->setDateFrom($dateFrom);
        $this->setDateTo($dateTo);
        $this->setCustomRef($customerRef);
    }

    /**
     * @return string
     */
    public function getCustomRef()
    {
        return $this->customRef;
    }

    /**
     * @param string $customRef
     */
    public function setCustomRef($customRef)
    {
        $this->customRef = $customRef;
    }

    /**
     * @return DateTime
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * @param DateTime $dateFrom
     */
    public function setDateFrom(DateTime $dateFrom)
    {
        $this->dateFrom = $dateFrom;
    }

    /**
     * @return DateTime
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }

    /**
     * @param DateTime $dateTo
     */
    public function setDateTo(DateTime $dateTo)
    {
        $this->dateTo = $dateTo;
    }


}
