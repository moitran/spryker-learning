<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklist\Business;

use Generated\Shared\Transfer\PathBlacklistCollectionTransfer;
use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class PathBlacklistFacade
 *
 * @package Pyz\Zed\PathBlacklist\Business
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistRepositoryInterface getRepository()
 * @method \Pyz\Zed\PathBlacklist\Business\PathBlacklistBusinessFactory getFactory()
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistEntityManagerInterface getEntityManager()
 */
class PathBlacklistFacade extends AbstractFacade implements PathBlacklistFacadeInterface
{
    /**
     * @param int $idPathBlacklist
     *
     * @return \Generated\Shared\Transfer\PathBlacklistTransfer
     */
    public function findPathBlacklistById(int $idPathBlacklist): PathBlacklistTransfer
    {
        return $this->getRepository()->findPathBlacklistById($idPathBlacklist);
    }

    /**
     * @param string $path
     *
     * @return \Generated\Shared\Transfer\PathBlacklistCollectionTransfer
     */
    public function findPathBlacklistByPath(string $path): PathBlacklistCollectionTransfer
    {
        return $this->getRepository()->findPathBlacklistByPath($path);
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool
    {
        return $this->getFactory()->createPathBlacklistWriter()->createPathBlacklist($pathBlacklistTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool
    {
        return $this->getFactory()->createPathBlacklistWriter()->updatePathBlacklist($pathBlacklistTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function deletePathBlacklistById(PathBlacklistTransfer $pathBlacklistTransfer): bool
    {
        return $this->getFactory()->createPathBlacklistWriter()->deletePathBlacklistById($pathBlacklistTransfer);
    }
}
