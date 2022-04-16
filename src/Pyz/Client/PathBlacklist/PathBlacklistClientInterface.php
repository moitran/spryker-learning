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
     * @param UrlStorageTransfer $urlStorageTransfer
     */
    public function blacklistChecking(UrlStorageTransfer $urlStorageTransfer) : void;
}
