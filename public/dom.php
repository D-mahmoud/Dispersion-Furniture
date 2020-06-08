<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Orders.php");
require_once(__ROOT__ . "model/Payments.php");
require_once(__ROOT__ . "controller/OrderController.php");
require_once(__ROOT__ . "view/customer.php");




    /* include autoloader */
require_once 'dompdf/autoload.inc.php';
ob_start();

/* reference the Dompdf namespace */
use Dompdf\Dompdf;
use Dompdf\Options;

$dbh = DBh::getInstance();
    $mysqli = $dbh->getConnection();
    $sql = " SELECT * orders ";
    $result =	$mysqli->query($sql);
    if($result == true){
       $x= "h";
    }


$options = new Options();
$options->set('isPhpEnabled', true);
$dompdf = new DOMPDF($options);
$dompdf->loadHtml(file_get_contents('C:\wamp64\www\pillowmart\pillowmart\public\Receipt.php'));$dompdf->render();
$dompdf->stream("filename.pdf", array("Attachment"=>0));
    
//$file = file_get_contents('C:\wamp64\www\pillowmart\pillowmart\public\Receipt.php');

    


?>