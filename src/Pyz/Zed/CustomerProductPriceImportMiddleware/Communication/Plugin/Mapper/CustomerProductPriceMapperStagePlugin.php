<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Mapper;

use Generated\Shared\Transfer\MapperConfigTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\StagePluginInterface;

/**
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\CustomerProductPriceImportMiddlewareCommunicationFactory getFactory()
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Business\CustomerProductPriceImportMiddlewareFacadeInterface getFacade()
 */
class CustomerProductPriceMapperStagePlugin extends AbstractPlugin implements StagePluginInterface
{
    protected const PLUGIN_NAME = 'CustomerProductPriceMapperStagePlugin';

    /**
     * @return string
     */
    public function getName(): string
    {
        return static::PLUGIN_NAME;
    }

    /**
     * @param $payload
     * @param \SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface $outStream
     * @param $originalPayload
     *
     * @return array
     */
    public function process($payload, WriteStreamInterface $outStream, $originalPayload): array
    {
        return $this->getFactory()
            ->getProcessFacade()
            ->map($payload, $this->getMapperConfigTransfer());
    }

    /**
     * @return \Generated\Shared\Transfer\MapperConfigTransfer
     */
    protected function getMapperConfigTransfer(): MapperConfigTransfer
    {
        return $this->getFactory()
            ->createBusinessFactory()
            ->createCustomerProductPriceMapper()
            ->getMapperConfig();
    }
}
