# SDK Yapay

Layer to abstract communication with Yapay Payment API.

[![Build Status](https://travis-ci.org/rockbuzz/sdk-yapay.svg?branch=master)](https://travis-ci.org/rockbuzz/sdk-yapay)

## Requirements

PHP: >=7.0

## Install

```bash
$ composer require rockbuzz/sdk-yapay
```

## Usage

`Payment Boleto`
```php
<?php

use Rockbuzz\SDKYapay\Config;
use Rockbuzz\SDKYapay\Payment\Item;
use Rockbuzz\SDKYapay\Payment\Items;
use Rockbuzz\SDKYapay\Payment\Email;
use Rockbuzz\SDKYapay\PaymentBoleto;
use Rockbuzz\SDKYapay\Payment\Billing;
use Rockbuzz\SDKYapay\Payment\Address;
use Rockbuzz\SDKYapay\Payment\Customer;
use Rockbuzz\SDKYapay\Payment\TransactionBoleto;


require __DIR__ . '/vendor/autoload.php';

$payment = new PaymentBoleto(
    new Config(
        1234, 
        'username', 
        'password', 
        'https://sandbox.gateway.yapay.com.br/checkout/api/v3/transacao'
    ), 
    1, 
    new TransactionBoleto(123, 1598, new \Datetime(), 'http://notificationUrl.com'), 
    new Items([
        new Item('1234', 'Product Name', 15987),
        new Item('1235', 'Product Name', 13980),
    ]), 
    new Billing(new Customer(
            12, 
            'Customer Name', 
            '123456789', 
            new Email('email@email.com'), 
            new Address('Street', 123, '', '96085150', 'Center', 'City', 'ST')
        )
    )
);

$result = $payment->done();
```

`Payment CreditCard`
```php
<?php

use Rockbuzz\SDKYapay\Config;
use Rockbuzz\SDKYapay\Payment\Item;
use Rockbuzz\SDKYapay\Payment\Items;
use Rockbuzz\SDKYapay\Payment\Email;
use Rockbuzz\SDKYapay\Payment\Address;
use Rockbuzz\SDKYapay\Payment\Billing;
use Rockbuzz\SDKYapay\Payment\Customer;
use Rockbuzz\SDKYapay\PaymentCreditCard;
use Rockbuzz\SDKYapay\Payment\CreditCard;
use Rockbuzz\SDKYapay\Payment\TransactionCreditCard;

require __DIR__ . '/vendor/autoload.php';

$payment = new PaymentCreditCard(
    new Config(
        1234, 
        'username', 
        'password', 
        'https://sandbox.gateway.yapay.com.br/checkout/api/v3/transacao'
    ),
    2,
    new TransactionCreditCard(1, 159, 2, 'http://notificationUrl.com'),
    new CreditCard('name', 123456789, 123, 10, 2020),
    new Items([
        new Item('1234', 'Product Name', 15987),
        new Item('1235', 'Product Name', 13980),
    ]),
    new Billing(
        new Customer(
            12, 
            'Customer Name', 
            '123456789', 
            new Email('email@email.com'), 
            new Address('Street', 123, '', '96085150', 'Center', 'City', 'ST')
        )
    )
);

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