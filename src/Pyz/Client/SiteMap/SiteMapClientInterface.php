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
     * Specification:
     * - Get sitemap data by pageNUmber
     *
     * @api
     *
     * @param int $pageNumber
     *
     * @return SiteMapCollectionTransfer
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getPageData(int $pageNumber): SiteMapCollectionTransfer;

    /**
     * Specification:
     * - Get sitemap total page
     * @api
     * @return int
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getTotalPage(): int;
}
