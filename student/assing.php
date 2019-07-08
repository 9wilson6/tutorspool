<?php
ob_start();
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
session_start();
if (isset($_POST['assing'])) {
    require_once "../dbconfig/dbconnect.php";
    $query = "SELECT count from temp order by count desc limit 1 ";
    $p_count = $db->get_var($query);
    $student_info=$_SESSION['info']->username."λ".$_SESSION['info']->email;
                  
    $project_id = $_POST['project_id'];
    $user_id = $_POST['user_id'];
    $user_type_pass = $_POST['user_type'];
    $tutor_id = $_POST['tutor_id'];
    $cost = $_POST['cost'];
    $charges = $_POST['charged'];
    $tutor_details_query="SELECT username, email from users where user_id={$tutor_id} and type=2";
    $tutor_details=$db->get_row($tutor_details_query);
    $tutor_info=$tutor_details->username."λ".$tutor_details->email;

    $query="INSERT into temp(tutor_details,student_info,p_count, project_id, user_id, user_type_pass, tutor_id, cost, charges) VALUES('$tutor_info','$student_info','$p_count','$project_id','$user_id','$user_type_pass','$tutor_id','$cost','$charges')";
    if ( $db->query($query)) {
        require '../paypal_integration/bootstrap.php';
    if (empty($_POST['cost'])) {
        throw new Exception('This script should not be called directly, expected post data');
    }
    $payer = new Payer();
    $payer->setPaymentMethod('paypal');
// Set some example data for the payment.
    $currency = 'USD';
    $amountPayable = $_POST['cost'];
    $invoiceNumber = uniqid();
    $amount = new Amount();
    $amount->setCurrency($currency)
        ->setTotal($amountPayable);
    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setDescription("$" . $_POST['cost'] . " TO BE PAID FOR COMPLETION OF PROJECT ID: " . $_POST['project_id'])
        ->setInvoiceNumber($invoiceNumber);
    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl($paypalConfig['return_url'])
        ->setCancelUrl($paypalConfig['cancel_url']);
    $payment = new Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions([$transaction])
        ->setRedirectUrls($redirectUrls);
    try {
        $payment->create($apiContext);
    } catch (Exception $e) {
        throw new Exception('message: ' . $e->getMessage());
    }

    header('location:' . $payment->getApprovalLink());
    ob_flush();
    exit(1);
}

    }else{
       echo "Something went wrong please try again";
    }
   