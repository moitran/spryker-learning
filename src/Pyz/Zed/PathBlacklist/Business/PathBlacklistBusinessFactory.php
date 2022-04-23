<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklist\Business;

use Pyz\Zed\PathBlacklist\Business\Writer\PathBlacklistWriter;
use Pyz\Zed\PathBlacklist\Business\Writer\PathBlacklistWriterInterface;
use Pyz\Zed\PathBlacklist\PathBlacklistDependencyProvider;
use Pyz\Zed\Url\Business\UrlFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * Class PathBlacklistBusinessFactory
 *
 * @package Pyz\Zed\PathBlacklist\Business
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistRepositoryInterface getRepository()
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistQueryContainerInterface getQueryContainer()
 */
class PathBlacklistBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\PathBlacklist\Business\Writer\PathBlacklistWriterInterface
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
     */
    protected function getUrlFacade(): UrlFacadeInterface
    {
        return $this->getProvidedDependency(PathBlacklistDependencyProvider::FACADE_URL);
    }
}
