<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistCollectionTransfer;
use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * Class PathBlacklistRepository
 *
 * @package Pyz\Zed\PathBlacklist\Persistence
 * @method \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistPersistenceFactory getFactory()
 */
class PathBlacklistRepository extends AbstractRepository implements PathBlacklistRepositoryInterface
{
    /**
     * @param int $idPathBlacklist
     *
     * @return \Generated\Shared\Transfer\PathBlacklistTransfer
     */
    public function findPathBlacklistById(int $idPathBlacklist): PathBlacklistTransfer
    {
        $pathBlackListEntity = $this->getFactory()
            ->createPathBlacklistQuery()
            ->findByIdPathBlacklist($idPathBlacklist)
            ->findOne();

        $pathBlackListTransfer = new PathBlacklistTransfer();
        if ($pathBlackListEntity === null) {
            return $pathBlackListTransfer;
        }
        $pathBlackListTransfer->fromArray($pathBlackListEntity->toArray());

        return $pathBlackListTransfer;
    }

    /**
     * @param string $path
     *
     * @return \Generated\Shared\Transfer\PathBlacklistCollectionTransfer
     */
    public function findPathBlacklistByPath(string $path): PathBlacklistCollectionTransfer
    {
        $pathBlackListEntities = $this->getFactory()
            ->createPathBlacklistQuery()
            ->filterByPath_Like(sprintf('%%%s%%', $path))
            ->find();

        $collection = new PathBlacklistCollectionTransfer();
        foreach ($pathBlackListEntities as $blackListEntity) {
            $collection->addPathBlacklist((new PathBlacklistTransfer())->fromArray($blackListEntity->toArray()));
        }

        return $collection;
    }
}
