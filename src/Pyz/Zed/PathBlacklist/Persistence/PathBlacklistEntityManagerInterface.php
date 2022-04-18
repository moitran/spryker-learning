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
     * @return void
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): void;

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): void;

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     */
    public function deletePathBlacklistById(PathBlacklistTransfer $pathBlacklistTransfer): void;
}
