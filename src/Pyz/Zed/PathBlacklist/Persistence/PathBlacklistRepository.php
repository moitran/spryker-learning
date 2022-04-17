<?php

namespace Pyz\Zed\PathBlacklist\Persistence;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
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
     * @return PathBlacklistTransfer
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function findPathBlacklistByPath(string $path): PathBlacklistTransfer
    {
        $pathBlackListEntity = $this->getFactory()
            ->createPathBlacklistQuery()
            ->filterByPath($path)
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
     * @param bool $blacklistValue
     *
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function updateUrlBlacklistByPath(string $path, bool $blacklistValue): void
    {
        // ERROR: Cannot fetch ColumnMap for undefined column phpName: spy_url.blacklist
        /* $this->getFactory()->getUrlQueryContainer()->queryUrls()
            ->filterByUrl_Like(sprintf('%%%s%%', $path))
            ->update([SpyUrlTableMap::COL_BLACKLIST => (int) $blacklistValue]); */

        $urls = $this->getFactory()->getUrlQueryContainer()->queryUrls()
            ->filterByUrl_Like(sprintf('%%%s%%', $path))
            ->find();
        foreach ($urls as $url) {
            $url->setBlacklist($blacklistValue);
            $url->save();
        }
    }
}
