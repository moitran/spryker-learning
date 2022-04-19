<?php

namespace Pyz\Zed\PathBlacklist\Business;

use Generated\Shared\Transfer\EventEntityTransfer;
use Generated\Shared\Transfer\PathBlacklistCollectionTransfer;
use Generated\Shared\Transfer\PathBlacklistTransfer;

/**
 * Interface PathBlacklistFacadeInterface
 * @package Pyz\Zed\PathBlacklist\Business
 */
interface PathBlacklistFacadeInterface
{
    /**
     * @param int $idPathBlacklist
     *
     * @return PathBlacklistTransfer
     */
    public function findPathBlacklistById(int $idPathBlacklist): PathBlacklistTransfer;

    /**
     * @param string $path
     *
     * @return PathBlacklistCollectionTransfer
     */
    public function findPathBlacklistByPath(string $path): PathBlacklistCollectionTransfer;

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool;

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool;

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function deletePathBlacklistById(PathBlacklistTransfer $pathBlacklistTransfer): bool;
}
