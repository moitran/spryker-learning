<?php

namespace Pyz\Zed\PathBlacklist\Persistence;

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
            ->createPathBlacklistQuery()
            ->findOneByIdPathBlacklist($idPathBlacklist);

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
     * @return \ArrayObject
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function findPathBlacklistByPath(string $path): \ArrayObject
    {
        $pathBlackListEntities = $this->getFactory()
            ->createPathBlacklistQuery()
            ->filterByPath_Like(sprintf('%%%s%%', $path))
            ->find();

        if ($pathBlackListEntities === null) {
            return new \ArrayObject();
        }

        $collection = new \ArrayObject();
        foreach ($pathBlackListEntities as $blackListEntity) {
            $collection->append((new PathBlacklistTransfer())->fromArray($blackListEntity->toArray()));
        }

        return $collection;
    }
}
