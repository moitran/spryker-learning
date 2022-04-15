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
     * @return SiteMapCollectionTransfer
     */
    public function getSiteMapData() : SiteMapCollectionTransfer;
}
