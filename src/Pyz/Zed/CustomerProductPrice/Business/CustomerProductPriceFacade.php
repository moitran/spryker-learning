<?php

namespace Pyz\Zed\CustomerProductPrice\Business;

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
}
