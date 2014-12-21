<?php
/**
 * File StatusRepositoryInMemoryFactory.php
 * Created at: 2014-12-21 21-49
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\GlsTracking\Model\Status;


use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Collections\ArrayCollection;

class StatusRepositoryInMemoryFactory
{
    /**
     * @var string
     */
    private $sourceDir;

    /**
     * @var Cache
     */
    private $cache;

    public function __construct($sourceDir = null, Cache $cache = null)
    {
        $this->sourceDir = $sourceDir ?: __DIR__.'/../../Resources';
        $this->cache = $cache;
    }

    /**
     * @param string $language
     * @return StatusRepositoryInMemory
     */
    public function createStatusRepository($language = 'en')
    {
        $statuses = $this->buildStatusCollection($language);

        return new StatusRepositoryInMemory($statuses);
    }

    /**
     * @param string $language
     * @return ArrayCollection
     */
    private function buildStatusCollection($language)
    {
        $filename = sprintf('%s/status.%s.json', $this->sourceDir, $language);
        if (is_file($filename) == false) {
            throw new \RuntimeException(
                sprintf('No statuses source file for language "%s" (expected: %s)', $this->sourceDir, $language)
            );
        }

        $cacheKey = sprintf('status.%s', $language);
        if ($this->cache && $this->cache->contains($cacheKey)) {
            return $this->cache->fetch($cacheKey);
        }

        $statuses = new ArrayCollection();

        $arStatuses = @json_decode(file_get_contents($filename), true);
        foreach ($arStatuses as $arStatus) {
            $status = new Status($arStatus['code'], $arStatus['name'], $arStatus['final']);
            $statuses->add($status);
        }

        if ($this->cache) {
            $this->cache->save($cacheKey, $statuses);
        }

        return $statuses;
    }
}