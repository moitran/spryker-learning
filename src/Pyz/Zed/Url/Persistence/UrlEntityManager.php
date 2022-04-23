<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Url\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \Spryker\Zed\Url\Persistence\UrlPersistenceFactory getFactory()
 */
class UrlEntityManager extends AbstractEntityManager implements UrlEntityManagerInterface
{
    public const COL_BLACKLIST = 'Blacklist';

    /**
     * @param string $path
     * @param bool $blacklistValue
     *
     * @return void
     */
    public function updateUrlBlacklistByPath(string $path, bool $blacklistValue): void
    {
        $this->getFactory()->createUrlQuery()
            ->filterByUrl_Like(sprintf('%%%s%%', $path))
            ->update([static::COL_BLACKLIST => $blacklistValue]);
    }
}
