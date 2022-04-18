<?php

namespace Pyz\Zed\Url\Business\BlacklistEventHandler;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Pyz\Zed\PathBlacklist\Communication\Plugin\Event\PathBlacklistEvents;
use Pyz\Zed\Url\Persistence\UrlEntityManagerInterface;

/**
 * Class SetUrlBlacklistHandler
 * @package Pyz\Zed\Url\Business\EventHandler
 */
class BlacklistHandler implements BlacklistHandlerInterface
{
    /**
     * @var UrlEntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param UrlEntityManagerInterface $entityManager
     */
    public function __construct(UrlEntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $eventName
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     */
    public function setBlacklistByPath(string $eventName, PathBlacklistTransfer $pathBlacklistTransfer): void
    {
        // CREATE new path black list -> update blacklist value to TRUE
        if ($eventName === PathBlacklistEvents::ENTITY_PYZ_PATH_BLACKLIST_CREATE) {
            $this->entityManager->updateUrlBlacklistByPath($pathBlacklistTransfer->getPath(), true);
        } elseif ($eventName === PathBlacklistEvents::ENTITY_PYZ_PATH_BLACKLIST_DELETE) {
            // DELETE path black list -> update blacklist value to FALSE
            $this->entityManager->updateUrlBlacklistByPath($pathBlacklistTransfer->getPath(), false);
        } else {
            // EDIT path black list
            //      -> update blacklist value to FALSE for OLD path
            //      -> update blacklist value to TRUE for NEW path
            $this->entityManager->updateUrlBlacklistByPath(
                $pathBlacklistTransfer->getBeforeUpdateTransfer()->getPath(),
                false
            );
            $this->entityManager->updateUrlBlacklistByPath($pathBlacklistTransfer->getPath(), true);
        }
    }
}
