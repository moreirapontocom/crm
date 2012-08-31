<?
session_start();

include('core/settings/conf.php');
include('core/classes/crm.php');

if ( isset($_POST['login']) && $_POST['login'] == 1 ) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $user = trim($user);
    $pass = trim($pass);

    // Por enquanto eu serei o unico usuario deste CRM,
    // entao, os dados de acesso estao fixos.
    // altere as duas variaveis abaixo para definir seus dados de acesso
    $userL = '****************';
    $passL = '****************';

    if ( $user == $userL && $pass == $passL )
        $_SESSION['logged'] = 1;
    else
        $_SESSION['logged'] = 0;
}

if ( isset($_SESSION['logged']) && $_SESSION['logged'] == 1 ) {
    $logged = 1;
    $smarty->assign('logged',$logged);
} else {
    $logged = 0;
    $smarty->assign('logged');
}

if ( isset($_SESSION['warning']) && $_SESSION['warning'][0] == 1 ) {
	$smarty->assign('warning',$_SESSION['warning'][1]);
	$smarty->assign('warningTitle',$_SESSION['warning'][2]);
	$_SESSION['warning'][0] = 0;
}


$pages = array('home','novo-cliente','ver-historico');

if ( in_array($page, $pages) && $subpage == '' ) {
	include('content/'.$page.'.php');
	$main_page_content = $page.'.html';

} elseif ( in_array($page, $pages) && $subpage <> '' ) {
	include('content/'.$page.'.php');
	$main_page_content = $page.'.html';

} else {
	include('content/404.php');
	$main_page_content = '404.html';
}

( $logged == 1 ) ? $main_page_content = $main_page_content : $main_page_content = 'login.html';

$smarty->assign('main_page_content',$main_page_content);
$smarty->display('index.html');
?>