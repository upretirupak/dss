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

	<title>Settings | AdminKit Demo</title>

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


<?php include '../classes/Category.php'; ?>
<?php
$cat = new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $catName = $_POST['catName'];
  $insertCat = $cat->catInsert($catName);
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
										<form action="add_category.php" method="post">
										<?php
										if (isset($insertCat)) {
										echo $insertCat;
										}
										?>
												<div class="row">
													<div class="col-md-8">
														<div class="mb-3">
															<label class="form-label" for="inputUsername">Category</label>
															<input name  = "catName" type="text" class="form-control" id="inputUsername" placeholder="Category">
														</div>
	
													</div>
													<div class="col-md-4">
														
												</div>

												<button type="submit" style = "width:150px !important" class="btn btn-primary">Save changes</button>
											</form>

										</div>
									</div>

									

								</div>
								<div class="tab-pane fade" id="password" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Password</h5>

											<form>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordCurrent">Current password</label>
													<input type="password" class="form-control" id="inputPasswordCurrent">
													<small><a href="#">Forgot your password?</a></small>
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordNew">New password</label>
													<input type="password" class="form-control" id="inputPasswordNew">
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordNew2">Verify password</label>
													<input type="password" class="form-control" id="inputPasswordNew2">
												</div>
												<button type="submit" class="btn btn-primary">Save changes</button>
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