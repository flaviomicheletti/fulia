# Software Experimental Fulia

A uns anos atrás eu queri uma área administrativa para o meu site. Como ele era bem pequeno eu resolvi
reinvetar a roda, só para não perder o costume.

Imagine um blog! Agora imagine a área administrative desse blog, pronto é isso!

São 2 telas apenas, a primeira uma lista dos posts...

![lista dos posts](https://github.com/flaviomicheletti/fulia/blob/releitura/telas/primeira-tela.png "lista dos posts")

..onde é possível abrir o registro em um formulário ou deletar o registro na própria listagem.

A segunda tela um formulário web (hooooooo!!!)...

![formulário](https://github.com/flaviomicheletti/fulia/blob/releitura/telas/segunda-tela.png "formulário")


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

Aconselho a executar `dados/trucate-posts.sql` antes de inicar os testes.

## Demo

http://www.fulia.devfuria.com.br/