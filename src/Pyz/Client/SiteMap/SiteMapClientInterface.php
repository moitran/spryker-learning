<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\SiteMap;

use Generated\Shared\Transfer\SiteMapCollectionTransfer;

/**
 * Interface SiteMapClientInterface
 *
 * @package Pyz\Client\SiteMap
 */
interface SiteMapClientInterface
{
    /**
     * Specification:
     * - Get sitemap data by pageNUmber
     *
     * @api
     *
     * @param int $pageNumber
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return \Generated\Shared\Transfer\SiteMapCollectionTransfer
     */
    public function getPageData(int $pageNumber): SiteMapCollectionTransfer;

    /**
     * Specification:
     * - Get sitemap total page
     *
     * @api
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return int
     */
    public function getTotalPage(): int;
}
