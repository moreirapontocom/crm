<?
$get = new crm();

if ( isset($_POST['nextStepDone']) && $_POST['nextStepDone'] == 1 ) {
    $get->updateNextStepStatus($_POST['idHistory']);
}

$countCustomers = $get->countCustomers();
$listaCustomers = $get->getCustomers();

$countNextSteps = $get->countNextSteps();
$nextSteps = $get->getNextSteps();

$smarty->assign('countCustomers',$countCustomers);
$smarty->assign('listaCustomers',$listaCustomers);

$smarty->assign('countNextSteps',$countNextSteps);
$smarty->assign('nextSteps',$nextSteps);
?>