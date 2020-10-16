# SDK Yapay

Layer to abstract communication with Yapay Payment API.

[![Build Status](https://travis-ci.org/rockbuzz/sdk-yapay.svg?branch=master)](https://travis-ci.org/rockbuzz/sdk-yapay)

## Requirements

PHP >=7.1

## Install

```bash
$ composer require rockbuzz/sdk-yapay
```

## Usage

`Payment Boleto`
```php
<?php

use Rockbuzz\SDKYapay\PaymentBoletoFactory;

$params = [
    'store_code' => 1234,
    'username' => 'your_user',
    'username' => 'your_pass',
    'endpoint' => 'https://sandbox.gateway.yapay.com.br/checkout/api/v3/transacao',
    'transaction_number' => 1234,
    'transaction_value' => 1598,
    'transaction_due_date' => new \Datetime(),
    'transaction_notification_url' => 'http://notificationUrl.com'),
    'items' => [
        [
            'product_id' => 1234,
            'product_name' => 'Product Name',
            'price_in_cents' => 15987
            'quantity' => 1
        ],
        [
            'product_id' => 2345,
            'product_name' => 'Product Name',
            'price_in_cents' => 15990
            'quantity' => 1
        ]
    ],
    'customer_id' => 1234,
    'customer_name' => 'Customer Name',
    'customer_document' => 12345678900,
    'customer_email' => 'customer@gmail.com',
    'customer_address' => [
    'customer_street' => 'Street',
    'customer_number' => 123,
    'customer_postal_code' => '16985152',
    'customer_neighborhood' => 'Center',
    'customer_city' => 'City',
    'customer_state' => 'UF',
    'customer_complement' => '',
    'customer_country' => 'BR'
];

$payment = new PaymentBoletoFactory::fromArray($params);
$result = $payment->done();
```

`Payment CreditCard`
```php
<?php

use Rockbuzz\SDKYapay\PaymentCreditCardFactory;

$params = [
    'store_code' => 1234,
    'username' => 'your_user',
    'username' => 'your_pass',
    'endpoint' => 'https://sandbox.gateway.yapay.com.br/checkout/api/v3/transacao',
    'transaction_number' => 1234,
    'transaction_value' => 1598,
    'transaction_due_date' => new \Datetime(),
    'transaction_notification_url' => 'http://notificationUrl.com'),
    'creditcard_name' => 'Holder Name',
    'creditcard_number' => 0000000000000000,
    'creditcard_code' => 123,
    'creditcard_month' => 10,
    'creditcard_year' => 2020,
    'items' => [
        [
            'product_id' => 1234,
            'product_name' => 'Product Name',
            'price_in_cents' => 15987
            'quantity' => 1
        ],
        [
            'product_id' => 2345,
            'product_name' => 'Product Name',
            'price_in_cents' => 15990
            'quantity' => 1
        ]
    ],
    'customer_id' => 1234,
    'customer_name' => 'Customer Name',
    'customer_document' => 12345678900,
    'customer_email' => 'customer@gmail.com',
    'customer_address' => [
    'customer_street' => 'Street',
    'customer_number' => 123,
    'customer_postal_code' => '16985152',
    'customer_neighborhood' => 'Center',
    'customer_city' => 'City',
    'customer_state' => 'UF',
    'customer_complement' => '',
    'customer_country' => 'BR'
];

$payment = new PaymentCreditCardFactory::fromArray($params);
$result = $payment->done();
```

`Result`
```php

$result->isSuccess();
$about = $result->about();
$jsonAbout = json_encode($about);
```

`Json About Result Success CredidtCard`
```javascript
{
    "nsu": "xxxxxxx",
    "valor": 100,
    "parcelas": 1,
    "autorizacao": "xxxxxxx",
    "urlPagamento": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
    "mensagemVenda": "Operation Successful",
    "valorDesconto": 0,
    "numeroTransacao": 000000000000,
    "statusTransacao": 1,
    "cartoesUtilizados": [
        "000000******0000"
    ],
    "codigoFormaPagamento": 170,
    "codigoEstabelecimento": "xxxxxxxxxxxxxx",
    "dataAprovacaoOperadora": "2019-09-20 15:31:15",
    "numeroComprovanteVenda": "0920033109378",
    "codigoTransacaoOperadora": "6"
}
```

`Json About Result Success Boleto`
```javascript
{
    "valor": 100,
    "parcelas": 1,
    "autorizacao": "0",
    "urlPagamento": "https://sandbox.gateway.yapay.com.br/checkout/GeradorBoleto.do?cod=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
    "valorDesconto": 0,
    "numeroTransacao": 0000000000000,
    "statusTransacao": 5,
    "codigoFormaPagamento": 29,
    "codigoEstabelecimento": "xxxxxxxxxxxxxx",
    "codigoTransacaoOperadora": "0"
}
```

`Json About Result Fail`
```javascript
{
    "erro": {
        "codigo": "1",
        "mensagem": "Erro Interno. : Problemas ao receber transacao. Forma de Pagamento inexistente ou nao configurada para este estabelecimento, valor enviado: 17"
    },
    "statusTransacao": 0,
    "codigoEstabelecimento": "xxxxxxxxxxxxxx"
}
```

`Payment done can throw an exception`
```php
Rockbuzz\SDKYapay\Exception\PaymentException::class
```

## Contributing

Add new features.

## License

The SDK Yapay is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).