<?php

namespace Pyz\Client\SiteMap\Reader;

use Generated\Shared\Transfer\SiteMapCollectionTransfer;

/**
 * Interface UrlReaderInterface
 * @package Pyz\Client\SiteMap\Reader
 */
interface UrlReaderInterface
{
    public function getAllUrlStorage() : SiteMapCollectionTransfer;
}
