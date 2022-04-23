<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Url\Persistence;

use Spryker\Zed\Url\Persistence\UrlRepositoryInterface as SprykerUrlRepositoryInterface;

interface UrlRepositoryInterface extends SprykerUrlRepositoryInterface
{
    /**
     * @param string $path
     *
     * @return array
     */
    public function findUrlByPath(string $path): array;
}
