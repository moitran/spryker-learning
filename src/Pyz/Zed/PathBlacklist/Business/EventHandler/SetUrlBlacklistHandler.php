<?php

namespace Pyz\Zed\PathBlacklist\Business\EventHandler;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Pyz\Zed\PathBlacklist\Communication\Plugin\Event\PathBlacklistEvents;
use Pyz\Zed\PathBlacklist\Persistence\PathBlacklistRepositoryInterface;

/**
 * Class SetUrlBlacklistHandler
 * @package Pyz\Zed\PathBlacklist\Business\EventHandler
 */
class SetUrlBlacklistHandler implements SetUrlBlacklistHandlerInterface
{
    /**
     * @var PathBlacklistRepositoryInterface
     */
    protected $repository;

    /**
     * SetUrlBlacklistHandler constructor.
     *
     * @param PathBlacklistRepositoryInterface $repository
     */
    public function __construct(PathBlacklistRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $eventName
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     */
    public function setBlacklistByPath(string $eventName, PathBlacklistTransfer $pathBlacklistTransfer): void
    {
        // CREATE new path black list -> update blacklist value to TRUE
        if ($eventName === PathBlacklistEvents::ENTITY_PYZ_PATH_BLACKLIST_CREATE) {
            $this->repository->updateUrlBlacklistByPath($pathBlacklistTransfer->getPath(), true);
        } elseif ($eventName === PathBlacklistEvents::ENTITY_PYZ_PATH_BLACKLIST_DELETE) {
            // DELETE path black list -> update blacklist value to FALSE
            $this->repository->updateUrlBlacklistByPath($pathBlacklistTransfer->getOriginTransfer()->getPath(), false);
        } else {
            // EDIT path black list
            //      -> update blacklist value to FALSE for OLD path
            //      -> update blacklist value to TRUE for NEW path
            $this->repository->updateUrlBlacklistByPath($pathBlacklistTransfer->getPath(), true);
            $this->repository->updateUrlBlacklistByPath($pathBlacklistTransfer->getOriginTransfer()->getPath(), false);
        }
    }
}
