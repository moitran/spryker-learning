<?php

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery;

interface PathBlacklistQueryContainerInterface
{
    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return \Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery
     */
    public function findByIdPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer) : PyzPathBlacklistQuery;

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return \Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery
     */
    public function findByPath(PathBlacklistTransfer $pathBlacklistTransfer) : PyzPathBlacklistQuery;
}
