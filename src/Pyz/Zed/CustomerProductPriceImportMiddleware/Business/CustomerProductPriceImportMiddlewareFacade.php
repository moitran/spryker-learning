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
use SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface;
use SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface;

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

    /**
     * @param string $path
     *
     * @return \SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface
     */
    public function getCustomerProductPriceApiReadStream(string $path): ReadStreamInterface
    {
        return $this->getFactory()->createCustomerProductPriceApiReadStream($path);
    }

    /**
     * @return \SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface
     */
    public function getCustomerProductPriceEventWriteStream(): WriteStreamInterface
    {
        return $this->getFactory()->createCustomerProductPriceEventWriteStream();
    }
}
