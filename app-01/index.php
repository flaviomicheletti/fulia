<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>App</title>
        <meta charset="utf-8" />
        <!-- twiter-bootstrap CSS -->
        <link href="biblio/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        
        <div class="container">
            <div class="row">
                
                <!-- Esta div será o local onde as coisas "acontecem"-->
                <div class="span12" id="conteudo"></div>
                
            </div>
        </div>
        
    </body>
    
    
    <!-- CDN da jquery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

    
    <!-- twiter-bootstrap JS -->
    <script src="biblio/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    
    
    <!-- PONTO PRINCIPAL
    Aqui deveríamos chamar o JS da aplicação.
    
    Como ainda não sei trabalhar com dependência de JS (de forma decente)
    estou chamando o arquivo do módulo materia diretamente nesta página.
    
    Isso é ruim porque eu queria chamar o arquivo de JS principal e
    apartir dele chamar os demais módulos.
    -->
    <script src="materia/materia.js" type="text/javascript"></script>
    
</html>