<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistCollectionTransfer;
use Generated\Shared\Transfer\PathBlacklistTransfer;

/**
 * Interface PathBlacklistRepositoryInterface
 *
 * @package Pyz\Zed\PathBlacklist\Persistence
 */
interface PathBlacklistRepositoryInterface
{
    /**
     * @param int $idPathBlacklist
     *
     * @return \Generated\Shared\Transfer\PathBlacklistTransfer
     */
    public function findPathBlacklistById(int $idPathBlacklist): PathBlacklistTransfer;

    /**
     * @param string $path
     *
     * @return \Generated\Shared\Transfer\PathBlacklistCollectionTransfer
     */
    public function findPathBlacklistByPath(string $path): PathBlacklistCollectionTransfer;
}
