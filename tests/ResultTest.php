<?php

namespace Tests;

use Rockbuzz\SDKYapay\Result;
use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Result\{Fail, Success};

class ResultTest extends TestCase
{
    public function test_a_result_must_have_to_fail_object()
    {
        $result = new Result('
            {
                "erro": {
                    "codigo": "1",
                    "mensagem": "Erro Interno. : Problemas ao receber transacao. Forma de Pagamento inexistente ou nao configurada para este estabelecimento, valor enviado: 17"
                },
                "statusTransacao": 0,
                "codigoEstabelecimento": "1505378933066"
            }
        ');
        $this->assertInstanceOf(Fail::class, $result->about());
    }

    public function test_a_result_must_have_to_success_object()
    {
        $result = new Result('
            {
                "valor": 100,
                "parcelas": 1,
                "autorizacao": "0",
                "urlPagamento": "https://sandbox.gateway.yapay.com.br/checkout/GeradorBoleto.do?cod=156900423688611572119-8d92-4624-a7a6-8256a862e700",
                "valorDesconto": 0,
                "numeroTransacao": 80000008,
                "statusTransacao": 5,
                "codigoFormaPagamento": 29,
                "codigoEstabelecimento": "1505378933066",
                "codigoTransacaoOperadora": "0"
            }
        ');
        $this->assertInstanceOf(Success::class, $result->about());

        $result = new Result('
            {
                "nsu": "3115668",
                "valor": 100,
                "parcelas": 1,
                "autorizacao": "203011",
                "urlPagamento": "15690042658777affd3e7-a9fa-4acb-875e-419e0c8ef77a",
                "mensagemVenda": "Operation Successful",
                "valorDesconto": 0,
                "numeroTransacao": 80000009,
                "statusTransacao": 1,
                "cartoesUtilizados": [
                    "000000******0000"
                ],
                "codigoFormaPagamento": 170,
                "codigoEstabelecimento": "1505378933066",
                "dataAprovacaoOperadora": "2019-09-20 15:31:15",
                "numeroComprovanteVenda": "0920033109378",
                "codigoTransacaoOperadora": "6"
            }
        ');
        $this->assertInstanceOf(Success::class, $result->about());
    }
}
