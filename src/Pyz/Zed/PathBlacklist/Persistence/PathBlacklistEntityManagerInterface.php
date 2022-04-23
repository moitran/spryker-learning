<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistTransfer;

/**
 * Interface PathBlacklistEntityManagerInterface
 *
 * @package Pyz\Zed\PathBlacklist\Persistence
 */
interface PathBlacklistEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): void;

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): void;

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     */
    public function deletePathBlacklistById(PathBlacklistTransfer $pathBlacklistTransfer): void;
}
