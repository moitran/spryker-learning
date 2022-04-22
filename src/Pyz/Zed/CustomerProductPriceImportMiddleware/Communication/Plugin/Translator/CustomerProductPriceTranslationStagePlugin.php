<?php

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Translator;

use Generated\Shared\Transfer\TranslatorConfigTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\StagePluginInterface;

/**
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Business\CustomerProductPriceImportMiddlewareFacadeInterface getFacade()
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\CustomerProductPriceImportMiddlewareCommunicationFactory getFactory()
 */
class CustomerProductPriceTranslationStagePlugin extends AbstractPlugin implements StagePluginInterface
{
    protected const PLUGIN_NAME = 'CustomerProductPriceTranslationStagePlugin';

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
            ->translate($payload, $this->getTranslatorConfig());
    }

    /**
     * @return \Generated\Shared\Transfer\TranslatorConfigTransfer
     */
    protected function getTranslatorConfig(): TranslatorConfigTransfer
    {
        return $this->getFacade()
            ->getCustomerProductPriceTranslatorConfig();
    }
}
