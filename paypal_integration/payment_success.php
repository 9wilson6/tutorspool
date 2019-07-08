<?php
ob_start();
session_start();
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
require 'bootstrap.php';
require_once("../inc/utilities.php");
require_once("../dbconfig/dbconnect.php");
require_once("../inc/global_functions.php");
ob_flush();
if (empty($_GET['paymentId']) || empty($_GET['PayerID'])) {
    throw new Exception('The response is missing the paymentId and PayerID');
}
$paymentId = $_GET['paymentId'];
$payment = Payment::get($paymentId, $apiContext);
$execution = new PaymentExecution();
$execution->setPayerId($_GET['PayerID']);
try {
    // Take the payment
    $payment->execute($execution, $apiContext);
    try {
        // $db = new mysqli($dbConfig['host'], $dbConfig['root'], $dbConfig['password'], $dbConfig['name']);
        $payment = Payment::get($paymentId, $apiContext);
        $data = [
            'transaction_id' => $payment->getId(),
            'payment_amount' => $payment->transactions[0]->amount->total,
            'payment_status' => $payment->getState(),
            'invoice_id' => $payment->transactions[0]->invoice_number
        ];
        if (addPayment($data) !== false && $data['payment_status'] === 'approved') {
            // Payment successfully added, redirect to the payment complete page.
            header('location:payment-successful.html');
            exit(1);
        } else {
            // Payment failed
        }
    } catch (Exception $e) {
        // Failed to retrieve payment from PayPal
    }
} catch (Exception $e) {
    // Failed to take payment
}
/**
 * Add payment to database
 *
 * @param array $data Payment data
 * @return int|bool ID of new payment or false if failed
 */
function addPayment($data)
{
    global $db;
    if (is_array($data)) {
        $transaction_id=  $data['transaction_id'];
        $payment_amount=  $data['payment_amount'];
        $payment_status=  $data['payment_status'];
        $invoice_id=$data['invoice_id'];
        $date=  date('Y-m-d H:i:s');
        $payment_amount=explode('.', $payment_amount);
        $payment_amount=$payment_amount[0];
        $temp_query="SELECT * FROM temp WHERE cost={$payment_amount} order by count desc limit 1";
        $result=$db->get_row($temp_query);
        ////////////////////////////////////////////////////////////
       

    if (($result->p_count + 1)== $result->count) {
         $project_id=$result->project_id;
        $user_id=$result->user_id;
        $tutor_id= $result->tutor_id;
        $cost= $payment_amount;
        $charges=$result->charges;
        $project_id=$result->project_id;
         $tutor_info=explode("λ", $result->tutor_details);
        $student_info=explode("λ", $result->student_info);
    }else{
        $current=($result->p_count + 1);
        $temp_query="SELECT * FROM temp WHERE count={$payment_amount} order by count desc limit 1";
        $result=$db->get_row($temp_query);
         $project_id=$result->project_id;
        $user_id=$result->user_id;
        $tutor_id= $result->tutor_id;
        $cost= $payment_amount;
        $charges=$result->charges;
        $project_id=$result->project_id;
         $tutor_info=explode("λ", $result->tutor_details);
        $student_info=explode("λ", $result->student_info);
    }
       ///////////////////////////////////////////////////////////
       // echo $tutor_info[0]."<br>".$student_info[0];
       
        $query="INSERT INTO paypal_payments(item_no, transaction_id, payment_amount, payment_status,invoice_id, createdtime ) VALUES('$project_id','$transaction_id', '$payment_amount','$payment_status',  '$invoice_id','$date')";
        $db->query($query); 
        
    $query="INSERT INTO on_progress(project_id, student_id, tutor_id) VALUES ('$project_id', '$user_id', '$tutor_id')";
    if ($db->query($query)) {
        $query="UPDATE projects SET status=1, cost='$cost', charges='$charges' WHERE project_id='$project_id'";
        if ($db->query($query)) {

            $query="DELETE FROM bids WHERE project_id='$project_id'";
            if ($db->query($query)) {
             /////////////////////////////////notification/////////////////////////////////////////////
                $_SESSION['user_type']=1;
                $_SESSION['user_id']=$user_id;
                $note="Student : ".$student_info[0]." assigned project id: ".$project_id." to Tutor, ".$tutor_info[0]." at ".$date_global;
                $note2="You Assigned project id: ".$project_id." to Tutor, ".$tutor_info[0]." at ". $date_global;
                $user_type=1;
                $querys="INSERT INTO notifications(user_type, note) VALUES('$user_type','$note')";
                $db->query($querys);
                $querys="INSERT INTO notifications(user_type, note, user_id) VALUES(3,'$note2','$user_id')";
                $db->query($querys);
                // $db->query("DELETE from temp where project_id={$project_id}");

                $subject="You have been assigned order ID: ". $project_id;
                $details="Hello ".$tutor_info[0] .",<br> We Have good news for you. You have been awarded order ID: ". $project_id ." You may start working it.";
                sendMail($details, $tutor_info[1], $subject);
                sendMail($details, "admin@tutorspool.com", $subject);
                ?>
                <script>
                    let x="<?php echo $tutor_info[0] ?>";
                    alert(" Payment Completed Successfully....\n Project successfully assigned to tutor: " +x );
                    window.location.assign("../student/in-progress.php");
                </script>
                <?php
            }
        }
    }
    }
    return false;
}
?>
<html>
<head>
    <title>PayPal Integration - Payment Completed Successfully</title>
</head>
<body>
    <h1></h1>
</body>
</html>
