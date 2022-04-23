<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistPersistenceFactory getFactory()
 */
class PathBlacklistQueryContainer extends AbstractQueryContainer implements PathBlacklistQueryContainerInterface
{
    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return \Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery
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
     */
    public function findByPath(PathBlacklistTransfer $pathBlacklistTransfer): PyzPathBlacklistQuery
    {
        return PyzPathBlacklistQuery::create()
            ->filterByPath($pathBlacklistTransfer->getPath());
    }
}
