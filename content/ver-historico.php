<?
$get = new crm();

if ( isset($_POST['post']) && $_POST['post'] == 1 ) {
	$get->addHistory($_POST['idCustomer'],$_POST['content'],$_POST['nextStep']);
}

if ( isset($_POST['update']) && $_POST['update'] == 1 ) {
    $get->updateCustomer($_POST['idCustomer'],$_POST['ni'],$_POST['name'],$_POST['email'],$_POST['phone'],$_POST['web'],$_POST['obs']);
}

if ( isset($_POST['nextStepDone']) && $_POST['nextStepDone'] == 1 ) {
    $get->updateNextStepStatus($_POST['idHistory']);
}



$count = $get->countHistory($subpage);
$customer = $get->getCustomer($subpage);
$lista = $get->getHistory(0,$subpage);

$smarty->assign('customerName',$customer[0]['name']);
$smarty->assign('count',$count);

$smarty->assign('customer',$customer[0]);
$smarty->assign('listaHistory',$lista);
?>