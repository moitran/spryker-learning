<?php

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistCollectionTransfer;
use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * Class PathBlacklistRepository
 * @package Pyz\Zed\PathBlacklist\Persistence
 * @method PathBlacklistPersistenceFactory getFactory()
 */
class PathBlacklistRepository extends AbstractRepository implements PathBlacklistRepositoryInterface
{
    /**
     * @param int $idPathBlacklist
     *
     * @return PathBlacklistTransfer
     */
    public function findPathBlacklistById(int $idPathBlacklist): PathBlacklistTransfer
    {
        $pathBlackListEntity = $this->getFactory()
            ->findByIdPathBlacklist((new PathBlacklistTransfer())->setIdPathBlacklist($idPathBlacklist))
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
     * @return PathBlacklistCollectionTransfer
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
