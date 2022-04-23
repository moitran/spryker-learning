<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\SiteMap;

use Pyz\Client\SiteMap\Reader\UrlReader;
use Pyz\Client\SiteMap\Reader\UrlReaderInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Storage\StorageClientInterface;

/**
 * Class SiteMapFactory
 *
 * @package Pyz\Client\SiteMap
 */
class SiteMapFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Client\SiteMap\Reader\UrlReaderInterface
     */
    public function createUrlReader(): UrlReaderInterface
    {
        return new UrlReader(
            $this->getStorageClient()
        );
    }

    /**
     * @return \Spryker\Client\Storage\StorageClientInterface
     */
    protected function getStorageClient(): StorageClientInterface
    {
        return $this->getProvidedDependency(SiteMapDependencyProvider::CLIENT_STORAGE);
    }
}
