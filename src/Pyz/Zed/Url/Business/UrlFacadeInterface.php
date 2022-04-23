<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Url\Business;

use Spryker\Zed\Url\Business\UrlFacadeInterface as SprykerUrlFacadeInterface;

interface UrlFacadeInterface extends SprykerUrlFacadeInterface
{
    /**
     * @param string $path
     * @param bool $blacklistValue
     *
     * @return void
     */
    public function setBlacklistByPath(string $path, bool $blacklistValue): void;

    /**
     * @param string $path
     *
     * @return array
     */
    public function findUrlByPath(string $path): array;
}
