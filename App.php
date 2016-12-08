<?php
ini_set('display_errors', 'on');
ini_set('track_errors', 'on');
ini_set('html_errors', 'on');
ini_set('error_reporting', E_ALL);
error_reporting(E_ALL);

/**
 * Arquivo bootstrap
 */


/**
 *
 */
session_start();
date_default_timezone_set('America/Sao_Paulo');

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
