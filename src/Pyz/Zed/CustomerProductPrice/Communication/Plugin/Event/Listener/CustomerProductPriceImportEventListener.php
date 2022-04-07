<?php

namespace Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\Listener;

use Generated\Shared\Transfer\CustomerProductTransfer;
use Pyz\Zed\CustomerProductPrice\Business\CustomerProductPriceFacadeInterface;
use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class CustomerProductPriceEventListener
 * @package Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\Listener
 * @method CustomerProductPriceFacadeInterface getFacade() : AbstractFacade
 */
class CustomerProductPriceImportEventListener extends AbstractPlugin implements EventHandlerInterface
{
    /**
     * @param TransferInterface $transfer
     * @param string $eventName
     */
    public function handle(TransferInterface $transfer, $eventName)
    {
        /** @var CustomerProductTransfer $transfer */
        $this->getFacade()->saveCustomerProductPrice($transfer);
    }
}
