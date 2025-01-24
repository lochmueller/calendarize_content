<?php

declare(strict_types=1);

namespace HDNET\CalendarizeContent\EventListener;

use HDNET\Calendarize\Event\IndexRepositoryFindBySearchEvent;
use HDNET\CalendarizeContent\Domain\Repository\ContentRepository;
use HDNET\CalendarizeContent\EventRegister;

class IndexRepositorySearchListener
{
    public function __construct(protected ContentRepository $contentRepository) {}

    public function __invoke(IndexRepositoryFindBySearchEvent $event)
    {
        if (!\in_array($this->getUniqueRegisterKey(), $event->getIndexTypes(), true)) {
            return;
        }

        $customSearch = $event->getCustomSearch();
        $fullText = isset($customSearch['fullText']) ? trim((string)$customSearch['fullText']): '';
        $category = isset($customSearch['category']) ? (int)$customSearch['category']: 0;
        if ($fullText === '' && $category === 0) {
            return;
        }

        $searchTermHits = $this->contentRepository->getIdsBySearch($fullText, $category);
        if ($searchTermHits && \count($searchTermHits)) {
            $indexIds = $event->getForeignIds();
            $indexIds['content'] = $searchTermHits;
            $event->setForeignIds($indexIds);
        }
    }

    /**
     * Unique register key.
     */
    protected function getUniqueRegisterKey():string
    {
        $config = EventRegister::getConfigurationContent();

        return $config['uniqueRegisterKey'];
    }
}
