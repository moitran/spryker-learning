<?php

namespace Pyz\Zed\PathBlacklist\Business;

use Pyz\Zed\PathBlacklist\Business\EventHandler\SetUrlBlacklistHandler;
use Pyz\Zed\PathBlacklist\Business\EventHandler\SetUrlBlacklistHandlerInterface;
use Pyz\Zed\PathBlacklist\Business\Writer\PathBlacklistWriter;
use Pyz\Zed\PathBlacklist\Business\Writer\PathBlacklistWriterInterface;
use Pyz\Zed\PathBlacklist\PathBlacklistDependencyProvider;
use Pyz\Zed\PathBlacklist\Business\EventWriter\EventWriter;
use Pyz\Zed\PathBlacklist\Business\EventWriter\EventWriterInterface;
use Pyz\Zed\PathBlacklist\Persistence\PathBlacklistEntityManagerInterface;
use Pyz\Zed\PathBlacklist\Persistence\PathBlacklistRepositoryInterface;
use Spryker\Zed\Event\Business\EventFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\Url\Persistence\UrlQueryContainerInterface;

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
            $this->createBlacklistEventWriter()
        );
    }

    /**
     * @return EventWriterInterface
     */
    public function createBlacklistEventWriter(): EventWriterInterface
    {
        return new EventWriter(
            $this->getEventFacade()
        );
    }

    /**
     * @return SetUrlBlacklistHandlerInterface
     */
    public function createSetUrlBlacklistHandler(): SetUrlBlacklistHandlerInterface
    {
        return new SetUrlBlacklistHandler(
            $this->getRepository()
        );
    }

    /**
     * @return EventFacadeInterface
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getEventFacade(): EventFacadeInterface
    {
        return $this->getProvidedDependency(PathBlacklistDependencyProvider::FACADE_EVENT);
    }
}
