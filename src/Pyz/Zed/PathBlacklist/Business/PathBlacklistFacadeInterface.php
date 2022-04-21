<?php

namespace Pyz\Zed\PathBlacklist\Business;

use Generated\Shared\Transfer\PathBlacklistTransfer;

/**
 * Interface PathBlacklistFacadeInterface
 * @package Pyz\Zed\PathBlacklist\Business
 */
interface PathBlacklistFacadeInterface
{
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
