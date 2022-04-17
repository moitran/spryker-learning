<?php

namespace Pyz\Zed\PathBlacklist\Persistence;

use Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery;
use Pyz\Zed\PathBlacklist\PathBlacklistDependencyProvider;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use Spryker\Zed\Url\Persistence\UrlQueryContainerInterface;

/**
 * Class PathBlacklistPersistenceFactory
 * @package Pyz\Zed\PathBlacklist\Persistence
 */
class PathBlacklistPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return PyzPathBlacklistQuery
     */
    public function createPathBlacklistQuery() : PyzPathBlacklistQuery
    {
        return PyzPathBlacklistQuery::create();
    }

    /**
     * @return UrlQueryContainerInterface
     */
    public function getUrlQueryContainer(): UrlQueryContainerInterface
    {
        return $this->getProvidedDependency(PathBlacklistDependencyProvider::QUERY_CONTAINER_URL);
    }
}
