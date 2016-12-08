# Software Experimental Fulia

A uns anos atrás eu queria uma área administrativa para o meu site. Como ele era bem pequeno eu resolvi
reinvetar a roda, só para não perder o costume.

Imagine um blog! Agora imagine a área administrativa desse blog, pronto é isso!

São 2 telas apenas, a primeira uma lista dos artigos (posts)...

![lista dos posts](https://github.com/flaviomicheletti/fulia/blob/master/telas/primeira-tela.png "lista dos artigos")

..onde é possível abrir o registro em um formulário ou deletar o registro na própria listagem.

A segunda tela é um formulário web (hooooooo!!!)...

![formulário](https://github.com/flaviomicheletti/fulia/blob/master/telas/segunda-tela.png "formulário web")



## Instalação

1. Tenha o PHP e o MySql instalados

2. Clone o projeto `git clone https://github.com/flaviomicheletti/fulia`.

3. Crie a base de dados executando os script's abaixo.

    /dados/criar-db.php
    /dados/criar-tabelas.php
    /dados/criar-dados.php



## Testes

Execute os testes do backend

    cd /fulia/backend
    phpunit tests/

Execute os testes do frontend

1. abra o seu navegador
2. abra a URL `localhost/fulia/frontend/tests/`

Sendo que `localhost` aponta para a pasta onde você "clonou" o projeto.

Aconselho a executar `dados/trucate-posts.sql` antes de iniciar os testes.



## Demo

http://www.fulia.devfuria.com.br/