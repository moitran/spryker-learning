<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Url\Business;

use Spryker\Zed\Url\Business\UrlFacade as SprykerUrlFacade;

/**
 * @method \Pyz\Zed\Url\Persistence\UrlRepositoryInterface getRepository()
 * @method \Pyz\Zed\Url\Persistence\UrlEntityManagerInterface getEntityManager()
 */
class UrlFacade extends SprykerUrlFacade implements UrlFacadeInterface
{
    /**
     * @param string $path
     * @param bool $blacklistValue
     *
     * @return void
     */
    public function setBlacklistByPath(string $path, bool $blacklistValue): void
    {
        $this->getEntityManager()->updateUrlBlacklistByPath($path, $blacklistValue);
    }

    /**
     * @param string $path
     *
     * @return array
     */
    public function findUrlByPath(string $path): array
    {
        return $this->getRepository()->findUrlByPath($path);
    }
}
