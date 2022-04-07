<?php

namespace Pyz\Zed\CustomerProductPrice\Business;

use Generated\Shared\Transfer\CustomerProductTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class CustomerProductPriceFacade
 * @package Pyz\Zed\CustomerProductPrice\Business
 * @method CustomerProductPriceBusinessFactory getFactory()
 */
class CustomerProductPriceFacade extends AbstractFacade implements CustomerProductPriceFacadeInterface
{
    /**
     * @param string $filePath
     *
     * @return bool
     * @throws \Exception
     */
    public function importFromJsonFile(string $filePath): bool
    {
        return $this->getFactory()->createImporter()->import($filePath);
    }

    /**
     * @param CustomerProductTransfer $customerProductTransfer
     *
     * @return mixed|void
     */
    public function saveCustomerProductPrice(CustomerProductTransfer $customerProductTransfer)
    {
        $this->getFactory()->createDtoWriter()->writeOne($customerProductTransfer);
    }
}
