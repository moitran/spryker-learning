<?php

namespace Pyz\Zed\Url\Persistence;
use Spryker\Zed\Url\Persistence\UrlRepositoryInterface as SprykerUrlRepositoryInterface;

interface UrlRepositoryInterface extends SprykerUrlRepositoryInterface
{
    /**
     * @param string $path
     *
     * @return array
     */
    public function findUrlByPath(string $path) : array;
}
