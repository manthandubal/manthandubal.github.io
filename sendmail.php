<?php



if(isset($_POST['form_message'])){
    //print_r($_POST);

if($_POST['form_business'] == 'MF')
{
  $business = 'Modular Furniture';
  $email = 'info@eplmodular.com';
}
else if($_POST['form_business'] == 'FBEC')
{
  $business = 'Fusion Bonded Epoxy Coating';
  $email = 'eplrebar@eplgroup.co.in';
}
else if($_POST['form_business'] == 'CSPBridges')
{
  $business = 'CSP Bridges';
  $email = 'eplstr@eplgroup.co.in';
}
else if($_POST['form_business'] == 'SAbridges')
{
  $business = 'Structures and Arch bridges';
  $email = 'eplstr@eplgroup.co.in';
}
else if($_POST['form_business'] == 'BF')
{
  $business = 'Bio Fuel';
  $email = 'bharat@eplgroup.co.in';
}else if($_POST['form_business'] == 'Briquttes')
{
  $business = 'Briquttes';
  $email = 'bharat@eplgroup.co.in';
}

$name = $_POST['form_name'];
$custemail = $_POST['form_email'];
$cust_phone = $_POST['form_phone'];
$cust_comm = $_POST['form_message'];

ob_start();
include('mailformat.php');
$htmlmsg = ob_get_contents();
ob_end_clean();


    $to      = $email;
    $subject = "New Inquiry from Website for ".$business." ";
    $message = $_POST['form_business'];
    $headers = "From: ".$_POST['form_name']." <".$_POST['form_email'].">\r\n"; $headers = "Reply-To: ".$_POST['form_email']."\r\n";
    $headers = "Content-type: text/html; charset=iso-8859-1\r\n";
    'X-Mailer: PHP/' . phpversion();
    if(mail($to, $subject, $htmlmsg, $headers)) echo json_encode(['success'=> true ]);
    else echo json_encode(['success'=>false]);
    exit;
 }
?>
