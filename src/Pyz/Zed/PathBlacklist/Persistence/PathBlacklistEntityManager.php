<?php

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * Class PathBlacklistEntityManager
 * @package Pyz\Zed\PathBlacklist\Persistence
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistPersistenceFactory getFactory()
 */
class PathBlacklistEntityManager extends AbstractEntityManager implements PathBlacklistEntityManagerInterface
{
    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): void
    {
        $pathBlacklistEntity = $this->getFactory()
            ->findByPath($pathBlacklistTransfer)
            ->findOneOrCreate();

        if ($pathBlacklistEntity->isModified() || $pathBlacklistEntity->isNew()) {
            $pathBlacklistEntity->save();
        }
    }

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): void
    {
        $pathBlacklistEntity = $this->getFactory()
            ->findByIdPathBlacklist($pathBlacklistTransfer)
            ->findOne();

        $pathBlacklistEntity->setPath($pathBlacklistTransfer->getPath());
        if ($pathBlacklistEntity->isModified()) {
            $pathBlacklistEntity->save();
        }
    }

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function deletePathBlacklistById(PathBlacklistTransfer $pathBlacklistTransfer): void
    {
        $pathBlacklistEntity = $this->getFactory()
            ->findByIdPathBlacklist($pathBlacklistTransfer)
            ->findOne();
        if ($pathBlacklistEntity->getIdPathBlacklist()) {
            $pathBlacklistEntity->delete();
        }
    }
}
