<?php include 'header.php';
    include '../netting/executer.php';

$news_id=$_GET['news_id'];
$newsquery = $db->prepare("SELECT * FROM news WHERE news_id=:news_id");
$newsquery->execute(array('news_id'=> $news_id));
$newspull = $newsquery->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Xəbərlər dəyişdirilməsi paneli</h3>
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
              <input type="hidden" name="news_id" value="<?php echo $newspull['news_id'] ?>">        
              <input type="hidden" name="news_image" value="<?php echo $newspull['news_image'] ?>">
              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklənmiş şəkil<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <img width="195px" height="235px" src="../../<?php echo $newspull['news_image'] ?>" alt="">
                        </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xəbər başlığı
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="news_title" value="<?php echo $newspull['news_title']?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xəbər alt başlığı<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="news_subtitle"  value="<?php echo $newspull['news_subtitle']?> " class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Text <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea class="ckeditor" id="editor" name="news_text"  ><?php echo $newspull['news_text']?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xəbər şəkil<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name" name="news_image"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xəbər yazarı<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="news_author" value="<?php echo $newspull['news_author']?> "class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" id="first-name" name="news_date" class="form-control col-md-7 col-xs-12">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xəbər tagları<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="news_tag"  value="<?php echo $newspull['news_tag']?> " class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Xəbər kommentləri
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last-name" name="news_comment" value="<?php echo $newspull['news_comment'] ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Əsas səhifədə göstərilsin<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="heard" class="form-control col-md-7 col-xs-12" name="news_show" required>
                          <?php if ($newspull['news_show']=='1') {?>
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
                          <button type="submit" name="newsupdate" class="btn btn-success">Submit</button>
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