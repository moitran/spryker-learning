<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Reader;

/**
 * Interface FileReaderInterface
 *
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Reader
 */
interface FileReaderInterface
{
    /**
     * @param string $filePath
     *
     * @return string
     */
    public function read(string $filePath): string;
}
