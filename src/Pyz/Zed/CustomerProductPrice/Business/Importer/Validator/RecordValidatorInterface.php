<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Validator;

/**
 * Interface RecordValidatorInterface
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Validator
 */
interface RecordValidatorInterface
{
    /**
     * @param array $requiredFields
     * @param array $record
     *
     * @return bool
     */
    public function isRecordValid(array $requiredFields, array $record): bool;
}
