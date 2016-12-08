<?php
/**
 * View do formulário
 */

# boot
require "../App.php";

# Principalmente para Insert
$objMateria = new MateriasTableModule();

# Se for update...
if( isset($_POST['id']) ){
    $materia = $objMateria->getObject($_POST['id']);
}
?>
<style type="text/css">
    .input-tamanho-padrao {
        width:97%;
    }
    .centralizar-texto {
        text-align: center;
    }
    label {
        background-color: #EEEEEE;
        border-radius: 5px 5px 5px 5px;
        line-height: 30px;
    }
    .form-horizontal .control-label {
        padding-top: 0px;
        text-align: center;
        font-weight: 900;
    }
    .btn-fulia {
        width: 100px;
    }
</style>
<form class="form-horizontal inverse">
    <legend>Matérias</legend>
    <div class="control-group">
        <label class="control-label" for="frm-id">id</label>
        <div class="controls">
            <input type="text" id="frm-id" class="span1 centralizar-texto"  value="<?php echo $materia->id ?>"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="frm-url">URL</label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on">www.devfuria.com.br/</span>
                <input type="text" id="frm-url" style="width: 590px" value="<?php echo $materia->url ?>"/>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="frm-titulo">Título</label>
        <div class="controls">
            <input id="frm-titulo" type="text" class="input-tamanho-padrao" value="<?php echo $materia->titulo ?>"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="frm-resumo">Resumo</label>
        <div class="controls">
            <textarea rows="6" id="frm-resumo" class="input-tamanho-padrao"><?php echo $materia->resumo ?></textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="frm-keywords">Keywords</label>
        <div class="controls">
            <textarea rows="3" id="frm-keywords" class="input-tamanho-padrao"><?php echo $materia->keywords ?></textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="frm-nivel">Nível</label>
        <div class="controls">
            <select id="frm-nivel">
                <?php
                $combo = new HTMLcombo();
                $combo->valor_selecionado = $materia->nivel;
                $arrNivel = array(
					"" => "",
                    "basico" => "Básico",
		    		"intermediario" => "intermediário",
		    		"avancado" => "Avançado"
                );
                echo $combo->getOptions($arrNivel);
                ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="frm-secao">Seção</label>
        <div class="controls">
            <select id="frm-secao" >
                <?php
                $combo = new HTMLcombo();
                $combo->valor_selecionado = $materia->secao;
                $arrSecao = array(
					"" => "",
                    "php" => "PHP",
		    		"js" => "JS",
		    		"html-css" => "HTML & CSS"
                );
                echo $combo->getOptions($arrSecao);
                ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="frm-autor">Autor</label>
        <div class="controls">
            <select id="frm-autor">
                <?php
                $combo = new HTMLcombo();
                $combo->valor_selecionado = $materia->autor;
                $arrSecao = array(
					"" => "",
                    "flavio" => "Flávio",
		    		"alexandre" => "Alexandre",
		    		"micheletti" => "Micheletti"
                );
                echo $combo->getOptions($arrSecao);
                ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="frm-dt-criacao">Data de criação</label>
        <div class="controls">
            <input type="text" id="frm-dt-criacao" class="span2 centralizar-texto" value="<?php echo $materia->dt_criacao ?>"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="frm-dt-atualizacao">Data de atualização</label>
        <div class="controls">
            <input type="text" id="frm-dt-atualizacao" class="span2 centralizar-texto" value="<?php echo $materia->dt_atualizacao ?>" />
            <div id="datepicker"></div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="frm-ordem">Ordem</label>
        <div class="controls">
            <input type="text" id="frm-ordem" class="span1 centralizar-texto" value="<?php echo $materia->ordem ?>"/>
        </div>
    </div>
    <div class="control-group">
        <div class="controls pull-right">
            <button type="button" id="frm-btn-cancelar" class="btn-fulia btn">Cancelar</button>
            <button type="button" id="frm-btn-salvar" class="btn-fulia btn btn-info">Salvar</button>
        </div>
    </div>
</form>
<div class="alert alert-error" style="display: none">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Erro! </strong> <span></span>
</div>
