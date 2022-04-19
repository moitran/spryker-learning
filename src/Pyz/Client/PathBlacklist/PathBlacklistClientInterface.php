<?php

namespace Pyz\Client\PathBlacklist;

use Generated\Shared\Transfer\UrlStorageTransfer;

/**
 * Interface PathBlacklistClientInterface
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
     * @param UrlStorageTransfer $urlStorageTransfer
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function blacklistChecking(UrlStorageTransfer $urlStorageTransfer): void;
}
