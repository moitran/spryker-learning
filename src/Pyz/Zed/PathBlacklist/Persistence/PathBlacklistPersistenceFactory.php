<?php

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * Class PathBlacklistPersistenceFactory
 * @package Pyz\Zed\PathBlacklist\Persistence
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistQueryContainerInterface getQueryContainer()
 */
class PathBlacklistPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return PyzPathBlacklistQuery
     */
    public function createPathBlacklistQuery(): PyzPathBlacklistQuery
    {
        return PyzPathBlacklistQuery::create();
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return \Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery
     */
    public function findByIdPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): PyzPathBlacklistQuery
    {
        return $this->getQueryContainer()->findByIdPathBlacklist($pathBlacklistTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return \Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function findByPath(PathBlacklistTransfer $pathBlacklistTransfer): PyzPathBlacklistQuery
    {
        return $this->getQueryContainer()->findByPath($pathBlacklistTransfer);
    }
}
