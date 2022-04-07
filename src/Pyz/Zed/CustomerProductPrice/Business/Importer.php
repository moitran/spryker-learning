<?php

namespace Pyz\Zed\CustomerProductPrice\Business;

use Generated\Shared\Transfer\CustomerProductTransfer;
use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceEntityManager;

/**
 * Class Importer
 * @package Pyz\Zed\CustomerProductPrice\Business
 */
class Importer implements ImporterInterface
{
    /**
     * @var CustomerProductPriceEntityManager
     */
    protected $customerProductPriceEntityManager;

    /**
     * Importer constructor.
     *
     * @param CustomerProductPriceEntityManager $customerProductPriceEntityManager
     */
    public function __construct(CustomerProductPriceEntityManager $customerProductPriceEntityManager)
    {
        $this->customerProductPriceEntityManager = $customerProductPriceEntityManager;
    }

    /**
     * @param string $filePath
     *
     * @return bool
     * @throws \Exception
     */
    public function import(string $filePath): bool
    {
        if ($filePath == '' || !is_readable($filePath)) {
            return false;
        }

        $jsonData = $this->readFile($filePath);
        $this->validateJsonData($jsonData);

        foreach ($jsonData as $item) {
            $prices = $item['prices'];
            unset($item['prices']);
            $customerProductEntityTransfer = $this->customerProductPriceEntityManager->saveCustomerProduct(
                $this->getCustomerProductTransfer()->fromArray($item)
            );
            foreach ($prices as $price) {
                $price['fk_customer_product'] = $customerProductEntityTransfer->getIdCustomerProduct();
                $this->customerProductPriceEntityManager->saveCustomerProductPrice(
                    $this->getCustomerProductPriceTransfer()->fromArray($price)
                );
            }
        }

        return true;
    }

    /**
     * @param string $filePath
     *
     * @return array
     */
    protected function readFile(string $filePath): array
    {
        return json_decode(file_get_contents($filePath), true);
    }

    /**
     * @param array $jsonData
     *
     * @return bool
     * @throws \Exception
     */
    protected function validateJsonData(array $jsonData): bool
    {
        foreach ($jsonData as $item) {
            if (count(array_diff(['customer_number', 'item_number', 'prices'], array_keys($item)))) {
                throw new \Exception('Json file invalid');
            }
            foreach ($item['prices'] as $price) {
                if (count(array_diff(['quantity', 'value'], array_keys($price)))) {
                    throw new \Exception('Json file invalid');
                }
            }
        }

        return true;
    }

    /**
     * @return CustomerProductTransfer
     */
    protected function getCustomerProductTransfer()
    {
        return new CustomerProductTransfer();
    }

    /**
     * @return CustomerProductPriceTransfer
     */
    protected function getCustomerProductPriceTransfer()
    {
        return new CustomerProductPriceTransfer();
    }
}
