<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Validator;

/**
 * Interface FileValidatorInterface
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
