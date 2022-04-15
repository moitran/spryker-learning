<?php

namespace Pyz\Client\SiteMap;

use Pyz\Client\SiteMap\Reader\UrlReader;
use Pyz\Client\SiteMap\Reader\UrlReaderInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Storage\StorageClientInterface;

/**
 * Class SiteMapFactory
 * @package Pyz\Client\SiteMap
 */
class SiteMapFactory extends AbstractFactory
{
    /**
     * @return UrlReaderInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function createUrlReader(): UrlReaderInterface
    {
        return new UrlReader(
            $this->getStorageClient()
        );
    }

    /**
     * @return StorageClientInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getStorageClient(): StorageClientInterface
    {
        return $this->getProvidedDependency(SiteMapDependencyProvider::CLIENT_STORAGE);
    }
}
