<?php

namespace Pyz\Zed\PathBlacklist\Business;

use Generated\Shared\Transfer\EventEntityTransfer;
use Generated\Shared\Transfer\PathBlacklistTransfer;

/**
 * Interface PathBlacklistFacadeInterface
 * @package Pyz\Zed\PathBlacklist\Business
 */
interface PathBlacklistFacadeInterface
{
    /**
     * @param int $idPathBlacklist
     *
     * @return PathBlacklistTransfer
     */
    public function findPathBlacklistById(int $idPathBlacklist) : PathBlacklistTransfer;

    /**
     * @param string $path
     *
     * @return \ArrayObject
     */
    public function findPathBlacklistByPath(string $path): \ArrayObject;

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer) : bool;

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool;

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function deletePathBlacklistById(PathBlacklistTransfer $pathBlacklistTransfer) : bool;
}
