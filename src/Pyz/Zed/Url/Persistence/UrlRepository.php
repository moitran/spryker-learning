<?php

namespace Pyz\Zed\Url\Persistence;

use Generated\Shared\Transfer\UrlTransfer;
use Spryker\Zed\Url\Persistence\UrlRepository as SprykerUrlRepository;

/**
 * @method \Spryker\Zed\Url\Persistence\UrlPersistenceFactory getFactory()
 */
class UrlRepository extends SprykerUrlRepository
{
    /**
     * @param string $path
     *
     * @return array
     */
    public function findUrlByPath(string $path): array
    {
        $urls = $this->getFactory()->createUrlQuery()
            ->filterByUrl_Like(sprintf('%%%s%%', $path))
            ->find();
        $result = [];
        foreach ($urls as $url) {
            $result[] = (new UrlTransfer())->fromArray($url->toArray(), true);
        }
        return $result;
    }
}
