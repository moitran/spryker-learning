<?php

namespace Pyz\Zed\PathBlacklist\Business\EventWriter;

use Generated\Shared\Transfer\PathBlacklistTransfer;

/**
 * Interface EventWriterInterface
 * @package Pyz\Zed\PathBlacklist\Business\Writer
 */
interface EventWriterInterface
{
    public function write(string $eventName, PathBlacklistTransfer $pathBlacklistTransfer): void;
}
