<?php include 'header.php';

$settingquery = $db->prepare("SELECT * FROM settings WHERE setting_id=?");
$settingquery->execute(array(0));
$settingpull = $settingquery->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Menyu əlavə olunması</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Menyu ayarları <?php if ($_GET['status'] == 'ok') { ?>
                <span style="color: green; padding-left:15px;">Dəyişikliklər qeyd olundu...</span>
              <?php } else if ($_GET['status'] == 'no') { ?>
                <span style="color: red; padding-left:15px;">Dəyişikliklər qeyd olunmadı...</span>
              <?php } ?>
            </h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="x_content">
              <form id="demo-form2" action="../netting/executer.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Kateqoriya seç</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="select2_single form-control" name="menu_up" tabindex="-1">
                      <option ></option>
                      <option value="0">Əsas menyu</option>
                      <?php $menucategoriesquery = $db->prepare("SELECT * FROM menus WHERE menu_up=:menu_id ORDER BY menu_row ASC");
													$menucategoriesquery->execute(array('menu_id' => 0));
                            while ($menucategoriespull = $menucategoriesquery->fetch(PDO::FETCH_ASSOC)) {?>
                              <option value="<?php echo $menucategoriespull['menu_id'] ?>"><?php echo $menucategoriespull['menu_name'] ?></option>
                           <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu adı<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="menu_name" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Menu url<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last-name" name="menu_url" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Menu sıra <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last-name" name="menu_row" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="menuadd" class="btn btn-success">Add</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->



<?php include 'footer.php' ?>

