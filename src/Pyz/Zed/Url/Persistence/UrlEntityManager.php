<?php

namespace Pyz\Zed\Url\Persistence;

use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;
use Spryker\Zed\Url\Persistence\UrlPersistenceFactory;

/**
 * @method UrlPersistenceFactory getFactory()
 */
class UrlEntityManager extends AbstractEntityManager implements UrlEntityManagerInterface
{
    /**
     * @param string $path
     * @param bool $blacklistValue
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function updateUrlBlacklistByPath(string $path, bool $blacklistValue) : void
    {
        $urls = $this->getFactory()->createUrlQuery()
            ->filterByUrl_Like(sprintf('%%%s%%', $path))
            ->find();
        foreach ($urls as $url) {
            $url->setBlacklist($blacklistValue);
            $url->save();
        }
    }
}
