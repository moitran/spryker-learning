<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business;

use Pyz\Zed\CustomerProductPrice\Business\Calculator\CustomerProductPriceCalculator;
use Pyz\Zed\CustomerProductPrice\Business\Calculator\CustomerProductPriceCalculatorInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Importer;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Parser\JsonToDtoParser;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Parser\JsonToDtoParserInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Reader\FileReader;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Reader\FileReaderInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\FileValidator;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\FileValidatorInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\RecordValidator;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\RecordValidatorInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\DatabaseWriter;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\EventWriter;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\WriterInterface;
use Pyz\Zed\CustomerProductPrice\CustomerProductPriceDependencyProvider;
use Spryker\Zed\Event\Business\EventFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\Money\Business\MoneyFacadeInterface;

/**
 * Class CustomerProductPriceBusinessFactory
 *
 * @package Pyz\Zed\CustomerProductPrice\Business
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceEntityManager getEntityManager()
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceRepositoryInterface getRepository()
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceQueryContainerInterface getQueryContainer()
 */
class CustomerProductPriceBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\CustomerProductPrice\Business\Importer\Importer
     */
    public function createImporter()
    {
        return new Importer(
            $this->createFileValidator(),
            $this->createFileReader(),
            $this->createDtoParser(),
            $this->createImportEventWriter()
        );
    }

    /**
     * @return \Pyz\Zed\CustomerProductPrice\Business\Calculator\CustomerProductPriceCalculator
     */
    public function createCustomerPriceCalculator(): CustomerProductPriceCalculatorInterface
    {
        return new CustomerProductPriceCalculator(
            $this->getRepository()
        );
    }

    /**
     * @return \Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\FileValidatorInterface
     */
    protected function createFileValidator(): FileValidatorInterface
    {
        return new FileValidator();
    }

    /**
     * @return \Pyz\Zed\CustomerProductPrice\Business\Importer\Reader\FileReaderInterface
     */
    protected function createFileReader(): FileReaderInterface
    {
        return new FileReader();
    }

    /**
     * @return \Pyz\Zed\CustomerProductPrice\Business\Importer\Parser\JsonToDtoParserInterface
     */
    protected function createDtoParser(): JsonToDtoParserInterface
    {
        return new JsonToDtoParser(
            $this->createRecordValidator(),
            $this->getMoneyFacade()
        );
    }

    /**
     * @return \Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\RecordValidatorInterface
     */
    protected function createRecordValidator(): RecordValidatorInterface
    {
        return new RecordValidator();
    }

    /**
     * @return \Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\WriterInterface
     */
    public function createDtoWriter(): WriterInterface
    {
        return new DatabaseWriter(
            $this->getEntityManager()
        );
    }

    /**
     * @return \Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\EventWriter
     */
    protected function createImportEventWriter(): WriterInterface
    {
        return new EventWriter(
            $this->getEventFacade()
        );
    }

    /**
     * @return \Spryker\Zed\Event\Business\EventFacadeInterface
     */
    protected function getEventFacade(): EventFacadeInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceDependencyProvider::FACADE_EVENT);
    }

    /**
     * @return \Spryker\Zed\Money\Business\MoneyFacadeInterface
     */
    protected function getMoneyFacade(): MoneyFacadeInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceDependencyProvider::FACADE_MONEY);
    }
}
