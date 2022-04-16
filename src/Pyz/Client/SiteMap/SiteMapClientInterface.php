<?php

namespace Pyz\Client\SiteMap;

use Generated\Shared\Transfer\SiteMapCollectionTransfer;

/**
 * Interface SiteMapClientInterface
 * @package Pyz\Client\SiteMap
 */
interface SiteMapClientInterface
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
