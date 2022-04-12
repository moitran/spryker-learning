<?php

namespace PyzTest\Zed\CustomerProductPrice\Business;

use Codeception\Test\Unit;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery;
use Pyz\Zed\CustomerProductPrice\Business\CustomerProductPriceFacade;
use Pyz\Zed\CustomerProductPrice\Business\Importer;

/**
 * Class ImportTest
 * @package PyzTest\Zed\CustomerProductPrice\Business
 */
class ImportTest extends Unit
{
    public function testImportSuccess()
    {
        // A1 - arrange
        $filePath = dirname(__DIR__) . '/_data/data-import.json';
        $importerFacade = $this->getImporterFacade();

        // A2 - act
        $success = $importerFacade->importFromJsonFile($filePath);

        // A3 - assert
        $this->assertTrue($success);
        $this->assertEquals(4, PyzCustomerProductQuery::create()->count());
        $this->assertEquals(7, PyzCustomerProductPriceQuery::create()->count());
    }

    public function testParsingFileFailed()
    {
        // A1 - arrange
        $filePath = dirname(__DIR__) . '/_data/data-import-invalid-format.json';
        $importerFacade = $this->getImporterFacade();

        // A3 - assert
        $this->expectException(Importer\Exception\InvalidJsonException::class);

        // A2 - act
        $importerFacade->importFromJsonFile($filePath);
    }

    public function testImportFileIsUnread()
    {
        // A1 - arrange
        $filePath = dirname(__DIR__) . '/_data/data-import-not-found.json';
        $importerFacade = $this->getImporterFacade();

        // A2 - act
        $failed = $importerFacade->importFromJsonFile($filePath);

        // A3 - assert
        $this->assertFalse($failed);
    }

    public function testImportFilePathEmpty()
    {
        // A1 - arrange
        $filePath = '';
        $importerFacade = $this->getImporterFacade();

        // A2 - act
        $failed = $importerFacade->importFromJsonFile($filePath);

        // A3 - assert
        $this->assertFalse($failed);
    }

    /**
     * @return CustomerProductPriceFacade
     */
    protected function getImporterFacade()
    {
        return new CustomerProductPriceFacade();
    }
}
