<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Validator;

/**
 * Interface RecordValidatorInterface
 *
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
