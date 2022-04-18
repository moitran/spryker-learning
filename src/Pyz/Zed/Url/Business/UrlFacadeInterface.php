<?php

namespace Pyz\Zed\Url\Business;

use Generated\Shared\Transfer\PathBlacklistTransfer;

interface UrlFacadeInterface
{
    /**
     * @param string $eventName
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     */
    public function setBlacklistByPath(string $eventName, PathBlacklistTransfer $pathBlacklistTransfer): void;
}
