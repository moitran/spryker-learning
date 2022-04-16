<?php

namespace Pyz\Client\PathBlacklist;

use Pyz\Client\PathBlacklist\Resolver\BlacklistResolver;
use Pyz\Client\PathBlacklist\Resolver\BlacklistResolverInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\UrlStorage\UrlStorageClientInterface;

/**
 * Class PathBlacklistFactory
 * @package Pyz\Client\PathBlacklist
 */
class PathBlacklistFactory extends AbstractFactory
{
    /**
     * @return BlacklistResolverInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function createBlacklistResolver() : BlacklistResolverInterface
    {
        return new BlacklistResolver(
            $this->getUrlStorageClient()
        );
    }

    /**
     * @return UrlStorageClientInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getUrlStorageClient() : UrlStorageClientInterface
    {
        return $this->getProvidedDependency(PathBlacklistDependencyProvider::CLIENT_URL_STORAGE);
    }
}
