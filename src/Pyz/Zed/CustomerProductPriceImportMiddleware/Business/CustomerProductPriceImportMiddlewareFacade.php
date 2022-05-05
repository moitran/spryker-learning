<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

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
     * @return \Generated\Shared\Transfer\MapperConfigTransfer
     */
    public function getMapperConfig(): MapperConfigTransfer
    {
        return $this->getFactory()->createCustomerProductPriceMapper()->getMapperConfig();
    }

    /**
     * @return \Generated\Shared\Transfer\TranslatorConfigTransfer
     */
    public function getTranslatorConfig(): TranslatorConfigTransfer
    {
        return $this->getFactory()->createCustomerProductPriceDictionary()->getTranslatorConfig();
    }

    /**
     * @return \Generated\Shared\Transfer\ValidatorConfigTransfer
     */
    public function getValidatorConfig(): ValidatorConfigTransfer
    {
        return $this->getFactory()->createCustomerProductPriceValidator()->getValidatorConfig();
    }
}
