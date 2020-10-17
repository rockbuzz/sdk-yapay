<?php

namespace Tests\Payment;

use DomainException;
use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\PaymentCreditCardFactory;

class PaymentCreditCardFactoryTest extends TestCase
{

    public function test_payment_boleto_factory_must_throw_exception_when_store_code_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('store_code'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_username_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('username'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_password_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('password'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_endpoint_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('endpoint'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_transaction_number_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('transaction_number'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_transaction_value_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('transaction_value'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_transaction_installments_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('transaction_installments'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_transaction_notification_url_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('transaction_notification_url'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_credidcard_name_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('credidcard_name'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_credidcard_number_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('credidcard_number'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_credidcard_code_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('credidcard_code'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_credidcard_month_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('credidcard_month'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_credidcard_year_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('credidcard_year'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_items_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('items'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_id_in_items_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('items.*.id'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_name_in_items_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('items.*.name'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_price_in_cents_in_items_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('items.*.price_in_cents'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_quantity_in_items_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('items.*.quantity'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_customer_id_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('customer_id'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_customer_name_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('customer_name'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_customer_document_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('customer_document'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_email_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('email'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_street_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('street'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_number_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('number'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_postal_code_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('postal_code'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_neighborhood_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('neighborhood'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_city_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('city'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_state_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('state'));
    }

    public function test_payment_boleto_factory_must_throw_exception_when_country_is_not_informed()
    {
        $this->expectException(DomainException::class);
        
        PaymentCreditCardFactory::fromArray($this->paramsWithExcept('country'));
    }

    protected function paramsWithExcept(string $key)
    {
        $params = [
            'store_code' => 1234,
            'username' => 'your_user',
            'password' => 'your_pass',
            'endpoint' => 'https://sandbox.gateway.yapay.com.br/checkout/api/v3/transacao',
            'transaction_number' => 1234,
            'transaction_value' => 1598,
            'transaction_installments' => 5,
            'transaction_notification_url' => 'http://notificationUrl.com',
            'creditcard_name' => 'Holder Name',
            'creditcard_number' => 0000000000000000,
            'creditcard_code' => 123,
            'creditcard_month' => 10,
            'creditcard_year' => 2020,
            'items' => [
                [
                    'id' => 1234,
                    'name' => 'Product Name',
                    'price_in_cents' => 15987,
                    'quantity' => 1
                ],
                [
                    'id' => 2345,
                    'name' => 'Product Name',
                    'price_in_cents' => 15990,
                    'quantity' => 1
                ]
            ],
            'customer_id' => 1234,
            'customer_name' => 'Customer Name',
            'customer_document' => 12345678900,
            'email' => 'customer@gmail.com',
            'street' => 'Street',
            'number' => 123,
            'postal_code' => '16985152',
            'neighborhood' => 'Center',
            'city' => 'City',
            'state' => 'UF',
            'complement' => '',
            'country' => 'BR'
        ];

        if (false === strpos($key, '.*.')) {
            unset($params[$key]);
        } else {
            list ($level, $subLevel) = explode('.*.', $key);
            foreach ($params[$level] as $key => $value) {
                unset($params[$level][$key][$subLevel]);
            }
        }
        
        return $params;
    }
}
