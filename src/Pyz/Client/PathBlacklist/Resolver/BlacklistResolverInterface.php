<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\PathBlacklist\Resolver;

use Generated\Shared\Transfer\UrlStorageTransfer;

/**
 * Interface BlacklistResolverInterface
 *
 * @package Pyz\Client\PathBlacklist\Resolver
 */
interface BlacklistResolverInterface
{
    /**
     * @param \Generated\Shared\Transfer\UrlStorageTransfer $urlStorageTransfer
     */
    public function blacklistChecking(UrlStorageTransfer $urlStorageTransfer): void;
}
