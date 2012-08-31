<?
include('conf.php');

include($_SESSION['root'].'core/library/adodb/adodb.inc.php');
$ADODB_CACHE_DIR = $_SESSION['root'].'cache';
$db = ADONewConnection('mysql');
$db->cacheSecs = 3600 * 24 * 30;
$db->debug = false;

if ( in_array($_SERVER['HTTP_HOST'], $domains) ) {
	$db->Connect('localhost','USUARIO','SENHA','crm');
} else {
	$db->Connect('PATH_SERVIDOR','USUARIO_ONLINE','SENHA_ONLINE','crm');
}
?>