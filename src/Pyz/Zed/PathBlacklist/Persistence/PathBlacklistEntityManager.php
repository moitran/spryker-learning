<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * Class PathBlacklistEntityManager
 *
 * @package Pyz\Zed\PathBlacklist\Persistence
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistPersistenceFactory getFactory()
 */
class PathBlacklistEntityManager extends AbstractEntityManager implements PathBlacklistEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): void
    {
        $pathBlacklistEntity = $this->getFactory()
            ->createPathBlacklistQuery()
            ->findByPath($pathBlacklistTransfer->getPath())
            ->findOneOrCreate();

        if ($pathBlacklistEntity->isModified() || $pathBlacklistEntity->isNew()) {
            $pathBlacklistEntity->save();
        }
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): void
    {
        $pathBlacklistEntity = $this->getFactory()
            ->createPathBlacklistQuery()
            ->findByIdPathBlacklist($pathBlacklistTransfer->getIdPathBlacklist())
            ->findOne();

        $pathBlacklistEntity->setPath($pathBlacklistTransfer->getPath());
        if ($pathBlacklistEntity->isModified()) {
            $pathBlacklistEntity->save();
        }
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     */
    public function deletePathBlacklistById(PathBlacklistTransfer $pathBlacklistTransfer): void
    {
        $pathBlacklistEntity = $this->getFactory()
            ->createPathBlacklistQuery()
            ->findByIdPathBlacklist($pathBlacklistTransfer->getIdPathBlacklist())
            ->findOne();

        if ($pathBlacklistEntity->getIdPathBlacklist()) {
            $pathBlacklistEntity->delete();
        }
    }
}
