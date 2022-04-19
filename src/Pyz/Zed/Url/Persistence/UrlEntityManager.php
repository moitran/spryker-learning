<?php

namespace Pyz\Zed\Url\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;
use Spryker\Zed\Url\Persistence\UrlPersistenceFactory;

/**
 * @method UrlPersistenceFactory getFactory()
 */
class UrlEntityManager extends AbstractEntityManager implements UrlEntityManagerInterface
{
    public const COL_BLACKLIST = 'Blacklist';

    /**
     * @param string $path
     * @param bool $blacklistValue
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function updateUrlBlacklistByPath(string $path, bool $blacklistValue): void
    {
        $this->getFactory()->createUrlQuery()
            ->filterByUrl_Like(sprintf('%%%s%%', $path))
            ->update([static::COL_BLACKLIST => $blacklistValue]);
    }
}
