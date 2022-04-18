<?php

namespace Pyz\Client\SiteMap\Reader;

use Generated\Shared\Transfer\SiteMapCollectionTransfer;
use Generated\Shared\Transfer\SiteMapTransfer;
use Spryker\Client\Storage\StorageClientInterface;

/**
 * Class UrlReader
 * @package Pyz\Client\SiteMap\Reader
 */
class UrlReader implements UrlReaderInterface
{
    protected const MAX_ITEMS_PER_PAGE = 100;

    protected const URL_STORAGE_URL_COL = 'url';
    protected const URL_STORAGE_TIMESTAMP_COL = '_timestamp';
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
        $urls = $this->pagination($urls, $pageNumber);

        // Transfer to DTO
        $collection = new SiteMapCollectionTransfer();
        foreach ($urls as $url) {
            $sitemapTransfer = new SiteMapTransfer();
            $sitemapTransfer->fromArray($url);
            $collection->addSiteMap($sitemapTransfer);
        }

        return $collection;
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
     * @return array
     */
    protected function getAllCachedUrls()
    {
        $urlCachedKeys = $this->getUrlCachedKeys();
        $urlCachedKeysFormatted = $this->formatAndSort($urlCachedKeys);
        $urls = $this->storageClient->getMulti($urlCachedKeysFormatted);
        $result = [];
        foreach ($urls as $url) {
            $urlData = json_decode($url, true);
            // filter out black list URL in sitemap
            if (!empty($urlData[static::URL_STORAGE_BLACKLIST_COL])) {
                continue;
            }
            $result[] = [
                'url' => $urlData[static::URL_STORAGE_URL_COL],
                'lastModified' => date("Y-m-d", $urlData[static::URL_STORAGE_TIMESTAMP_COL]),
            ];
        }

        return $result;
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
}
