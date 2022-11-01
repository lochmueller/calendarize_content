<?php

namespace HDNET\CalendarizeContent\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\Qom\OrInterface;

/**
 * Repository for Content models.
 */
class ContentRepository extends Repository
{
    /**
     * Get the IDs of the given search term.
     *
     * @param string $searchTerm
     *
     * @return array
     */
    public function getIdsBySearch(string $searchTerm, int $category)
    {
        $query = $this->createQuery();
        $constraint = [];

        if ($searchTerm !== '') {
            $constraint['searchTerm'] = $this->getConstraintForSearchWord($query, $searchTerm);
        }
        if ($category) {
            $constraint['categories'] = $query->contains('categories', $category);
        }

        $query->matching($query->logicalOr($constraint));
        $rows = $query->execute(true);

        $ids = [];
        foreach ($rows as $row) {
            $ids[] = (int) $row['uid'];
        }

        return $ids;
    }

    protected function getConstraintForSearchWord(QueryInterface $query, string $searchWord): OrInterface
    {
        $logicalOrConstraints = [
            $query->like('title', '%' . $searchWord . '%'),
            $query->like('abstract', '%' . $searchWord . '%'),
            $query->like('description', '%' . $searchWord . '%'),
        ];

        return $query->logicalOr($logicalOrConstraints);
    }
}
