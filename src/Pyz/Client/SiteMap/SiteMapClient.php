<?php

namespace Pyz\Client\SiteMap;

use Generated\Shared\Transfer\SiteMapCollectionTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * Class SiteMapClient
 * @package Pyz\Client\SiteMap
 * @method SiteMapFactory getFactory()
 */
class SiteMapClient extends AbstractClient implements SiteMapClientInterface
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
    public function getPageData(int $pageNumber): SiteMapCollectionTransfer
    {
        return $this->getFactory()->createUrlReader()->getPageData($pageNumber);
    }

    /**
     * Specification:
     * - Get sitemap total page
     * @api
     * @return int
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getTotalPage(): int
    {
        return $this->getFactory()->createUrlReader()->getTotalPage();
    }
}
