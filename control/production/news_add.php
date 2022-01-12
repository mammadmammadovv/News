<?php include 'header.php';


?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Xəbərlər </h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Xəbər əlavə olunması <?php if ($_GET['status'] == 'ok') { ?>
                <span style="color: green; padding-left:15px;">Dəyişikliklər qeyd olundu...</span>
              <?php } else if ($_GET['status'] == 'no') { ?>
                <span style="color: red; padding-left:15px;">Dəyişikliklər qeyd olunmadı...</span>
              <?php } ?>
            </h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="x_content">
              <form id="demo-form2" accept-charset="UTF-8" action="../netting/executer.php" method="POST" data-parsley-validate class="form-horizontal form-label-left"                                     enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xəbər başlığı
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="news_title" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xəbər alt başlığı<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="news_subtitle" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Text <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea class="ckeditor" id="editor" name="news_text"  ></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xəbər şəkil<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name" name="news_image" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xəbər yazarı<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="news_author" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" id="first-name" name="news_date" class="form-control col-md-7 col-xs-12">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xəbər tagları<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="news_tag" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Xəbər kommentləri
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last-name" name="news_comment" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Əsas səhifədə göstərilsin<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="heard" class="form-control " name="news_show">
                      <option value="1">Bəli</option>
                      <option value="0">Xeyr</option>
                    </select>
                  </div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="newsadd" class="btn btn-success">Add</button>
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