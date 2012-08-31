<?
include_once($_SERVER['DOCUMENT_ROOT'].'/core/library/smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir	= $_SESSION['root'].'templates/web/';
$smarty->compile_dir	= $_SESSION['root'].'cache/';
$smarty->config_dir		= $_SESSION['root'].'core/settings/';
$smarty->cache_dir		= $_SESSION['root'].'cache/';

$smarty->assign('link',$link);
$smarty->assign('linkcache',$linkcache);
$smarty->assign('linkcontent',$linkcontent);
$smarty->assign('linkclasses',$linkclasses);
$smarty->assign('linklibrary',$linklibrary);
$smarty->assign('linksettings',$linksettings);
$smarty->assign('linkcss',$linkcss);
$smarty->assign('linkdownloads',$linkdownloads);
$smarty->assign('linkimg',$linkimg);
$smarty->assign('linkimgcontent',$linkimgcontent);
$smarty->assign('linkjs',$linkjs);
$smarty->assign('linkmedia',$linkmedia);
$smarty->assign('linkscripts',$linkscripts);

$smarty->assign('page',$page);
$smarty->assign('subpage',$subpage);
$smarty->assign('subsubpage',$subsubpage);
?>