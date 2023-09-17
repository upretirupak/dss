<?php
//namespace OnlineFoodOrder\Classes;
include_once '../lib/Database.php';
include_once '../helpers/Format.php';



error_reporting(E_ALL);
ini_set('display_errors', 1);



?>
<?php

class Customer
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function customerRegistration($data)
  {

    
    $name        = mysqli_real_escape_string($this->db->link, $data['name']);
    $country     = mysqli_real_escape_string($this->db->link, $data['country']);
    $phone       = mysqli_real_escape_string($this->db->link, $data['phone']);
    $email       = mysqli_real_escape_string($this->db->link, $data['email']);
    $pass        = mysqli_real_escape_string($this->db->link, md5($data['pass']));

    if ($name == "" || $country == "" || $phone == "" || $email == "" || $pass == "") {
      $msg = "<div class='alert alert-danger fade in'>
                 <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                  Field must not be empty !</div>";
      return $msg;
    }
    $mailquery = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
    $mailchk   = $this->db->select($mailquery);
    if ($mailchk != false) {
      $msg = "<div class='alert alert-danger fade in'>
            <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
             Email already Exist !</div>";
      return $msg;
    } else {
      $query = "INSERT INTO tbl_customer(name,country,phone,email,pass)
              VALUES('$name','$country','$phone','$email','$pass')";
      $inserted_row = $this->db->insert($query);
      if ($inserted_row) {
        $msg = "<div class='alert alert-success fade in'>
              <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
              Registration Sucessfully !!</div>";
        return $msg;
      } else {
        $msg = "<div class='alert alert-danger fade in'>
              <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
              Registration not Sucessfully  !!</div>";
        return $msg;
      }
    }
  }

  public function customerLogin($data)
  {
    $email  = mysqli_real_escape_string($this->db->link, $data['email']);
    $pass   = mysqli_real_escape_string($this->db->link, md5($data['pass']));
    if (empty($email) || empty($pass)) {
      $msg = "<div class='alert alert-danger fade in'>
                <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                Field must not be empty !!</div>";
      return $msg;
    }

    $query = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass = '$pass'";
    $result = $this->db->select($query);
    if ($result != false) {
      $value = $result->fetch_assoc();
      Session::set("cuslogin", true);
      Session::set("cmrId", $value['id']);
      Session::set("cmrName", $value['name']);
      echo "<script>window.location = 'carts.php'; </script>";
    } else {
      $msg = "<div class='alert alert-danger fade in'>
                <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                Email Or Password not match !!</div>";
      return $msg;
    }
  }

  public function getCustomerData($id)
  {
    $query = "SELECT * FROM tbl_customer WHERE id = '$id' ";
    $result = $this->db->select($query);
    return $result;
  }


  public function getProductReport($id)
  {
    $query = "SELECT productName, price, quantity FROM `tbl_cart` WHERE customer_id = $id";
    $result = $this->db->select($query);
    return $result;
  }

  // public function getProductReport($id)
  // {
  //   echo 123;
  //   $query = "SELECT productName, price, quantity FROM `tbl_cart` WHERE customer_id = $id";
  //   $result = $this->db->select($query);

  //   if ($result) {
  //     echo json_encode($result);
  //   } else {
  //     echo json_encode(['error' => 'Failed to fetch data']);
  //     error_log("Failed to fetch data for ID: $id");
  //   }
  // }


  public function getAllCustomerData()
  {
    $query = "SELECT c.id, 
    c.name,
    COUNT(o.cartId) AS total_orders, 
    SUM(o.quantity) AS total_ordered_quantity, 
    SUM(o.price) AS total_ordered_price
    FROM tbl_customer c
    LEFT JOIN tbl_cart o ON c.id = o.customer_id
    GROUP BY c.id, c.name";
    $result = $this->db->select($query);
    return $result;
  }

  public function customerUpdate($data, $cmrId)
  {
    $name        = mysqli_real_escape_string($this->db->link, $data['name']);
    $country     = mysqli_real_escape_string($this->db->link, $data['country']);
    $phone       = mysqli_real_escape_string($this->db->link, $data['phone']);
    $email       = mysqli_real_escape_string($this->db->link, $data['email']);
    $pass        = mysqli_real_escape_string($this->db->link, md5($data['pass']));

    if ($name == "" || $country == "" || $phone == "" || $email == "" || $pass == "") {
      $msg = "<div class='col-md-8'><div class='alert alert-danger fade in'>
                 <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                  Field must not be empty !</div></div>";
      return $msg;
    } else {
      $query = "UPDATE tbl_customer
                        SET
                        name    = '$name',
                        country = '$country',
                        phone   = '$phone',
                        email   = '$email',
                        pass    = '$pass'
                        WHERE id = '$cmrId'";
      $updated_row = $this->db->update($query);
      if ($updated_row) {
        $msg = "<div class='col-md-8'>
                               <div class='alert alert-success fade in'>
                               <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                               Customer Data Updated Sucessfully !!</div></div>";
        return $msg;
      } else {
        $msg = "<div class='col-md-8'><div class='alert alert-danger fade in'>
                               <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                               Customer Data Not Updated !!</div></div>";
        return $msg;
      }
    }
  }


  public function customerBilling($data)
  {
    
   //echo '<pre>';  print_r($_SESSION);die;
    $fname        = mysqli_real_escape_string($this->db->link, $data['fname']);
    $lname        = mysqli_real_escape_string($this->db->link, $data['lname']);
    $fulladdress  = mysqli_real_escape_string($this->db->link, $data['fulladdress']);
    $note        = mysqli_real_escape_string($this->db->link, $data['note']);


    if ($fname == "" || $fulladdress == "") {
      $msg = "<div class='alert alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                                   Field must not be empty !</div>";
      return $msg;
    }
    spl_autoload_register(function ($class) {
      include_once "classes/" . $class . ".php";
    });
    $ct = new  Cart();
    $cmr = new Customer();
    $sesid = Session::get("cmrId");
    $cid = 0;
    $productid = 0;
    $gdata = $cmr->getCustomerData($sesid);
    if ($gdata) {
      while ($result = $gdata->fetch_assoc()) {
        $cid = $result["id"];
     //  $productid = $result["productId"];
        break;
      }
    }
    $getPro = $ct->getCartProduct();
 
    if ($getPro) {
      $sum = 0;
      $qty = 0;
      $sid = "0";
      $productid = 0;
      while ($result = $getPro->fetch_assoc()) {
       // print_r($result);die;
        $sid = $result["sId"];
        $productid = $result["productId"];
        $cartId =  $result["cartId"];
        $query = "INSERT INTO tbl_bill_details(fname,lname,fulladdress,note,sid,cid,productid,cdate)
                                 VALUES('$fname','$lname','$fulladdress','$note','$sid',$cid,$productid,NOW())";
        $inserted_row = $this->db->insert($query);
      //  print_r($inserted_row);die;
        if ($inserted_row) {
          $viewType = 'checkout';
          $msg = "<div class='alert alert-success fade in'>
                                 <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                                 Order has been placed !!</div>";
          $ct->delProductByCart($cartId,$viewType);
          unset($_SESSION['qty']);
          return $msg;
        } else {
          $msg = "<div class='alert alert-danger fade in'>
                                 <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                                 Order not accepted !!</div>";
                                 
          return $msg;
         
        }
      }
    }
  
  }
//   function checkUser($data = array()){ 
//   //  echo 123;die;
//     if(!empty($data)){ 
//         // Check whether the user already exists in the database 
//         $checkQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$data['oauth_provider']."' AND oauth_uid = '".$data['oauth_uid']."'"; 
//         $checkResult = $this->db->query($checkQuery); 
         
//         // Add modified time to the data array 
//         if(!array_key_exists('modified',$data)){ 
//             $data['modified'] = date("Y-m-d H:i:s"); 
//         } 
         
//         if($checkResult->num_rows > 0){ 
//             // Prepare column and value format 
//             $colvalSet = ''; 
//             $i = 0; 
//             foreach($data as $key=>$val){ 
//                 $pre = ($i > 0)?', ':''; 
//                 $colvalSet .= $pre.$key."='".$this->db->real_escape_string($val)."'"; 
//                 $i++; 
//             } 
//             $whereSql = " WHERE oauth_provider = '".$data['oauth_provider']."' AND oauth_uid = '".$data['oauth_uid']."'"; 
             
//             // Update user data in the database 
//             $query = "UPDATE ".$this->userTbl." SET ".$colvalSet.$whereSql; 
//             $update = $this->db->query($query); 
//         }else{ 
//             // Add created time to the data array 
//             if(!array_key_exists('created',$data)){ 
//                 $data['created'] = date("Y-m-d H:i:s"); 
//             } 
             
//             // Prepare column and value format 
//             $columns = $values = ''; 
//             $i = 0; 
//             foreach($data as $key=>$val){ 
//                 $pre = ($i > 0)?', ':''; 
//                 $columns .= $pre.$key; 
//                 $values  .= $pre."'".$this->db->real_escape_string($val)."'"; 
//                 $i++; 
//             } 
             
//             // Insert user data in the database 
//             $query = "INSERT INTO ".$this->userTbl." (".$columns.") VALUES (".$values.")"; 
//             $insert = $this->db->query($query); 
//         } 
         
//         // Get user data from the database 
//         $result = $this->db->query($checkQuery); 
//         $userData = $result->fetch_assoc(); 
//     } 
     
//     // Return user data 
//     return !empty($userData)?$userData:false; 
// } 
// }

?>
