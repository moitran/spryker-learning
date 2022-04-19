<?php

namespace Pyz\Client\PathBlacklist\Resolver;

use Generated\Shared\Transfer\UrlStorageTransfer;

/**
 * Interface BlacklistResolverInterface
 * @package Pyz\Client\PathBlacklist\Resolver
 */
interface BlacklistResolverInterface
{
    /**
     * @param UrlStorageTransfer $urlStorageTransfer
     */
    public function blacklistChecking(UrlStorageTransfer $urlStorageTransfer): void;
}
