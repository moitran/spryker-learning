<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Validator;

/**
 * Class FileValidator
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
