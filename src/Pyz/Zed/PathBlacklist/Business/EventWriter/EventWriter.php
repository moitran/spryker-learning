<?php

namespace Pyz\Zed\PathBlacklist\Business\EventWriter;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Zed\Event\Business\EventFacadeInterface;

/**
 * Class EventWriter
 * @package Pyz\Zed\PathBlacklist\Business\EventWriter
 */
class EventWriter implements EventWriterInterface
{
    /**
     * @var EventFacadeInterface
     */
    protected $eventFacade;

    /**
     * EventWriter constructor.
     *
     * @param EventFacadeInterface $eventFacade
     */
    public function __construct(EventFacadeInterface $eventFacade)
    {
        $this->eventFacade = $eventFacade;
    }

    /**
     * @param string $eventName
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     */
    public function write(string $eventName, PathBlacklistTransfer $pathBlacklistTransfer): void
    {
        $this->eventFacade->trigger($eventName, $pathBlacklistTransfer);
    }
}
