<?php

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Pyz\Client\PathBlacklist\PathBlacklistFactory;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * Class PathBlacklistEntityManager
 * @package Pyz\Zed\PathBlacklist\Persistence
 * @method PathBlacklistFactory getFactory()
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
        $pathBlacklistEntity = $this->getFactory()->createPathBlacklistQuery()
            ->filterByPath($pathBlacklistTransfer->getPath())
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
        $pathBlacklistEntity = $this->getFactory()->createPathBlacklistQuery()
            ->filterByIdPathBlacklist($pathBlacklistTransfer->getIdPathBlacklist())
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
        $pathBlacklistEntity = $this->getFactory()->createPathBlacklistQuery()
            ->filterByIdPathBlacklist($pathBlacklistTransfer->getIdPathBlacklist())
            ->findOne();
        if ($pathBlacklistEntity->getIdPathBlacklist()) {
            $pathBlacklistEntity->delete();
        }
    }
}
