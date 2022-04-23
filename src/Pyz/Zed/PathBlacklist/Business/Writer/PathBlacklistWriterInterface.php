<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklist\Business\Writer;

use Generated\Shared\Transfer\PathBlacklistTransfer;

/**
 * Interface UrlBlacklistWriterInterface
 *
 * @package Pyz\Zed\PathBlacklist\Business\Writer
 */
interface PathBlacklistWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool;

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool;

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function deletePathBlacklistById(PathBlacklistTransfer $pathBlacklistTransfer): bool;
}
