<?php
/**
 * Event register
 */
declare(strict_types=1);

namespace HDNET\CalendarizeContent\EventListener;

use HDNET\Calendarize\Event\IndexRepositoryFindBySearchEvent;
use HDNET\CalendarizeContent\Domain\Repository\ContentRepository;
use HDNET\CalendarizeContent\EventRegister;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

class IndexRepositorySearchListener
{

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

        $pageRepository = GeneralUtility::makeInstance(ObjectManager::class)->get(ContentRepository::class);
        $searchTermHits = $pageRepository->getIdsBySearch($fullText, $category);
        if ($searchTermHits && \count($searchTermHits)) {
            $indexIds = $event->getIndexIds();
            $indexIds['pages'] = $searchTermHits;
            $event->setIndexIds($indexIds);
        }

    }

    /**
     * Unique register key.
     *
     * @return string
     */
    protected function getUniqueRegisterKey()
    {
        $config = EventRegister::getConfigurationContent();

        return $config['uniqueRegisterKey'];
    }

}
