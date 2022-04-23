<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\SiteMap\Reader;

use Generated\Shared\Transfer\SiteMapCollectionTransfer;

/**
 * Interface UrlReaderInterface
 *
 * @package Pyz\Client\SiteMap\Reader
 */
interface UrlReaderInterface
{
    /**
     * @param int $pageNumber
     *
     * @return \Generated\Shared\Transfer\SiteMapCollectionTransfer
     */
    public function getPageData(int $pageNumber): SiteMapCollectionTransfer;

    /**
     * @return int
     */
    public function getTotalPage(): int;
}
