<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
					<span class="sidebar-brand-text align-middle">
						Twakka
						<sup><small class="badge bg-primary text-uppercase"></small></sup>
					</span>
					<svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.5"
						stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF" style="margin-left: -3px">
						<path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
						<path d="M20 12L12 16L4 12"></path>
						<path d="M20 16L12 20L4 16"></path>
					</svg>
				</a>

				<div class="sidebar-user">
					<div class="d-flex justify-content-center">
						<div class="flex-grow-1 ps-2">
							
							<div class="dropdown-menu dropdown-menu-start">
								<a class="dropdown-item" href="pages-profile.php"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="add_category.php"><i class="align-middle me-1" data-feather="settings"></i>Report</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Log out</a>
							</div>
						</div>
					</div>
				</div>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
					<li class="sidebar-item active">
						<a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="layout"></i> <span class="align-middle">Pages</span>
						</a>
						<ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="customerwisereport.php">Customer Wise Report <span
								class="sidebar-badge badge bg-primary"></span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="billwisereport.php">Billwise Report<span
										class="sidebar-badge badge bg-primary"></span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="add_category.php">Add Category <span
										class="sidebar-badge badge bg-primary"></span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="display_category.php">Display Category <span
										class="sidebar-badge badge bg-primary"></span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="add_product.php
                            ">Add product  <span
										class="sidebar-badge badge bg-primary"></span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="display_product.php">Display Product<span
										class="sidebar-badge badge bg-primary"></span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="discountsetup.php">Discount Setup</a></li>
						</ul>
					</li>

			
					</li>
			</div>
		</nav>