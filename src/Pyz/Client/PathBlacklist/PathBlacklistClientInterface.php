<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\PathBlacklist;

use Generated\Shared\Transfer\UrlStorageTransfer;

/**
 * Interface PathBlacklistClientInterface
 *
 * @package Pyz\Client\PathBlacklist
 */
interface PathBlacklistClientInterface
{
    /**
     * Specification:
     * - Checking is URL in path blacklist -> throw not found exception
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UrlStorageTransfer $urlStorageTransfer
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function blacklistChecking(UrlStorageTransfer $urlStorageTransfer): void;
}
