<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.adminkit.io/pages-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 04:51:55 GMT -->
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

	<link rel="canonical" href="pages-settings.html" />

	<title>Discount | Setup</title>

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
<?php include '../classes/Discount.php'; ?>
<?php include_once '../helpers/Format.php'; ?>
<?php
$pd = new Product();
$fm = new Format();
$db = new Database();
$Discount = new Discount();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $discountcost = $_POST['discount'];
    $product = $_POST['product'];
    $product_name = $_POST['product_name'];
    $data = [
        'product' => $product,
        'discount' => $discountcost,
        'product_name' => $product_name,
    ];

 //   print_r($data);die;
    $discountcosts = $Discount->insertDiscount($data);
}
?>


<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">
	<?php include('mysidebar.php'); ?>


		<div class="main">
			

			<main class="content">
				<div class="container-fluid p-0">
					<div class="row">
						

						<div class="col-md-9 col-xl-10">
							<div class="tab-content">
								<div class="tab-pane fade show active" id="account" role="tabpanel">

									<div class="card">
										<div class="card-header">

											<h5 class="card-title mb-0">Add Category</h5>
										</div>
										<div class="card-body">
                                        <form action="discountSetup.php" method="POST">
										<?php
        if (isset($delpro)) {
            echo $delpro;
        }
        ?>



                                           <div class="row">
													<div class="col-md-8">
														<div class="mb-3">
															<label class="form-label" for="inputUsername">Item</label>
															<select name="product" id="product_select" class="form-control">
                                                <option value="" selected disabled>select</option>
                                                <?php
                            $query = "select * from tbl_product ";
                            $inserted_row = $db->select($query);

                            if ($inserted_row) {
                                $i = 0;
                                while ($result = $inserted_row->fetch_assoc()) {
                                    $i++;
                                }
                            }
                            ?>
                                                <?php foreach ($inserted_row as $row) { 
                                                    ?>
                                                    <option value="<?php echo $row['productId']; ?>"><?php echo $row['productName']; ?></option>
                                                <?php } ?>
                                                <!-- Add more options if needed -->
                                            </select>
														</div>
	
													</div>

												<div class="row">
													<div class="col-md-8">
														<div class="mb-3">
															<label class="form-label" for="inputUsername">Discount</label>
															<input type="hidden" name="product_name" id="product_name" class="form-control">
                                                            <input type="number" name="discount" class="form-control">
														</div>
	
													</div>
													<div class="col-md-4">
														
												</div>

												<button class="add-button btn btn-primary btn-lg" name="submit" type="submit">Add</button>
											</form>

										</div>
									</div>

									

								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

		</div>
	</div>

	<script src="js/app.js"></script>
</body>


<!-- Mirrored from demo.adminkit.io/pages-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 04:51:55 GMT -->
</html>