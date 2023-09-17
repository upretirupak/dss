<?php


// Add the Content-Type header for JSON
// header('Content-Type: application/json');



include 'inc/head.php';
include 'inc/header.php';
include 'inc/sidebar.php'; ?>
<?php include '../classes/Product.php'; ?>
<?php include '../classes/Customer.php'; ?>
<?php include_once '../helpers/Format.php'; ?>
<?php
$pd = new Product();
$fm = new Format();
$db = new Database();
$cw = new Customer();


?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="Dashboard.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Orders</li>
        </ol>
      </div>
    </div>
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Customer Wise Report
        </header>
        <div class="table-responsive">
          <table id="customerwisetable" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th>S.N</th>
                <th>Customer Name</th>
                <th>Ordered Quantity</th>
                <th>Total Order Cost</th>
              </tr>
            </thead>
            <tbody id="tbody">
              <?php
              $getCustomer = $cw->getAllCustomerData();
              if ($getCustomer) {
                $i = 0;
                while ($result = $getCustomer->fetch_assoc()) {
                  $i++;
              ?>
                  <tr id="reportModal" data-id="<?php echo $result['id']; ?>">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['name'] ?></td>
                    <td><?php echo $result['total_ordered_quantity'] ?></td>
                    <td>Rs. <?php echo $result['total_ordered_price'] ?></td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>

    <!-- Modal -->
    <div class="modal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="left: 0;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="table-responsive">
              <table id="customerwisetable" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>S.N</th>
                    <th>Product Name</th>
                    <th>Ordered Quantity</th>
                    <th>Order Cost</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  <?php
                  $id = 2;
                  $getCustomer = $cw->getProductReport($id);
                  if ($getCustomer) {
                    $i = 0;
                    while ($result = $getCustomer->fetch_assoc()) {
                      $i++;
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['productName'] ?></td>
                        <td><?php echo $result['quantity'] ?></td>
                        <td>Rs. <?php echo $result['price'] ?></td>
                      </tr>
                  <?php }
                  } ?>

                </tbody>
              </table>
            </div>
          </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
        </div>
      </div>
    </div>
  </section>
  <!--main content end-->
</section>


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
    new DataTable('#customerwisetable');
  });

  $(document).on('click', "#reportModal", function(e) {
    e.preventDefault();

    var customerId = $(this).attr('data-id');
    // alert(customerId);
    // $("#customId").val(customerId);

    //   $.ajax({
    //     url: '../classes/Customer.php',
    //     type: 'post',
    //     data: {
    //       id: customerId,
    //       action: 'getProductReport'
    //     },
    //     dataType: 'json',
    //     success: function(data) {
    //       console.log(data);
    // Clear the table body
    // $('#tbody').empty();

    // Populate the table with data
    // for (var i = 0; i < data.length; i++) {
    //   var product = data[i];
    //   var row = '<tr>';
    //   row += '<td>' + (i + 1) + '</td>';
    //   row += '<td>' + product.productName + '</td>';
    //   row += '<td>' + product.quantity + '</td>';
    //   row += '<td>' + (product.price * product.quantity) + '</td>';
    //   row += '</tr>';
    //   $('#prdtbody').append(row);
    // }

    // Show the modal
    //       $('#myModal').modal('show');
    //     },
    //     error: function() {
    //       alert('Error fetching product report.');
    //     }
    //   });

    $('#myModal').modal('show');
  })
</script>

<?php include 'inc/footer.php'; ?>