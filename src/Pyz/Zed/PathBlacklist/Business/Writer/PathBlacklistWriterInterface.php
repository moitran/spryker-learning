<?php

namespace Pyz\Zed\PathBlacklist\Business\Writer;

use Generated\Shared\Transfer\PathBlacklistTransfer;

/**
 * Interface UrlBlacklistWriterInterface
 * @package Pyz\Zed\PathBlacklist\Business\Writer
 */
interface PathBlacklistWriterInterface
{
    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool;

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool;

    /**
     * @param $idPathBlacklist
     *
     * @return bool
     */
    public function deletePathBlacklistById($idPathBlacklist): bool;
}
