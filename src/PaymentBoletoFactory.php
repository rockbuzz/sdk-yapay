<?php

namespace Rockbuzz\SDKYapay;

use DomainException;
use Rockbuzz\SDKYapay\PaymentBillet;
use Rockbuzz\SDKYapay\Payment\{Item, Items, Email, Billing,Address, Customer, TransactionBillet};

class PaymentBoletoFactory
{
    public static function fromArray(array $params): PaymentBillet
    {
        return new PaymentBillet(
            new TransactionBillet(
                self::getValue('transaction_number', $params),
                self::getValue('transaction_value', $params),
                self::getValue('transaction_due_date', $params),
                self::getValue('transaction_notification_url', $params)
            ), 
            new Items(
                array_map(function($item) use ($params) {
                    return new Item(
                        self::getValue('id', $item),
                        self::getValue('name', $item),
                        self::getValue('price_in_cents', $item),
                        self::getValue('quantity', $item)
                    );
                }, self::getValue('items', $params))
            ), 
            new Billing(
                new Customer(
                    self::getValue('customer_id', $params),
                    self::getValue('customer_name', $params),
                    self::getValue('customer_document', $params),
                    new Email(self::getValue('email', $params)), 
                    new Address(
                        self::getValue('street', $params),
                        self::getValue('number', $params),
                        self::getValue('complement', $params),
                        self::getValue('postal_code', $params),
                        self::getValue('neighborhood', $params),
                        self::getValue('city', $params),
                        self::getValue('state', $params),
                        self::getValue('country', $params)
                    )
                )
            )
        );
    }

    /**
     * @param string $key
     * @param array $params
     * @throws DomainException
     */
    private static function getValue(string $key, array $params)
    {
        if (array_key_exists($key, $params)) {
            return $params[$key];
        }

        throw new DomainException("Key {$key} is required");
    }
}
