<?php
include_once '../lib/Database.php';
include_once '../helpers/Format.php';
?>
<?php
class Discount
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }



    public function insertDiscount($data)
    {
        // print_r($data);
        // die;

        $product_id = mysqli_real_escape_string($this->db->link, $data['product']);
        $discount = mysqli_real_escape_string($this->db->link, $data['discount']);
        $product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);

        if ($product_id == "" || $discount == "") {
            $msg = "<div class='alert alert-danger fade in'>
                     <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                      Field must not be empty !</div>";
            return $msg;
        }

        $mailquery = "SELECT * FROM tbl_discount WHERE product_id='$product_id' LIMIT 1";
        $mailchk = $this->db->select($mailquery);
        // print_r($mailquery);
        // die;
        if ($mailchk != false) {
            // echo "true";
            // die;
            $query = "UPDATE tbl_discount SET discount='$discount' WHERE product_id='$product_id'";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
                $msg = "<div class='alert alert-success fade in'>
                  <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                  Discount Updated Successfully !!</div>";
                return $msg;
            } else {
                $msg = "<div class='alert alert-danger fade in'>
                  <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                  Discount Update Not Successful  !!</div>";
                return $msg;
            }
        } else {
            // echo "false";
            // die;
            $query = "INSERT INTO tbl_discount(product_id, discount, product_name) VALUES('$product_id','$discount', '$product_name')";
            $inserted_row = $this->db->insert($query);
            // print_r($inserted_row);
            // die;
            if ($inserted_row) {
                $msg = "<div class='alert alert-success fade in'>
                  <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                  Discount Added Successfully !!</div>";
                return $msg;
            } else {
                $msg = "<div class='alert alert-danger fade in'>
                  <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                  Discount Not Successful  !!</div>";
                return $msg;
            }
        }
    }
}


?>
