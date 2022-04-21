<?php

namespace Pyz\Zed\Url\Business;

use Spryker\Zed\Url\Business\UrlFacadeInterface as SprykerUrlFacadeInterface;

interface UrlFacadeInterface extends SprykerUrlFacadeInterface
{
    /**
     * @param string $path
     * @param bool $blacklistValue
     *
     * @return void
     */
    public function setBlacklistByPath(string $path, bool $blacklistValue): void;

    /**
     * @param string $path
     *
     * @return array
     */
    public function findUrlByPath(string $path) : array;
}
