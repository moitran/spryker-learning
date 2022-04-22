<?php

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Business;

use Generated\Shared\Transfer\MapperConfigTransfer;
use Generated\Shared\Transfer\TranslatorConfigTransfer;
use Generated\Shared\Transfer\ValidatorConfigTransfer;

interface CustomerProductPriceImportMiddlewareFacadeInterface
{
    /**
     * @return \Generated\Shared\Transfer\TranslatorConfigTransfer;
     */
    public function getCustomerProductPriceTranslatorConfig(): TranslatorConfigTransfer;

    /**
     * @return \Generated\Shared\Transfer\MapperConfigTransfer
     */
    public function getCustomerProductPriceMapperConfigTransfer() : MapperConfigTransfer;

    /**
     * @return \Generated\Shared\Transfer\ValidatorConfigTransfer
     */
    public function getValidatorConfigTransfer() : ValidatorConfigTransfer;
}
