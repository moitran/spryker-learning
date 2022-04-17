<?php

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistTransfer;

/**
 * Interface PathBlacklistRepositoryInterface
 * @package Pyz\Zed\PathBlacklist\Persistence
 */
interface PathBlacklistRepositoryInterface
{
    /**
     * @param int $idPathBlacklist
     *
     * @return PathBlacklistTransfer
     */
    public function findPathBlacklistById(int $idPathBlacklist): PathBlacklistTransfer;

    /**
     * @param string $path
     *
     * @return PathBlacklistTransfer
     */
    public function findPathBlacklistByPath(string $path): PathBlacklistTransfer;

    /**
     * @param string $path
     * @param bool $blacklistValue
     */
    public function updateUrlBlacklistByPath(string $path, bool $blacklistValue): void;
}
