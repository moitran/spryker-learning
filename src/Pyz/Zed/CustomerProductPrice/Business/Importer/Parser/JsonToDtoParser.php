<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Parser;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;
use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Exception\InvalidJsonException;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\RecordValidatorInterface;
use Spryker\Zed\Money\Business\MoneyFacadeInterface;

/**
 * Class JsonToDtoParser
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Parser
 */
class JsonToDtoParser implements JsonToDtoParserInterface
{
    protected const CUSTOMER_PRODUCT_FIELDS = ['customer_number', 'item_number', 'prices'];
    protected const CUSTOMER_PRODUCT_PRICE_FIELDS = ['quantity', 'value'];

    /**
     * @var RecordValidatorInterface
     */
    protected $recordValidator;

    /**
     * @var MoneyFacadeInterface
     */
    protected $moneyFacade;

    /**
     * JsonToDtoParser constructor.
     *
     * @param RecordValidatorInterface $recordValidator
     * @param MoneyFacadeInterface $moneyFacade
     */
    public function __construct(RecordValidatorInterface $recordValidator, MoneyFacadeInterface $moneyFacade)
    {
        $this->recordValidator = $recordValidator;
        $this->moneyFacade = $moneyFacade;
    }

    /**
     * @param string $fileContent
     *
     * @return CustomerProductPriceCollectionTransfer
     * @throws InvalidJsonException
     */
    public function parse(string $fileContent): CustomerProductPriceCollectionTransfer
    {
        $jsonData = json_decode($fileContent, true);
        if (!$jsonData) {
            throw new InvalidJsonException('Provided json file is invalid - json_decode return false');
        }
        $customerProductPriceCollectionTransfer = new CustomerProductPriceCollectionTransfer();
        foreach ($jsonData as $customerProductPrices) {
            if (!$this->recordValidator->isRecordValid(self::CUSTOMER_PRODUCT_FIELDS, $customerProductPrices)) {
                throw new InvalidJsonException('Json file is invalid');
            }
            $customerProductTransfer = new CustomerProductTransfer();
            $customerProductTransfer->setCustomerNumber($customerProductPrices['customer_number']);
            $customerProductTransfer->setProductNumber($customerProductPrices['item_number']);

            foreach ($customerProductPrices['prices'] as $price) {
                if (!$this->recordValidator->isRecordValid(self::CUSTOMER_PRODUCT_PRICE_FIELDS, $price)) {
                    throw new InvalidJsonException('Json file is invalid');
                }

                $customerProductPriceTransfer = new CustomerProductPriceTransfer();
                $customerProductPriceTransfer->fromArray(
                    [
                        'quantity' => $price['quantity'],
                        'price' => $this->moneyFacade->convertDecimalToInteger($price['value']),
                    ]
                );

                $customerProductTransfer->addCustomerProductPrice($customerProductPriceTransfer);
            }

            $customerProductPriceCollectionTransfer->addCustomerProduct($customerProductTransfer);
        }

        return $customerProductPriceCollectionTransfer;
    }
}
