<?php

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

class PathBlacklistQueryContainer extends AbstractQueryContainer implements PathBlacklistQueryContainerInterface
{
    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return \Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function findByIdPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): PyzPathBlacklistQuery
    {
        return PyzPathBlacklistQuery::create()
            ->filterByIdPathBlacklist($pathBlacklistTransfer->getIdPathBlacklist());
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return \Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function findByPath(PathBlacklistTransfer $pathBlacklistTransfer): PyzPathBlacklistQuery
    {
        return PyzPathBlacklistQuery::create()
            ->filterByPath($pathBlacklistTransfer->getPath());
    }
}
