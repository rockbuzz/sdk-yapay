<?php

namespace Rockbuzz\SDKYapay;

use Rockbuzz\SDKYapay\Config;
use Rockbuzz\SDKYapay\PaymentCreditCard;
use Rockbuzz\SDKYapay\Payment\{Item, Items, Email, Billing,Address, CreditCard, Customer, TransactionCreditCard};

class PaymentoCreditCardFactory
{
    public static function fromArray(array $params): PaymentCreditCard
    {
        return new PaymentCreditCard(
            new Config(
                $params['store_code'], 
                $params['username'], 
                $params['password'], 
                $params['endpoint']
            ), 
            2, 
            new TransactionCreditCard(
                $params['transaction_number'], 
                $params['transaction_value'], 
                $params['transaction_due_date'],
                $params['transaction_notification_url']
            ), 
            new CreditCard(
                $params['creditcard_name'], 
                $params['creditcard_number'], 
                $params['creditcard_code'], 
                $params['creditcard_month'],
                $params['creditcard_year']
            ), 
            new Items(
                array_map(function($item){
                    new Item(
                        $item['product_id'], 
                        $item['product_name'], 
                        $item['price_in_cents'],
                        $item['quantity']
                    );
                }, $params['items'])
            ), 
            new Billing(
                new Customer(
                    $params['customer_id'], 
                    $params['customer_name'],
                    $params['customer_document'],
                    new Email($params['customer_email']), 
                    new Address(
                        $params['customer_address_street'], 
                        $params['customer_address_number'], 
                        $params['customer_address_postal_code'], 
                        $params['customer_address_neighborhood'],
                        $params['customer_address_city'], 
                        $params['customer_address_state'], 
                        $params['customer_address_complement'],
                        $params['customer_address_country']
                    )
                )
            )
        );
    }
}
