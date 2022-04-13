<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Communication\Plugin\Event\Listener;

use Generated\Shared\Transfer\EventEntityTransfer;
use Pyz\Zed\CustomerProductPrice\Dependency\CustomerProductPriceEvents;
use Pyz\Zed\CustomerProductPriceStorage\Business\CustomerProductPriceStorageFacadeInterface;
use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class CustomerProductPriceEventListener
 * @package Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\Listener
 * @method CustomerProductPriceStorageFacadeInterface getFacade() : AbstractFacade
 */
class CustomerProductPriceStorageEventListener extends AbstractPlugin implements EventHandlerInterface
{
    /**
     * @param TransferInterface $transfer
     * @param string $eventName
     */
    public function handle(TransferInterface $transfer, $eventName)
    {
        /** @var EventEntityTransfer $transfer */
        $this->getFacade()->publish($transfer);
    }
}
