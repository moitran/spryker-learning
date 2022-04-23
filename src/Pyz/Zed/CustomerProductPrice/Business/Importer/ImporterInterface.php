<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Importer;

/**
 * Interface ImporterInterface
 *
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer
 */
interface ImporterInterface
{
    /**
     * @param string $filePath
     *
     * @return bool
     */
    public function import(string $filePath): bool;
}
