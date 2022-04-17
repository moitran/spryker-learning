<?php

namespace Pyz\Zed\PathBlacklist\Communication\Plugin\Event\Listener;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class PathBlacklistEventListener
 * @package Pyz\Zed\PathBlacklist\Communication\Plugin\Event\Listener
 */
class PathBlacklistEventListener extends AbstractPlugin implements EventHandlerInterface
{
    /**
     * @param TransferInterface $transfer
     * @param string $eventName
     */
    public function handle(TransferInterface $transfer, $eventName)
    {
        /**
         * @var PathBlacklistTransfer $transfer
         */
        $this->getFacade()->setBlacklistByPath($eventName, $transfer);
    }
}
