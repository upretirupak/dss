<?php

$enableSandbox = true;
$data['item_name'] = $itemName;
$data['amount'] = $itemAmount;
$amount=$_POST['amount_total'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$note = $_POST['note'];
$payment = $_POST['payment'];
$address = $_POST['fulladdress'];


$returnUrl = 'http://localhost/onlinefoodorder/twakka/payment-successfull.php?' .
    'amount=' . urlencode($amount) .
    '&fname=' . urlencode($fname) .
    '&lname=' . urlencode($lname) .
    '&note=' . urlencode($note) .
    '&payment=' . urlencode($payment) .
    '&address=' . urlencode($address);

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
	'email' => 'srijal.fantastic-facilitator@gmail.com',
	'return_url' => $returnUrl,
	'cancel_url' => 'http://localhost/onlinefoodorder/twakka/payment-cancelled.php',
	'notify_url' => 'http://localhost/onlinefoodorder/twakka/checkout.php'
];

$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

// Product being purchased.
$itemName = 'Online Payment Twakka Khana';


//$amount=$_POST['amount_total'];
$itemAmount = (float)$amount;
$itemAmount=$itemAmount/132;



// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

	// Grab the post data so that we can set up the query string for PayPal.
	// Ideally we'd use a whitelist here to check nothing is being injected into
	// our post data.
	$data = [];
	foreach ($_POST as $key => $value) {
		$data[$key] = stripslashes($value);
	}

	// Set the PayPal account.
	$data['business'] = $paypalConfig['email'];

	// Set the PayPal return addresses.
	$data['return'] = stripslashes($paypalConfig['return_url']);
	$data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
	$data['notify_url'] = stripslashes($paypalConfig['notify_url']);
	// Set the details about the product being purchased, including the amount
	// and currency so that these aren't overridden by the form data.
	$data['item_name'] = $itemName;
	$data['amount'] = $itemAmount;
	$data['currency_code'] = 'USD';


	$queryString = http_build_query($data);

	// Redirect to paypal IPN
	header('location:' . $paypalUrl . '?' . $queryString);
	exit();

} 
