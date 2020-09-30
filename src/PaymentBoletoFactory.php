<?php

namespace Rockbuzz\SDKYapay;

use Rockbuzz\SDKYapay\Config;
use Rockbuzz\SDKYapay\Payment\Item;
use Rockbuzz\SDKYapay\Payment\Items;
use Rockbuzz\SDKYapay\Payment\Email;
use Rockbuzz\SDKYapay\PaymentBillet;
use Rockbuzz\SDKYapay\Payment\Billing;
use Rockbuzz\SDKYapay\Payment\Address;
use Rockbuzz\SDKYapay\Payment\Customer;
use Rockbuzz\SDKYapay\Payment\TransactionBillet;

class PaymentoBoletoFactory
{
    public static function fromArray(array $params): PaymentBillet
    {
        return new PaymentBillet(
            new Config(
                $params['config']['store_code'], 
                $params['config']['username'], 
                $params['config']['password'], 
                $params['config']['endpoint']
            ), 
            1, 
            new TransactionBillet(
                $params['transaction']['number'], 
                $params['transaction']['value'], 
                $params['transaction']['due_date'],
                $params['transaction']['notification_url']
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
            new Billing(new Customer(
                    $params['customer']['id'], 
                    $params['customer']['name'],
                    $params['customer']['document'],
                    new Email($params['customer']['email'],), 
                    new Address(
                        $params['customer']['address']['street'], 
                        $params['customer']['address']['number'], 
                        $params['customer']['address']['postal_code'], 
                        $params['customer']['address']['neighborhood'],
                        $params['customer']['address']['city'], 
                        $params['customer']['address']['state'], 
                        $params['customer']['address']['complement'],
                        $params['customer']['address']['country']
                    )
                )
            )
        );
    }
}