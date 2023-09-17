<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.adminkit.io/forms-basic-inputs.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 04:52:00 GMT -->
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

	<link rel="canonical" href="forms-basic-inputs.html" />

	<title>Add || Product</title>

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
<?php include '../classes/Category.php'; ?>
<?php
$pd = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  $insertProduct = $pd->productInsert($_POST, $_FILES);
}
?>
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">
    <?php include('mysidebar.php'); ?>
		<div class="main">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<main class="content">
				<div class="container-fluid p-0">
        
					<h1 class="h3 mb-3">Add a product</h1>

					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Add product</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" placeholder="product" name="productName">
								</div>
							</div>


                            <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Add product</h5>
								</div>
								<div class="card-body">
                                <select class="form-control m-bot15" name="catId">
                    <option> Select Category </option>
                    <?php
                      $cat = new Category();
                      $getCat = $cat->getAllCat();
                      if ($getCat) {
                        while ($result = $getCat->fetch_assoc() ) {
                    ?>
                    <option value="<?php echo $result['catId']?>"><?php echo $result['catName']?></option>
                    <?php }} ?>
                  </select>
								</div>
							</div>			

							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Description</h5>
								</div>
								<div class="card-body">
                                <textarea class="form-control ckeditor" name="body" rows="6"></textarea>
								</div>
							</div>


                            <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Product Price</h5>
								</div>
								<div class="card-body">
                                <input type="text" class="form-control" placeholder="Product Price" name="price">
								</div>
							</div>

                            <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Product Image</h5>
								</div>
								<div class="card-body">
                                <input type="file" class="form-control" name="image">
								</div>
							</div>

                            <div class="card">
								<div class="card-body">
                                <input type="submit" name="submit"  class="btn btn-primary" value="Add Product"/>
								</div>
							</div>

                           

							

						
					</div>

				</div>
			</main>

                        </form>
		</div>
	</div>

	<script src="js/app.js"></script>

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


<!-- Mirrored from demo.adminkit.io/forms-basic-inputs.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 04:52:00 GMT -->
</html>