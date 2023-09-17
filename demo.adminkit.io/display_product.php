<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.adminkit.io/pages-orders.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 04:51:56 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="pages-orders.html" />

	<title>Display || Product</title>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->
	<!-- <link href="css/dark.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
	<link class="js-stylesheet" href="css/light.css" rel="stylesheet">
	<script src="js/settings.js"></script>
	<style>
		body {
			opacity: 0;
		}
	</style>
	<!-- END SETTINGS -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120946860-10', { 'anonymize_ip': true });
</script></head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->
<?php include '../classes/Product.php'; ?>
<?php include_once '../helpers/Format.php'; ?>
<?php
  $pd = new Product();
  $fm = new Format();
 ?>
 <?php
 if (isset($_GET['delpro'])) {
     $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['delpro']);
     $delpro = $pd->delProById($id);
 }

 ?>
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">
	<?php include('mysidebar.php'); ?>
		<div class="main">
        <?php
          if (isset($delpro)) {
            echo $delpro;
        }
           ?>
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

			
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					

					<div class="card">
						<div class="card-header pb-0">
							<div class="card-actions float-end">
								<div class="dropdown position-relative">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-horizontal"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Product List</h5>
						</div>
						<div class="card-body">
							<table id="datatables-orders" class="table table-striped">
								<thead>
									<tr>
                                    <th> Serial Number</th>
                                    <th> Product Name</th>
                                    <th> Category Name</th>
                                    <th> Prdouct Price</th>
                                    <th><i class="icon_cogs"></i> Action</th>
									</tr>
								</thead>
								<tbody>
                                <?php
            $getPd = $pd->getAllProduct();
            if ($getPd) {
              $i = 0;
              while ($result = $getPd->fetch_assoc()) {
                $i++;
            ?>
            <tr>
             <td><?php echo $i;?></td>
             <td><?php echo $result['productName']?></td>
             <td><?php echo $result['catName']?></td>
             <td>Rs.<?php echo $result['price']?></td>

      <div class="btn-group">
      <td><a class="btn btn-primary" href="product_edit.php?proid=<?php echo $result['productId'];?>"><i class="fas fa-edit"></i> Edit</a></a>
      <a class="btn btn-danger" onclick="return confirm('Are you sure to delete')" href="?delpro=<?php echo $result['productId'];?>"><i class="fas fa-delete"></i>Delete</a></td>
      </div>
      </tr>
      <?php } } ?>

      <!-- <div class="btn-group">
                      <td><a class="btn btn-primary" href="category_edit.php?catid=<?php //echo $result['catId'];?>"> <i class="fas fa-edit"></i> Edit</a>
                       <a class="btn btn-danger" onclick="return confirm('Are you sure to delete')" href="?delcat=<?php //echo $result['catId'];?>"><i class="fas fa-delete"></i>Delete</a></td>
                     </div> -->
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</main>

			
		</div>
	</div>

	<script src="js/app.js"></script>

	<script src="js/datatables.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Orders
			$("#datatables-orders").DataTable({
				responsive: true,
				aoColumnDefs: [{
					bSortable: false,
					aTargets: [-1]
				}]
			});
		});
	</script>
<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
    setTimeout(function(){
      if(localStorage.getItem('popState') !== 'shown'){
        window.notyf.open({
          type: "success",
          message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
          duration: 10000,
          ripple: true,
          dismissible: false,
          position: {
            x: "left",
            y: "bottom"
          }
        });

        localStorage.setItem('popState','shown');
      }
    }, 15000);
  });
</script></body>


<!-- Mirrored from demo.adminkit.io/pages-orders.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 04:51:58 GMT -->
</html>