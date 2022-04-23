<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklist\Persistence;

use Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * Class PathBlacklistPersistenceFactory
 *
 * @package Pyz\Zed\PathBlacklist\Persistence
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistQueryContainerInterface getQueryContainer()
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistRepositoryInterface getRepository()
 */
class PathBlacklistPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery
     */
    public function createPathBlacklistQuery(): PyzPathBlacklistQuery
    {
        return PyzPathBlacklistQuery::create();
    }
}
