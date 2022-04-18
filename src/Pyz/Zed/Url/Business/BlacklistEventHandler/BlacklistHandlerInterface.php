<?php

namespace Pyz\Zed\Url\Business\BlacklistEventHandler;

use Generated\Shared\Transfer\PathBlacklistTransfer;

interface BlacklistHandlerInterface
{
    /**
     * @param string $eventName
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     */
    public function setBlacklistByPath(string $eventName, PathBlacklistTransfer $pathBlacklistTransfer): void;
}
