<?php

namespace Pyz\Zed\CustomerProductPrice\Business;

/**
 * Interface ImporterInterface
 * @package Pyz\Zed\CustomerProductPrice\Business
 */
interface ImporterInterface
{
    /**
     * @param string $filePath
     *
     * @return bool
     */
    public function import(string $filePath) : bool;
}
