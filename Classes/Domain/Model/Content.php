<?php

namespace HDNET\CalendarizeContent\Domain\Model;

use HDNET\Autoloader\Annotation\DatabaseTable;

/**
 * @DatabaseTable("tt_content")
 */
class Content extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var string
     */
    protected $header = '';

    /**
     * @var string
     */
    protected $subheader = '';

    /**
     * Categories.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $categories;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $media;

    public function __construct()
    {
        $this->media = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    public function getHeader(): string
    {
        return $this->header;
    }

    public function setHeader(string $header): void
    {
        $this->header = $header;
    }

    public function getSubheader(): string
    {
        return $this->subheader;
    }

    public function setSubheader(string $subheader): void
    {
        $this->subheader = $subheader;
    }

    public function getMedia(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->media;
    }

    public function setMedia(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $media): void
    {
        $this->media = $media;
    }

    public function getCategories()
    {
        return $this->categories;
    }
}
