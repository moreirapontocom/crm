<?
error_reporting(~E_ALL);
//ini_set('display_errors', -1);

date_default_timezone_set('America/Sao_Paulo');

(isset($_GET['page']))		? $page			= $_GET['page']		: $page			= 'home';
(isset($_GET['sub']))		? $subpage		= $_GET['sub']		: $subpage		= '';
(isset($_GET['subsub']))	? $subsubpage	= $_GET['subsub']	: $subsubpage	= '';

$domains = array('localhost','192.168.0.160');

if ( in_array($_SERVER['HTTP_HOST'], $domains) ) {
	$_SESSION['root']      = '/var/www/crm/';
	$_SESSION['localhost'] = 1;

	( substr($_SERVER['HTTP_HOST'],0,9) == 'localhost' ) ? $link = 'http://localhost/' : $link = 'http://192.168.1.21/';

	$linkcache				= $link.'cache/';
	$linkcontent			= $link.'content/';
	$linkclasses			= $link.'core/classes/';
	$linklibrary			= $link.'core/library/';
	$linksettings			= $link.'core/settings/';
	$linkcss				= $link.'css/';
	$linkdownloads			= $link.'downloads/';
	$linkimg				= $link.'images/img/';
	$linkimgcontent			= $link.'images/content/';
	$linkjs					= $link.'js/';
	$linkmedia				= $link.'media/';
	$linkscripts			= $link.'scripts/';
	$linktemplatesweb		= $link.'templates/web/';
	$linktemplatesmobile	= $link.'templates/mobile/';

} else {
	$_SESSION['root']      = '/var/www/crm/'; // COLOQUE AQUI O CAMINHO FISICO DO SEU SERVIDOR
	$_SESSION['localhost'] = 0;
	
	$link					= 'http://'.$_SERVER['HTTP_HOST'].'/';
	$linkcache				= $link.'cache/';
	$linkcontent			= $link.'content/';
	$linkclasses			= $link.'core/classes/';
	$linklibrary			= $link.'core/library/';
	$linksettings			= $link.'core/settings/';
	$linkcss				= $link.'css/';
	$linkdownloads			= $link.'downloads/';
	$linkimg				= $link.'images/img/';
	$linkimgcontent			= $link.'images/content/';
	$linkjs					= $link.'js/';
	$linkmedia				= $link.'media/';
	$linkscripts			= $link.'scripts/';
	$linktemplatesweb		= $link.'templates/web/';
	$linktemplatesmobile	= $link.'templates/mobile/';
}

include('smarty.php');

/*
include($_SESSION['root'].'libs/Mobile_Detect.php');
$detect = new Mobile_Detect();
if ( $detect->isMobile() )
	$smarty->template_dir	= $_SESSION['root'].'templates_mobile/';
else
	$smarty->template_dir	= $_SESSION['root'].'templates/';
*/
?>