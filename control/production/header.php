<?php 
ob_start();
session_start();
include '../netting/connection.php';
include '../netting/executer.php';

if ($_SESSION['admin']==null) {
  header("Location: login.php?login=unauthorized");
}
$admin_id = $_GET['admin_id'];
$adminquery = $db->prepare("SELECT * FROM admin_users WHERE admin_id=:admin_id");
$adminquery->execute(array('admin_id' => $admin_id));
$adminpull = $adminquery->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Control Panel Porto MMC</title>

  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php include 'sidebar.php'; ?>

      <!-- top navigation -->
      <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../<?php echo $_SESSION['admin_image']?>" alt=""><?php echo $_SESSION['admin'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="user_edit.php?admin_id=<?php echo $_SESSION['admin_id']?>"> Profil</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      <!-- /top navigation -->