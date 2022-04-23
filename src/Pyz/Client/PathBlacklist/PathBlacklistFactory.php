<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\PathBlacklist;

use Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery;
use Pyz\Client\PathBlacklist\Resolver\BlacklistResolver;
use Pyz\Client\PathBlacklist\Resolver\BlacklistResolverInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\UrlStorage\UrlStorageClientInterface;

/**
 * Class PathBlacklistFactory
 *
 * @package Pyz\Client\PathBlacklist
 */
class PathBlacklistFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Client\PathBlacklist\Resolver\BlacklistResolverInterface
     */
    public function createBlacklistResolver(): BlacklistResolverInterface
    {
        return new BlacklistResolver(
            $this->getUrlStorageClient()
        );
    }

    /**
     * @return \Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery
     */
    public function createPathBlacklistQuery(): PyzPathBlacklistQuery
    {
        return PyzPathBlacklistQuery::create();
    }

    /**
     * @return \Spryker\Client\UrlStorage\UrlStorageClientInterface
     */
    protected function getUrlStorageClient(): UrlStorageClientInterface
    {
        return $this->getProvidedDependency(PathBlacklistDependencyProvider::CLIENT_URL_STORAGE);
    }
}
