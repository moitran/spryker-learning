<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business;

use Generated\Shared\Transfer\CalculableObjectTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class CustomerProductPriceFacade
 *
 * @package Pyz\Zed\CustomerProductPrice\Business
 * @method \Pyz\Zed\CustomerProductPrice\Business\CustomerProductPriceBusinessFactory getFactory()
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceRepositoryInterface getRepository()
 */
class CustomerProductPriceFacade extends AbstractFacade implements CustomerProductPriceFacadeInterface
{
    /**
     * @param string $filePath
     *
     * @return bool
     */
    public function importFromJsonFile(string $filePath): bool
    {
        return $this->getFactory()->createImporter()->import($filePath);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerProductTransfer $customerProductTransfer
     *
     * @return void
     */
    public function saveCustomerProductPrice(CustomerProductTransfer $customerProductTransfer)
    {
        $this->getFactory()->createDtoWriter()->writeOne($customerProductTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CalculableObjectTransfer $calculableObjectTransfer
     *
     * @return void
     */
    public function recalculate(CalculableObjectTransfer $calculableObjectTransfer)
    {
        $this->getFactory()->createCustomerPriceCalculator()->recalculate($calculableObjectTransfer);
    }
}
