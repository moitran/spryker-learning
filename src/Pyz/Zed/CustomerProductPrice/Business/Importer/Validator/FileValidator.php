<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Validator;

/**
 * Class FileValidator
 *
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Validator
 */
class FileValidator implements FileValidatorInterface
{
    /**
     * @param string $filePath
     *
     * @return bool
     */
    public function isFilePathValid(string $filePath): bool
    {
        return $filePath !== '' && is_readable($filePath);
    }
}
