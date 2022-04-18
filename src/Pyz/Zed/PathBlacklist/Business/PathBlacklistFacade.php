<?php

namespace Pyz\Zed\PathBlacklist\Business;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Pyz\Zed\PathBlacklist\Persistence\PathBlacklistEntityManagerInterface;
use Pyz\Zed\PathBlacklist\Persistence\PathBlacklistRepositoryInterface;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class PathBlacklistFacade
 * @package Pyz\Zed\PathBlacklist\Business
 * @method PathBlacklistRepositoryInterface getRepository()
 * @method PathBlacklistEntityManagerInterface getEntityManager()
 * @method PathBlacklistBusinessFactory getFactory()
 */
class PathBlacklistFacade extends AbstractFacade implements PathBlacklistFacadeInterface
{
    /**
     * @param int $idPathBlacklist
     *
     * @return PathBlacklistTransfer
     */
    public function findPathBlacklistById(int $idPathBlacklist): PathBlacklistTransfer
    {
        return $this->getRepository()->findPathBlacklistById($idPathBlacklist);
    }

    /**
     * @param string $path
     *
     * @return PathBlacklistTransfer
     */
    public function findPathBlacklistByPath(string $path): PathBlacklistTransfer
    {
        return $this->getRepository()->findPathBlacklistByPath($path);
    }

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool
    {
        return $this->getFactory()->createPathBlacklistWriter()->createPathBlacklist($pathBlacklistTransfer);
    }

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool
    {
        return $this->getFactory()->createPathBlacklistWriter()->updatePathBlacklist($pathBlacklistTransfer);
    }

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function deletePathBlacklistById(PathBlacklistTransfer $pathBlacklistTransfer): bool
    {
        return $this->getFactory()->createPathBlacklistWriter()->deletePathBlacklistById($pathBlacklistTransfer);
    }

    /**
     * @param string $eventName
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     */
    public function setBlacklistByPath(string $eventName, PathBlacklistTransfer $pathBlacklistTransfer): void
    {
        $this->getFactory()->createSetUrlBlacklistHandler()->setBlacklistByPath($eventName, $pathBlacklistTransfer);
    }
}
