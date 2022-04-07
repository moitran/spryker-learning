<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Validator;

/**
 * Class RecordValidator
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Validator
 */
class RecordValidator implements RecordValidatorInterface
{
    /**
     * @param array $requiredFields
     * @param array $record
     *
     * @return bool
     */
    public function isRecordValid(array $requiredFields, array $record): bool
    {
        return count(array_diff($requiredFields, array_keys($record))) === 0;
    }
}
