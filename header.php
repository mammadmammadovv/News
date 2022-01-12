<?php include 'control/netting/connection.php';
include 'control/production/function.php';
session_start();

$settingquery = $db->prepare("SELECT * FROM settings WHERE setting_id=?");
$settingquery->execute(array(0));
$settingpull = $settingquery->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>

<!-- Mirrored from siteyukseltme.com/indir/demo/html/demo-law-firm.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Oct 2021 13:19:27 GMT -->

<head>

	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo $settingpull['setting_title'] ?></title>

	<meta name="description" content="Porto - Responsive HTML5 Template">
	<meta name="author" content="siteyukseltme.com">

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/demos/law-firm/favicon-law.png" type="image/x-icon" />
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/font-awesome/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="vendor/animate/animate.min.css">
	<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/theme-elements.css">
	<link rel="stylesheet" href="css/theme-blog.css">
	<link rel="stylesheet" href="css/theme-shop.css">

	<!-- Current Page CSS -->
	<link rel="stylesheet" href="vendor/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="vendor/rs-plugin/css/layers.css">
	<link rel="stylesheet" href="vendor/rs-plugin/css/navigation.css">

	<!-- Demo CSS -->
	<link rel="stylesheet" href="css/demos/demo-law-firm.css">

	<!-- Skin CSS -->
	<link rel="stylesheet" href="css/skins/skin-law-firm.css">

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Head Libs -->
	<script src="vendor/modernizr/modernizr.min.js"></script>

	<style>
		#map{
			width: 100%;
			height: 400px;
		}

		.pagination_btn{
			padding:10px;  
			margin:0px 2px;
		}

		.pagination_active{
			color: white !important;;
			background:#c6984b;
			padding:10px;  
			margin:0px 2px;
		}

		a.isactive:hover{
			color: white;
			background-color:#c6984b!important;
		}
	</style>
</head>

<body>

	<div class="body">
		<header id="header" class="header-narrow header-no-border-bottom" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 115, 'stickySetTop': '-115px', 'stickyChangeLogo': true}">
			<div class="header-body">
				<div class="header-container container">
					<div class="header-row">
						<div class="header-column">
							<div class="header-row">
								<div class="header-logo">
									<a href="index.php">
										<img alt="Porto" width="164" height="54" data-sticky-width="112" data-sticky-height="37" data-sticky-top="93" src="<?php echo $settingpull['setting_logo_header'] ?>">
									</a>
								</div>
							</div>
						</div>
						<div class="header-column justify-content-end">
							<div class="header-row">
								<ul class="header-extra-info d-flex align-items-center">
									<li>
										<div class="feature-box feature-box-call feature-box-style-2 align-items-center">
											<div class="feature-box-icon">
												<i class="icon-call-end icons"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="mb-0"><?php echo $settingpull['setting_phone'] ?></h4>
											</div>
										</div>
									</li>
									<li class="d-none d-md-inline-flex">
										<div class="feature-box feature-box-mail feature-box-style-2 align-items-center">
											<div class="feature-box-icon">
												<i class="icon-envelope icons"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="mb-0"><a href="mailto:mail@example.com"><?php echo $settingpull['setting_mail'] ?></a></h4>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="header-nav-bar header-nav-bar-primary">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-nav header-nav-stripe justify-content-start">
										<div class="header-nav-main header-nav-main-light header-nav-main-effect-1 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">

													<?php
													$menuquery = $db->prepare("SELECT * FROM menus WHERE menu_up=:menu_id ORDER BY menu_row ASC");
													$menuquery->execute(array('menu_id' => 0));


													while ($menupull = $menuquery->fetch(PDO::FETCH_ASSOC)) {
														$menu_id = $menupull['menu_id'];
														$submenuquery = $db->prepare("SELECT * FROM menus WHERE menu_up=:menu_id ORDER BY menu_row ASC");
														$submenuquery->execute(array('menu_id' => $menu_id));
														$count = $submenuquery->rowCount();
														 ?>
														<li <?php if ($count > 0) {
																echo "class='dropdown'";
															} ?>>
															<a class="nav-link " href="<?php echo $menupull['menu_url'] ?>">
																<?php echo $menupull['menu_name'] ?>
															</a>
															<?php if ($menupull['menu_up'] > 0) {
																# code...
															} ?>
															<ul class="dropdown-menu">
																<?php

																while ($submenupull = $submenuquery->fetch(PDO::FETCH_ASSOC)) { ?>

																	<li class="dropdown">
																		<a class="nav-link " href="<?php echo $submenupull['menu_url'] ?>">
																			<?php echo $submenupull['menu_name'] ?>
																		</a>
																	</li>
																<?php }

																?>
															</ul>
														</li>
													<?php } ?>


												</ul>
											</nav>
										</div>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
										Menu <i class="fas fa-bars"></i>
									</button>
									<div class="header-search d-none d-lg-block">
										<form id="searchForm" action="https://siteyukseltme.com/indir/demo/html/page-search-results.html" method="get">
											<div class="input-group">
												<input type="text" class="form-control" name="q" id="q" placeholder="Axtarış..." required>
												<span class="input-group-append">
													<button class="btn btn-light" type="submit"><i class="icon-magnifier icons"></i></button>
												</span>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>