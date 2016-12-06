<?php
/**
 * File: TuListResponse.php
 * Created at: 2014-11-25 06:19
 */
 
namespace Webit\GlsTracking\Model\Message;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class TuListResponse
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class TuListResponse extends AbstractResponse
{
    /**
     * @JMS\Type("ArrayCollection<Webit\GlsTracking\Model\UnitRow>")
     * @JMS\SerializedName("TUList")
     *
     * @var ArrayCollection
     */
    private $rows;

    /**
     * @return ArrayCollection
     */
    public function getRows()
    {
        return $this->rows ?: new ArrayCollection();
    }
}
