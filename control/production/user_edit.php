<?php include 'header.php';
include '../netting/executer.php';



?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>User edit panel</h3>
      </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Slider setting <?php if ($_GET['status'] == 'ok') { ?>
                <span style="color: green; padding-left:15px;">Dəyişikliklər qeyd olundu...</span>
              <?php } else if ($_GET['status'] == 'no') { ?>
                <span style="color: red; padding-left:15px;">Dəyişikliklər qeyd olunmadı...</span>
              <?php } ?>
            </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form action="../netting/executer.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <input type="hidden" name="admin_id" value="<?php echo $adminpull['admin_id'] ?>" id="">
              <input type="hidden" name="old_image" value="<?php echo $adminpull['admin_image'] ?>">
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklənmiş logo<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php if (strlen($adminpull['admin_image']) > 0) { ?>
                    <img width="150px" height="150px" src="../../<?php echo $adminpull['admin_image'] ?>" alt="">
                  <?php } else { ?>
                    <img width="150px" height="150px" src="../../new_image/admins/nophoto.jpg" alt="">
                  <?php } ?>

                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name" name="admin_image" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="userlogoupdate" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
            <div class="ln_solid"></div>
            <form action="../netting/executer.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <input type="hidden" name="admin_id" value="<?php echo $adminpull['admin_id'] ?>" id="">

              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İstifadəçi adı<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="admin_username" required="required" value="<?php echo $adminpull['admin_username'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Şifrə <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="admin_password" required="required" value="<?php echo $adminpull['admin_password'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Admin aktivliyi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="heard" class="form-control col-md-7 col-xs-12" name="admin_status" required>
                    <?php if ($adminpull['admin_status'] == '1') { ?>
                      <option value="1">Aktiv</option>
                      <option value="0">Passiv</option>
                    <?php } else { ?>
                      <option value="0">Passiv</option>
                      <option value="1">Aktiv</option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="userupdate" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<?php include 'footer.php' ?>