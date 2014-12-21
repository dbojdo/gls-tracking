<?php
/**
 * File StatusProvider.php
 * Created at: 2014-12-21 17-34
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\GlsTracking\Model\Status;


use Doctrine\Common\Collections\ArrayCollection;

class StatusRepositoryInMemory implements StatusRepositoryInterface
{
    /**
     * @var ArrayCollection
     */
    private $statuses;

    /**
     * @param ArrayCollection $statuses
     */
    public function __construct(ArrayCollection $statuses)
    {
        $this->statuses = $this->index($statuses);
    }

    /**
     * @param string $code
     * @return Status
     */
    public function getStatus($code)
    {
        return $this->statuses->get($code);
    }

    /**
     * @param ArrayCollection $statuses
     * @return ArrayCollection
     */
    private function index(ArrayCollection $statuses)
    {
        $indexed = new ArrayCollection();

        /** @var Status $status */
        foreach ($statuses as $status) {
            $indexed->set($status->getCode(), $status);
        }

        return $indexed;
    }
}