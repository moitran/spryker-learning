<?php

namespace Pyz\Client\SiteMap\Reader;

use Generated\Shared\Transfer\SiteMapCollectionTransfer;

/**
 * Interface UrlReaderInterface
 * @package Pyz\Client\SiteMap\Reader
 */
interface UrlReaderInterface
{
    /**
     * @param int $pageNumber
     *
     * @return SiteMapCollectionTransfer
     */
    public function getPageData(int $pageNumber) : SiteMapCollectionTransfer;

    /**
     * @return int
     */
    public function getTotalPage() : int;
}
