<?php
/**
 * Arquivo bootstrap
 */


/**
 *
 */
session_start();


/**
* Caminho relativo da raiz do sistema
*/
define('BASE_PATH', dirname(__FILE__));


/**
 * Dependências
 */
require BASE_PATH . "/biblio/classes/Conn.php";
require BASE_PATH . "/biblio/classes/HTMLcombo.php";


/**
 * Classes diversas
 */
require BASE_PATH . "/biblio/models/MateriaDataTransfer.php";
require BASE_PATH . "/biblio/models/MateriasTableGateway.php";
require BASE_PATH . "/biblio/models/MateriasTableModule.php";



?>
