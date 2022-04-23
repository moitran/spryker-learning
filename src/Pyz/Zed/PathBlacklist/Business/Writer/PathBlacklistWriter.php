<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklist\Business\Writer;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Pyz\Zed\PathBlacklist\Persistence\PathBlacklistEntityManagerInterface;
use Pyz\Zed\PathBlacklist\Persistence\PathBlacklistRepositoryInterface;
use Pyz\Zed\Url\Business\UrlFacadeInterface;

/**
 * Class PathBlacklistWriter
 *
 * @package Pyz\Zed\PathBlacklist\Business\Writer
 */
class PathBlacklistWriter implements PathBlacklistWriterInterface
{
    /**
     * @var \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistRepositoryInterface
     */
    protected $repository;

    /**
     * @var \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistEntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var \Pyz\Zed\Url\Business\UrlFacadeInterface
     */
    protected $urlFacade;

    /**
     * @param \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistRepositoryInterface $repository
     * @param \Pyz\Zed\PathBlacklist\Persistence\PathBlacklistEntityManagerInterface $entityManager
     * @param \Pyz\Zed\Url\Business\UrlFacadeInterface $urlFacade
     */
    public function __construct(
        PathBlacklistRepositoryInterface $repository,
        PathBlacklistEntityManagerInterface $entityManager,
        UrlFacadeInterface $urlFacade
    ) {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->urlFacade = $urlFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function createPathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool
    {
        $this->entityManager->createPathBlacklist($pathBlacklistTransfer);
        $this->urlFacade->setBlacklistByPath($pathBlacklistTransfer->getPath(), true);

        return true;
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function updatePathBlacklist(PathBlacklistTransfer $pathBlacklistTransfer): bool
    {
        $beforeUpdateTransfer = $this->repository->findPathBlacklistById($pathBlacklistTransfer->getIdPathBlacklist());
        $this->entityManager->updatePathBlacklist($pathBlacklistTransfer);
        $this->urlFacade->setBlacklistByPath($beforeUpdateTransfer->getPath(), false);
        $this->urlFacade->setBlacklistByPath($pathBlacklistTransfer->getPath(), true);

        return true;
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return bool
     */
    public function deletePathBlacklistById(PathBlacklistTransfer $pathBlacklistTransfer): bool
    {
        $this->entityManager->deletePathBlacklistById($pathBlacklistTransfer);
        $this->urlFacade->setBlacklistByPath($pathBlacklistTransfer->getPath(), false);

        return true;
    }
}
