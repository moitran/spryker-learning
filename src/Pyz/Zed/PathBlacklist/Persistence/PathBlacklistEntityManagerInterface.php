<?php

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistTransfer;

/**
 * Interface PathBlacklistEntityManagerInterface
 * @package Pyz\Zed\PathBlacklist\Persistence
 */
interface PathBlacklistEntityManagerInterface
{
    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return PathBlacklistTransfer
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): PathBlacklistTransfer;

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return PathBlacklistTransfer
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): PathBlacklistTransfer;

    /**
     * @param $idPathBlacklist
     *
     * @return PathBlacklistTransfer
     */
    public function deletePathBlacklistById($idPathBlacklist) : PathBlacklistTransfer;
}
