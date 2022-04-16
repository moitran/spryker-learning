<?php

namespace Pyz\Client\PathBlacklist\Resolver;

use Generated\Shared\Transfer\UrlStorageTransfer;
use Spryker\Client\UrlStorage\UrlStorageClientInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class BlacklistResolver
 * @package Pyz\Client\PathBlacklist\Resolver
 */
class BlacklistResolver implements BlacklistResolverInterface
{
    /**
     * @var UrlStorageClientInterface
     */
    protected $urlStorageClient;

    /**
     * BlacklistResolver constructor.
     *
     * @param UrlStorageClientInterface $urlStorageClient
     */
    public function __construct(UrlStorageClientInterface $urlStorageClient)
    {
        $this->urlStorageClient = $urlStorageClient;
    }

    /**
     * @param UrlStorageTransfer $urlStorageTransfer
     */
    public function blacklistChecking(UrlStorageTransfer $urlStorageTransfer) : void
    {
        $urlStorageTransfer = $this->urlStorageClient->findUrlStorageTransferByUrl($urlStorageTransfer->getUrl());
        if ($urlStorageTransfer->getBlacklist()) {
            throw new NotFoundHttpException();
        }
    }
}
