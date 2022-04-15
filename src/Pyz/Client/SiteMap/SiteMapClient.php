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
     * @return SiteMapCollectionTransfer
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getSiteMapData(): SiteMapCollectionTransfer
    {
        return $this->getFactory()->createUrlReader()->getAllUrlStorage();
    }
}
