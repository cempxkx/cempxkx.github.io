<?php
require_once 'toyyibpay_key.php';
// include 'manage_po.php';

// $name=$_POST['agentName'];
// $email=$_POST['agentEmail'];
// $telefon=$_POST['agentPhone'];
//$totalharga=$_POST['totalprice'];
$amount = isset($_POST['amount']) ? $_POST['amount'] : '';
// $name = isset($_POST['agentName']) ? $_POST['agentName'] : '';
// $email = isset($_POST['email']) ? $_POST['email'] : '';
// $telefon = isset($_POST['agentPhone']) ? $_POST['agentPhone'] : '';
// $totalharga = isset($_POST['totalprice']) ? $_POST['totalprice'] : '';


// $rmx100=($totalharga(100));


// $name = $_POST['name'];
// $address1 = $_POST['address1'];
// $address2 = $_POST['address2'];
// $email = $_POST['email'];
// $amount = $_POST['amount'];
// $rmx100=($amount*100);

$post_data = array(
    'userSecretKey' => $secret_key,
    'categoryCode' => $category_code,
    'billName' => 'SkinnyHub',
    'billDescription' => 'Successful payment of RM',
    'billPriceSetting' => 0,
    'billPayorInfo' => 0,
    'billAmount' => '', //require dari total in purchase order
    'billReturnUrl' => 'https://github.com/cempxkx/sms_fyp.git', //success.html
    'billCallbackUrl' => '',
    'billExternalReferenceNo' => '',//ori-time().rand(),
    'billTo' => 'kina',
    'billEmail' => 'kina@gmail.com', //call email from database
    'billPhone' => '014567895',
    'billSplitPayment' => 0,
    'billSplitPaymentArgs' => '',
    'billPaymentChannel' => 0,
);
// php curl to post data to payment gateway
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
$result = curl_exec($curl);
$info = curl_getinfo($curl);
curl_close($curl);
$obj = json_decode($result, true);
$billcode = isset($obj[0]['BillCode']) ? $obj[0]['BillCode'] : '';
// echo '<pre>';
// print_r($result);
// echo '</pre>';
// exit;
// $post_data['billCode'] = $result[0]['BillCode'];
// $post_data['paymentURL'] = 'https://toyyibpay.com/' . $result[0]['BillCode'];
// header('Location: ' . $post_data['paymentURL']);
?>

<script type="text/javascript">
   window.location.href="https://toyyibpay.com/<?php echo $billcode;?>"; 
</script>
