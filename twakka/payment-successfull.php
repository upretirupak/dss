<?php
include 'inc/head.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $data = [
        'fname' => $_GET['fname'],
        'lname' => $_GET['lname'],
         'fulladdress' => $_GET['address'],
         'note' => $_GET['note'],
        // Add more fields as needed
    ];

    //$customer = new Customer();
    $result = $cmr->customerBilling($data);
    if ($result) {

        echo 'Payment Succesful';
      //   header('Location: payment.php'); // Replace with your success page URL
        // exit();
    } else {
        // Payment successful, but data insertion failed
        // Handle the failure scenario, e.g., display an error message.
        echo "Data insertion failed!";
    }
} else {
    echo "Invalid request!";
}


 include 'inc/footer.php'; 
