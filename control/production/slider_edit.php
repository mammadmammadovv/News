<?php include 'header.php';
    include '../netting/executer.php';

$slider_id=$_GET['slider_id'];
$sliderquery = $db->prepare("SELECT * FROM sliders WHERE slider_id=:slider_id");
$sliderquery->execute(array('slider_id'=> $slider_id));
$sliderpull = $sliderquery->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Slider edit panel</h3>
      </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Slider setting <?php if ($_GET['status']=='ok') {?>
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
              <input type="hidden" name="slider_id" value="<?php echo $sliderpull['slider_id'] ?>">        
              <input type="hidden" name="slider_image" value="<?php echo $sliderpull['slider_image'] ?>">
              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklənmiş şəkil<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <img width="100%" height="200px" src="../../<?php echo $sliderpull['slider_image'] ?>" alt="">
                        </div>
              </div>
              <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider yuxarı başlıq <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="slider_toplabel" required="required" value="<?php echo $sliderpull['slider_toplabel']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Slider əsas başlıq <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="slider_mainlabel" required="required" value="<?php echo $sliderpull['slider_mainlabel']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Slider aşağı başlıq <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="slider_bottomlabel" required="required" value="<?php echo $sliderpull['slider_bottomlabel']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Slider button başlığı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="slider_button" required="required" value="<?php echo $sliderpull['slider_button']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Slider şəkil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="last-name" name="slider_image"  value="<?php echo $sliderpull['slider_image']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Slider url <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="slider_link" required="required" value="<?php echo $sliderpull['slider_link']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Əsas səhifədə göstərilsin<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="heard" class="form-control col-md-7 col-xs-12" name="slider_show" required>
                          <?php if ($sliderpull['slider_show']=='1') {?>
                            <option value="1">Bəli</option>
                            <option value="0">Xeyr</option>
                          <?php }else {?>
                            <option value="0">Xeyr</option>
                            <option value="1">Bəli</option>
                          <?php } ?>
                          </select>  
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="sliderupdate" class="btn btn-success">Submit</button>
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