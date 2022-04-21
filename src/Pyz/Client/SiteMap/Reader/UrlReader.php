<?php

namespace Pyz\Client\SiteMap\Reader;

use Generated\Shared\Transfer\SiteMapCollectionTransfer;
use Generated\Shared\Transfer\SiteMapTransfer;
use Generated\Shared\Transfer\UrlTransfer;
use Spryker\Client\Storage\StorageClientInterface;

/**
 * Class UrlReader
 * @package Pyz\Client\SiteMap\Reader
 */
class UrlReader implements UrlReaderInterface
{
    protected const MAX_ITEMS_PER_PAGE = 100;

    protected const URL_STORAGE_BLACKLIST_COL = 'blacklist';

    /**
     * @var StorageClientInterface
     */
    protected $storageClient;

    /**
     * UrlReader constructor.
     *
     * @param StorageClientInterface $storageClient
     */
    public function __construct(StorageClientInterface $storageClient)
    {
        $this->storageClient = $storageClient;
    }

    /**
     * @param int $pageNumber
     *
     * @return SiteMapCollectionTransfer
     */
    public function getPageData(int $pageNumber): SiteMapCollectionTransfer
    {
        $urls = $this->getAllCachedUrls();
        $urlTransfers = $this->pagination($urls, $pageNumber);

        // Transfer to DTO
        return $this->transformToSiteMapCollectionTransfer($urlTransfers);
    }

    /**
     * @return int
     */
    public function getTotalPage(): int
    {
        $urls = $this->getAllCachedUrls();

        return count(array_chunk($urls, static::MAX_ITEMS_PER_PAGE));
    }

    /**
     * @return UrlTransfer[]
     */
    protected function getAllCachedUrls()
    {
        $urlCachedKeys = $this->getUrlCachedKeys();
        $urlCachedKeysFormatted = $this->formatAndSort($urlCachedKeys);
        $urls = $this->storageClient->getMulti($urlCachedKeysFormatted);
        $urlTransfers = [];
        foreach ($urls as $url) {
            $urlData = json_decode($url, true);
            // filter out black list URL in sitemap
            if (!empty($urlData[static::URL_STORAGE_BLACKLIST_COL])) {
                continue;
            }
            $urlTransfers[] = (new UrlTransfer())->fromArray($urlData, true);
        }

        return $urlTransfers;
    }

    /**
     * @return array
     */
    protected function getUrlCachedKeys()
    {
        // Get all cache key belong to 'url:'
        return $this->storageClient->getKeys('url:*');
    }

    /**
     * @param array $urlCachedKeys
     *
     * @return array
     */
    protected function formatAndSort(array $urlCachedKeys): array
    {
        // Format cache key - remove 'kv:' prefix
        $urlCachedKeys = array_map(function ($cachedKey) {
            return substr($cachedKey, 3);
        }, $urlCachedKeys);
        // Sort cached key asc
        sort($urlCachedKeys);

        return $urlCachedKeys;
    }

    /**
     * @param array $list
     * @param int $pageNumber
     *
     * @return array
     */
    protected function pagination(array $list, int $pageNumber): array
    {
        $chunk = array_chunk($list, static::MAX_ITEMS_PER_PAGE);

        return $chunk[$pageNumber - 1] ?? [];
    }

    /**
     * @param UrlTransfer[] $urlTransfers
     *
     * @return \Generated\Shared\Transfer\SiteMapCollectionTransfer
     */
    protected function transformToSiteMapCollectionTransfer(array $urlTransfers): SiteMapCollectionTransfer
    {
        $collection = new SiteMapCollectionTransfer();
        /**
         * @var UrlTransfer $urlTransfer
         */
        foreach ($urlTransfers as $urlTransfer) {
            $sitemapTransfer = new SiteMapTransfer();
            $sitemapTransfer->setUrl($urlTransfer->getUrl());
            $collection->addSiteMap($sitemapTransfer);
        }

        return $collection;
    }
}
