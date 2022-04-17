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
     * @return PathBlacklistTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): PathBlacklistTransfer
    {
        $pathBlacklistEntity = $this->getFactory()->createPathBlacklistQuery()
            ->filterByPath($pathBlacklistTransfer->getPath())
            ->findOneOrCreate();

        if ($pathBlacklistEntity->isModified() || $pathBlacklistEntity->isNew()) {
            $pathBlacklistEntity->save();
        }

        return (new PathBlacklistTransfer())->fromArray($pathBlacklistEntity->toArray());
    }

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return PathBlacklistTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): PathBlacklistTransfer
    {
        $pathBlacklistEntity = $this->getFactory()->createPathBlacklistQuery()
            ->filterByIdPathBlacklist($pathBlacklistTransfer->getIdPathBlacklist())
            ->findOneOrCreate();

        $pathBlacklistEntity->setPath($pathBlacklistTransfer->getPath());
        if ($pathBlacklistEntity->isModified()) {
            $pathBlacklistEntity->save();
        }

        return $pathBlacklistTransfer;
    }

    /**
     * @param $idPathBlacklist
     *
     * @return PathBlacklistTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function deletePathBlacklistById($idPathBlacklist): PathBlacklistTransfer
    {
        $pathBlacklistEntity = $this->getFactory()->createPathBlacklistQuery()
            ->filterByIdPathBlacklist($idPathBlacklist)
            ->findOneOrCreate();
        $transfer = new PathBlacklistTransfer();
        if ($pathBlacklistEntity->getIdPathBlacklist()) {
            $transfer->setIdPathBlacklist($idPathBlacklist);
            $transfer->setOriginTransfer((new PathBlacklistTransfer())->fromArray($pathBlacklistEntity->toArray()));
            $pathBlacklistEntity->delete();
        }

        return $transfer;
    }
}
