<?php
/**
 * Classe responsável por reenderizar os options de uma combobox(caixa de seleção)
 *
 * Poderá ser utilizada de duas formas:
 *   a) Listagem simples das optinos
 *      É uma combo simples, logo, o array de entrada também é simples
 *      Utilize a função $this->getOptions();
 *
 *   b) Com optiongroup
 *      É uma combo com options group, logo o array deve ser multidimenssional
 *      Utilize a função $this->getOptionsGroup();
 *
 * <br>
 * <code>
 * # Implemetação
 * $arrCombo = array(); # popular a combo antes
 * $combo = new HTMLcombo();
 * $combo->valor_selecionado = 3;
 *
 * # tag select
 * echo $combo->getOptions($arrCombo);
 * # tag /select
 * </code>
 */
class HTMLcombo {

    public $valor_selecionado;


    /**
     * Retorna os option's como uma simples lista de.<br>
     *
     * O array de entrada deve ser parecido com este:
     * <code>
     * $arrCombo = array();
     * $arrCombo[1] = "ativar";
     * $arrCombo[2] = "desativar";
     * $arrCombo[3] = "bloquear";
     * $arrCombo[4] = "desbloquear";
     * $arrCombo[5] = "deletar";
     * </code>
     *
     * @param type $arrCombo
     * @return type
     */
    function getOptions($arrCombo){

        $options = "";

        foreach($arrCombo as $key => $value){
            $selected = "";

            if($this->valor_selecionado == $key)
                $selected = "selected=\"selected\"";

            $options .= "\n\t<option value=\"$key\" $selected>$value</option>";
        }

        return $options;

    }

    /**
     *
     * <p>O array de entrada deve ser parecido com este:</p>
     * <code>
     * $arrCombo = array();
     * $arrCombo['secao_a']['label'] = "Seção A";
     * $arrCombo['secao_a']['options'] = array();
     * $arrCombo['secao_a']['options'] = array(1 => 'ativar', 2 => 'destivar');
     * $arrCombo['secao_b']['label'] = "Seção B";
     * $arrCombo['secao_b']['options'] = array();
     * $arrCombo['secao_b']['options'] = array(3 => 'bloquear', 4 => 'desbloquear');
     * $arrCombo['secao_c']['label'] = "Seção C";
     * $arrCombo['secao_c']['options'] = array();
     * $arrCombo['secao_c']['options'] = array(5 => 'deletar');
     * </code>
     *
     * <p>A saída assemelha-se como abaixo:</p>
     * </code>
     * <select id="cbo_acoes" name="cbo_acoes" onchange="" class=""
     *      <option value=''>Selecione a ação...</option>
     *      <optgroup label="Seção a">
     *          <option value='1'>ativar</option>
     *          <option value='2'>desativar</option>
     *      </optgroup>
     *      <optgroup label="Seção b">
     *          <option value='3'>bloquear</option>
     *          <option value='4'>desbloquear</option>
     *      </optgroup>
     *      <optgroup label="Seção c">
     *          <option value='5'>deletar</option>
     *      </optgroup>
     * </select>
     * </code>
     *
     * @param type $arrCombo
     * @return string
     */
    function getOptionsGroup($arrCombo){

        $options = "";

        foreach($arrCombo as $options_grp){
            $options .= "\n<optgroup label=\"".$options_grp['label']."\">";
            foreach ( $options_grp['options'] as $key => $value ){
                $selected = "";

                if($this->valor_selecionado == $key)
                    $selected = "selected=\"selected\"";

                $options .=  "\n\t<option value=\"$key\" $selected>$value</option>";
            }
            $options .=  "\n</optgroup>";
        }

        return $options;

    }

} # end class
?>