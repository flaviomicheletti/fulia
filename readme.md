# Software Fulia

A uns anos atrás eu queri ter uma área administrativa para o meu site. Como ele era bem pequeno eu resolvi
reinvetar a roda, só para não perder o costume.

Imagine um blog! Agora imagine a área administrative desse blog, pronto é isso!

São 2 telas apenas, a primeira uma lista dos posts...

![lista dos posts](https://github.com/flaviomicheletti/fulia/blob/releitura/primeira-tela.png "lista dos posts")

..onde é possível abrir o registro em um formulário ou deletar o registro na própria listagem.

Se você resolver abrir verá a segunda tela, uma formulário web (Hooooooo)...

![formulário](https://github.com/flaviomicheletti/fulia/blob/releitura/segunda-tela.png "formulário")


## Instalação

Tenha o PHP e o MySql instalados e clone o projeto.

Crie a base de dados executando os script's abaixo.

    /dados/criar-db.php
    /dados/criar-tabelas.php
    /dados/criar-dados.php

## Testes

Execute os testes

    cd /fulia
    phpunit tests/

## Demo

http://www.fulia.devfuria.com.br/