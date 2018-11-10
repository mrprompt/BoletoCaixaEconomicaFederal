Boleto Caixa Econômica Federal
=======================

[![Build Status](https://travis-ci.org/mrprompt/BoletoCaixaEconomicaFederal.svg?branch=master)](https://travis-ci.org/mrprompt/BoletoCaixaEconomicaFederal)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mrprompt/BoletoCaixaEconomicaFederal/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mrprompt/BoletoCaixaEconomicaFederal/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/mrprompt/BoletoCaixaEconomicaFederal/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mrprompt/BoletoCaixaEconomicaFederal/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/mrprompt/BoletoCaixaEconomicaFederal/badges/build.png?b=master)](https://scrutinizer-ci.com/g/mrprompt/BoletoCaixaEconomicaFederal/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/mrprompt/BoletoCaixaEconomicaFederal/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

Geração de Boletos e Bloquetos para a Caixa Econômica Federal.

## Dependências

- PHP 7.1+
- [WkHtmlToPDF](http://wkhtmltopdf.org/)

## Instalação

```
composer.phar require mrprompt/boleto-caixa-economica-federal
```
    
## Exemplos
Os exemplos estão na pasta *samples*.

Descrição dos exemplos

    - samples/cart.php          - Array com os parâmetros necessários para cada tipo de transação
    - samples/bloqueto.php      - Geração de bloqueto de cobrança (já gera o arquivo de remessa)
    - samples/boleto.php        - Geração de boleto de cobrança (já gera o arquivo de remessa)

## Geração de PDF
A biblioteca requer a instalação da ferramenta [WkHtmlToPDF](http://wkhtmltopdf.org/) e que o path da mesma esteja 
em */usr/local/bin/wkhtmltopdf*, caso contrário, o PDf não poderá ser gerado.

**Importante**

Caso o executável para geração do PDF não seja encontrado, nenhum erro é emitido.
