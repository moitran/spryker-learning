<?php

namespace Pyz\Zed\CustomerProductPrice\Business;

use Pyz\Zed\CustomerProductPrice\Business\Importer\Parser\JsonToDtoParser;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Parser\JsonToDtoParserInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Reader\FileReader;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Reader\FileReaderInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\FileValidator;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\FileValidatorInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\RecordValidator;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\RecordValidatorInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\DatabaseWriter;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\WriterInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\EventWriter;
use Pyz\Zed\CustomerProductPrice\CustomerProductPriceDependencyProvider;
use Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceEntityManager;
use Spryker\Zed\Event\Business\EventFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Importer;

/**
 * Class CustomerProductPriceBusinessFactory
 * @package Pyz\Zed\CustomerProductPrice\Business
 * @method CustomerProductPriceEntityManager getEntityManager()
 */
class CustomerProductPriceBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return Importer
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
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
     * @return FileValidatorInterface
     */
    protected function createFileValidator(): FileValidatorInterface
    {
        return new FileValidator();
    }

    /**
     * @return FileReaderInterface
     */
    protected function createFileReader(): FileReaderInterface
    {
        return new FileReader();
    }

    /**
     * @return JsonToDtoParserInterface
     */
    protected function createDtoParser(): JsonToDtoParserInterface
    {
        return new JsonToDtoParser(
            $this->createRecordValidator()
        );
    }

    /**
     * @return RecordValidatorInterface
     */
    protected function createRecordValidator(): RecordValidatorInterface
    {
        return new RecordValidator();
    }

    /**
     * @return WriterInterface
     */
    public function createDtoWriter(): WriterInterface
    {
        return new DatabaseWriter(
            $this->getEntityManager()
        );
    }

    /**
     * @return EventWriter
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function createImportEventWriter(): WriterInterface
    {
        return new EventWriter(
            $this->getEventFacade()
        );
    }

    /**
     * @return EventFacadeInterface
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getEventFacade(): EventFacadeInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceDependencyProvider::FACADE_EVENT);
    }
}
