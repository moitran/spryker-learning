<?php

namespace Pyz\Zed\PathBlacklist\Business;

use Pyz\Zed\PathBlacklist\Business\Writer\PathBlacklistWriter;
use Pyz\Zed\PathBlacklist\Business\Writer\PathBlacklistWriterInterface;
use Pyz\Zed\PathBlacklist\PathBlacklistDependencyProvider;
use Pyz\Zed\PathBlacklist\Persistence\PathBlacklistEntityManagerInterface;
use Pyz\Zed\PathBlacklist\Persistence\PathBlacklistRepositoryInterface;
use Pyz\Zed\Url\Business\UrlFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * Class PathBlacklistBusinessFactory
 * @package Pyz\Zed\PathBlacklist\Business
 * @method PathBlacklistRepositoryInterface getRepository()
 * @method PathBlacklistEntityManagerInterface getEntityManager()
 */
class PathBlacklistBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return PathBlacklistWriterInterface
     */
    public function createPathBlacklistWriter(): PathBlacklistWriterInterface
    {
        return new PathBlacklistWriter(
            $this->getRepository(),
            $this->getEntityManager(),
            $this->getUrlFacade()
        );
    }

    /**
     * @return \Pyz\Zed\Url\Business\UrlFacadeInterface
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getUrlFacade(): UrlFacadeInterface
    {
        return $this->getProvidedDependency(PathBlacklistDependencyProvider::FACADE_URL);
    }
}
