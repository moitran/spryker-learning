<?php

namespace Pyz\Zed\Url\Business;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Zed\Url\Business\UrlFacadeInterface as SprykerUrlFacadeInterface;

interface UrlFacadeInterface extends SprykerUrlFacadeInterface
{
    /**
     * @param string $eventName
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     */
    public function setBlacklistByPath(string $eventName, PathBlacklistTransfer $pathBlacklistTransfer): void;

    /**
     * @param string $path
     *
     * @return array
     */
    public function findUrlByPath(string $path) : array;
}
