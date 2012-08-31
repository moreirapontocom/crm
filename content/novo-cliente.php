<?
if ( isset($_POST['new']) && $_POST['new'] == 1 ) {

    $ni         = $_POST['ni'];
    $source     = $_POST['source'];
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $web        = $_POST['web'];
    $obs        = $_POST['obs'];

    $add = new crm();
    $add->addCustomer($ni,$source,$name,$email,$phone,$web,$obs);
}
?>