<?php

namespace Pyz\Zed\PathBlacklist\Business\Writer;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Pyz\Zed\PathBlacklist\Business\EventWriter\EventWriterInterface;
use Pyz\Zed\PathBlacklist\Communication\Plugin\Event\PathBlacklistEvents;
use Pyz\Zed\PathBlacklist\Persistence\PathBlacklistEntityManagerInterface;
use Pyz\Zed\PathBlacklist\Persistence\PathBlacklistRepositoryInterface;

/**
 * Class PathBlacklistWriter
 * @package Pyz\Zed\PathBlacklist\Business\Writer
 */
class PathBlacklistWriter implements PathBlacklistWriterInterface
{
    /**
     * @var PathBlacklistRepositoryInterface
     */
    protected $repository;

    /**
     * @var PathBlacklistEntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var EventWriterInterface
     */
    protected $eventWriter;

    /**
     * PathBlacklistWriter constructor.
     *
     * @param PathBlacklistRepositoryInterface $repository
     * @param PathBlacklistEntityManagerInterface $entityManager
     * @param EventWriterInterface $eventWriter
     */
    public function __construct(
        PathBlacklistRepositoryInterface $repository,
        PathBlacklistEntityManagerInterface $entityManager,
        EventWriterInterface $eventWriter
    ) {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->eventWriter = $eventWriter;
    }

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool
    {
        $this->entityManager->createPathBlacklist($pathBlacklistTransfer);
        $this->eventWriter->write(PathBlacklistEvents::ENTITY_PYZ_PATH_BLACKLIST_CREATE, $pathBlacklistTransfer);

        return true;
    }

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool
    {
        $beforeUpdateTransfer = $this->repository->findPathBlacklistById($pathBlacklistTransfer->getIdPathBlacklist());
        $this->entityManager->updatePathBlacklist($pathBlacklistTransfer);
        $pathBlacklistTransfer->setBeforeUpdateTransfer($beforeUpdateTransfer);
        $this->eventWriter->write(PathBlacklistEvents::ENTITY_PYZ_PATH_BLACKLIST_UPDATE, $pathBlacklistTransfer);

        return true;
    }


    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function deletePathBlacklistById(PathBlacklistTransfer $pathBlacklistTransfer): bool
    {
        $this->entityManager->deletePathBlacklistById($pathBlacklistTransfer);
        $this->eventWriter->write(PathBlacklistEvents::ENTITY_PYZ_PATH_BLACKLIST_DELETE, $pathBlacklistTransfer);

        return true;
    }
}
