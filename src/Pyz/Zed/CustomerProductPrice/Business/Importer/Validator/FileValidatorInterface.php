<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Validator;

/**
 * Interface FileValidatorInterface
 *
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Validator
 */
interface FileValidatorInterface
{
    /**
     * @param string $filePath
     *
     * @return bool
     */
    public function isFilePathValid(string $filePath): bool;
}
