<?php include 'header.php';
    include '../netting/executer.php';

$settingquery = $db->prepare("SELECT * FROM settings WHERE setting_id=?");
$settingquery->execute(array(0));
$settingpull = $settingquery->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Setting Panel</h3>
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
            <h2>General setting <?php if ($_GET['status']=='ok') {?>
              <span style="color: green; padding-left:15px;">Dəyişikliklər qeyd olundu...</span>
            <?php }else if($_GET['status']=='no'){?>
              <span style="color: red; padding-left:15px;">Dəyişikliklər qeyd olunmadı...</span>
            <?php } ?> </h2>
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
              <div class="row col-lg-12">
                <div class="col-lg-6">
                <input type="hidden" name="header_old_logo" value="<?php echo $settingpull['setting_logo_header'] ?>">
              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklənmiş logo (Başlıq hissə)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <img  src="../../<?php echo $settingpull['setting_logo_header'] ?>" alt="">
                        </div>
              </div>  

              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name" name="setting_logo_header"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>    
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="headerlogoupdate" class="btn btn-success">Submit</button>
                        </div>
                      </div>
            </form>
                </div>
                <div class="col-lg-6">
                <input type="hidden" name="footer_old_logo" value="<?php echo $settingpull['setting_logo_footer'] ?>">
              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklənmiş logo (Aşağı hissə)<span class="required">*</span>
                        </label>
                        <div style="background-color: #2A3F54; height:100px;" class="col-md-6 col-sm-6 col-xs-12">
                        <img style="margin-top: 10px;" src="../../<?php echo $settingpull['setting_logo_footer'] ?>" alt="">
                        </div>
              </div>  

              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name" name="setting_logo_footer"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>    
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="footerlogoupdate" class="btn btn-success">Submit</button>
                        </div>
                      </div>
            </form>
                </div>
              </div>
              
              
            <div class="ln_solid"></div>
              
              <form action="../netting/executer.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
               
              
              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="setting_title" required="required" value="<?php echo $settingpull['setting_title']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Subtitle <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="setting_subtitle" required="required" value="<?php echo $settingpull['setting_subtitle']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="setting_phone" required="required" value="<?php echo $settingpull['setting_phone']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mail <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="setting_mail" required="required" value="<?php echo $settingpull['setting_mail']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Adress <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="setting_adress" required="required" value="<?php echo $settingpull['setting_adress']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Working hours <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="setting_working_hours" required="required" value="<?php echo $settingpull['setting_working_hours']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="generalsettingupdate" class="btn btn-success">Submit</button>
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