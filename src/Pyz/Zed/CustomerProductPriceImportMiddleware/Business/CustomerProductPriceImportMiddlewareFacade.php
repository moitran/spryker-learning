<?php

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Business;

use Generated\Shared\Transfer\MapperConfigTransfer;
use Generated\Shared\Transfer\TranslatorConfigTransfer;
use Generated\Shared\Transfer\ValidatorConfigTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Business\CustomerProductPriceImportMiddlewareBusinessFactory getFactory()
 */
class CustomerProductPriceImportMiddlewareFacade extends AbstractFacade implements CustomerProductPriceImportMiddlewareFacadeInterface
{
    /**
     * @return \Generated\Shared\Transfer\TranslatorConfigTransfer;
     */
    public function getCustomerProductPriceTranslatorConfig(): TranslatorConfigTransfer
    {
        return $this->getFactory()
            ->createCustomerProductPriceDictionary()
            ->getTranslatorConfig();
    }

    /**
     * @return \Generated\Shared\Transfer\MapperConfigTransfer
     */
    public function getCustomerProductPriceMapperConfigTransfer() : MapperConfigTransfer
    {
        return $this->getFactory()
            ->createCustomerProductPriceMapper()
            ->getMapperConfig();
    }

    /**
     * @return \Generated\Shared\Transfer\ValidatorConfigTransfer
     */
    public function getValidatorConfigTransfer() : ValidatorConfigTransfer
    {
        return $this->getFactory()
            ->createCustomerProductPriceValidator()
            ->getValidatorConfig();
    }
}
