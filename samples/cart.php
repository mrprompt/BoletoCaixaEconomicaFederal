<?php
/**
 * Carrinho de compras utilizado nos exemplos
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Bank;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Charge;
use MrPrompt\BoletoCaixaEconomicaFederal\Common\Base\Occurrence;

/* @var $vencimento \DateTime */
$vencimento = (new DateTime())->add(new DateInterval('P30D'));

/* @var $lista array */
return [
    // Bloqueto - 3 parcelas
    [
        'cliente'           => 001, // código da empresa na CEF
        'vendedor'          => [
            'codigo'        => 123123, // código de cadastro
            'nome'          => 'NOME DA EMPRESA', // Nome da empresa
            'documento'     => '00000000000000', // CNPJ da empresa
            'nascimento'    => '0101900',
            'email'         => 'email@cadastro.com.br',
            'telefone1'     => '4801010101',
            'telefone2'     => '4802020202',
            'celular'       => '4803030303',
            'endereco'      => [
                'cidade'        => 'FLORIANOPOLIS',
                'uf'            => 'SC',
                'cep'           => '88080000',
                'logradouro'    => 'SALDANHA MARINHO',
                'numero'        => '0',
                'bairro'        => 'CENTRO',
                'complemento'   => '',
            ],
        ],
        'cobranca'          => Charge::PAYMENT_SLIP,
        'ocorrencia'        => Occurrence::INSERT,
        'identificador'     => 123123, // identificador da transação - interno da empresa
        'autorizacao'       => 12312, // Nosso número
        'comprador'         => [
            'codigo'        => 1, // código do cliente - interno da empresa
            'pessoa'        => 'F', // F - física / J - jurídica
            'nome'          => 'NOME DO COMPRADOR',
            'documento'     => '12312312313', // CPF ou CNPJ do
            'nascimento'    => '08081974',
            'email'         => 'email@cliente.com.br',
            'telefone1'     => '4811111111',
            'telefone2'     => '4822222222',
            'celular'       => '4833333333',
            'endereco'      => [
                'cidade'        => 'FLORIANOPOLIS',
                'uf'            => 'SC',
                'cep'           => '88090000',
                'logradouro'    => 'FELIPE NEVES',
                'numero'        => '0',
                'bairro'        => 'ESTREITO',
                'complemento'   => 'FUNDOS',
            ],
        ],
        'parcelas'          => [
            [
                'vencimento' => $vencimento->format('dmY'),
                'valor'      => 10.00,
                'quantidade' => 1,
            ],
            [
                'vencimento' => $vencimento->format('dmY'),
                'valor'      => 10.00,
                'quantidade' => 1,
            ],
            [
                'vencimento' => $vencimento->format('dmY'),
                'valor'      => 10.00,
                'quantidade' => 1,
            ],
        ],
        'boleto'            => [
            'documento'     => '47519',
            'banco'             => [
                'codigo'        => Bank::CAIXA_ECONOMICA_FEDERAL,
                'agencia'       => 0000,
                'digito'        => 0,
                'conta'         => [
                    'numero'    => 1111,
                    'digito'    => 1,
                    'operacao'  => 003,
                ]
            ],
        ],
    ],
    // Boleto - parcela única
    [
        'cliente'           => 759,
        'vendedor'          => [
            'codigo'        => 123123, // código de cadastro
            'nome'          => 'NOME DA EMPRESA', // Nome da empresa
            'documento'     => '00000000000000', // CNPJ da empresa
            'nascimento'    => '0101900',
            'email'         => 'email@cadastro.com.br',
            'telefone1'     => '4801010101',
            'telefone2'     => '4802020202',
            'celular'       => '4803030303',
            'endereco'      => [
                'cidade'        => 'FLORIANOPOLIS',
                'uf'            => 'SC',
                'cep'           => '88080000',
                'logradouro'    => 'SALDANHA MARINHO',
                'numero'        => '0',
                'bairro'        => 'CENTRO',
                'complemento'   => '',
            ],
        ],
        'cobranca'          => Charge::BILLET,
        'ocorrencia'        => Occurrence::INSERT,
        'identificador'     => 123123, // identificador da transação - interno da empresa
        'autorizacao'       => 12312, // Nosso número
        'comprador'         => [
            'codigo'        => 1, // código do cliente - interno da empresa
            'pessoa'        => 'F', // F - física / J - jurídica
            'nome'          => 'NOME DO COMPRADOR',
            'documento'     => '12312312313', // CPF ou CNPJ do
            'nascimento'    => '08081974',
            'email'         => 'email@cliente.com.br',
            'telefone1'     => '4811111111',
            'telefone2'     => '4822222222',
            'celular'       => '4833333333',
            'endereco'      => [
                'cidade'        => 'FLORIANOPOLIS',
                'uf'            => 'SC',
                'cep'           => '88090000',
                'logradouro'    => 'FELIPE NEVES',
                'numero'        => '0',
                'bairro'        => 'ESTREITO',
                'complemento'   => 'FUNDOS',
            ],
        ],
        'parcelas'          => [
            // boleto não permite mais de uma parcela
            [
                'vencimento' => $vencimento->format('dmY'),
                'valor'      => 10.00,
                'quantidade' => 1, // setado para 1 "hard coded"
            ],
        ],
        'boleto'            => [
            'documento'     => '47519',
            'banco'             => [
                'codigo'        => Bank::CAIXA_ECONOMICA_FEDERAL,
                'agencia'       => 0000,
                'digito'        => 0,
                'conta'         => [
                    'numero'    => 1111,
                    'digito'    => 1,
                    'operacao'  => 003,
                ]
            ],
        ],
    ],
];