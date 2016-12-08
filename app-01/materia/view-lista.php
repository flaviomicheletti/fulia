<?php
/**
 * View da lista de matérias
 */

# boot
require "../App.php";

# Carregar lista de registros
$arr_materias = MateriasTableModule::getObjects();

?>
<button type="button" class="btn btn-primary" id="lista-btn-inserir" 
        style="margin: 10px; margin-left: 45%;">Inserir</button>
<table class="table">
<tr>
    <th>id</th>
    <th>título</th>
    <th>autor</th>
    <th>secao</th>
    <th>data atuali.</th>
    <th>deletar</th>    
</tr>
<?php foreach ($arr_materias as $materia): ?>
    <tr id="mt-<?php echo $materia->id?>">
        <td><?php echo $materia->id ?></td>
        <td>
            <a href="#" >
                <?php echo $materia->titulo ?>
            </a>
        </td>
        <td><?php echo $materia->autor ?></td>
        <td><?php echo $materia->secao ?></td>
        <td><?php echo $materia->dt_atualizacao ?></td>
        <td><button type="button" class="btn btn-danger btn-mini" >Excluir</button></td>
    </tr>
<?php endforeach; ?>
</table>