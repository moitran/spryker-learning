<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Parser;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;
use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Exception\InvalidJsonException;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\RecordValidatorInterface;
use Spryker\Zed\Money\Business\MoneyFacadeInterface;

/**
 * Class JsonToDtoParser
 *
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Parser
 */
class JsonToDtoParser implements JsonToDtoParserInterface
{
    protected const CUSTOMER_PRODUCT_FIELDS = ['customer_number', 'item_number', 'prices'];
    protected const CUSTOMER_PRODUCT_PRICE_FIELDS = ['quantity', 'value'];

    /**
     * @var \Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\RecordValidatorInterface
     */
    protected $recordValidator;

    /**
     * @var \Spryker\Zed\Money\Business\MoneyFacadeInterface
     */
    protected $moneyFacade;

    /**
     * @param \Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\RecordValidatorInterface $recordValidator
     * @param \Spryker\Zed\Money\Business\MoneyFacadeInterface $moneyFacade
     */
    public function __construct(RecordValidatorInterface $recordValidator, MoneyFacadeInterface $moneyFacade)
    {
        $this->recordValidator = $recordValidator;
        $this->moneyFacade = $moneyFacade;
    }

    /**
     * @param string $fileContent
     *
     * @throws \Pyz\Zed\CustomerProductPrice\Business\Importer\Exception\InvalidJsonException
     *
     * @return \Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer
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
