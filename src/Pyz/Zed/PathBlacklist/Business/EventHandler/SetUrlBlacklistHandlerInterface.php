<?php

namespace Pyz\Zed\PathBlacklist\Business\EventHandler;

use Generated\Shared\Transfer\PathBlacklistTransfer;

/**
 * Interface SetUrlBlacklistHandlerInterface
 * @package Pyz\Zed\PathBlacklist\Business\EventHandler
 */
interface SetUrlBlacklistHandlerInterface
{
    /**
     * @param string $eventName
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     */
    public function setBlacklistByPath(string $eventName, PathBlacklistTransfer $pathBlacklistTransfer): void;
}
