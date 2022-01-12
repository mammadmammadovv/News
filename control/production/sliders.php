<?php include 'header.php';
 

if (isset($_POST['search'])) {
  $searched_s_name = $_POST['searched_s_name'];
  $sliderquery = $db->prepare("SELECT * FROM sliders WHERE slider_toplabel LIKE '%$searched_s_name%'");
                  $sliderquery->execute();
                  $count = $sliderquery->rowCount();
}else {
  $sliderquery = $db->prepare("SELECT * FROM sliders");
                  $sliderquery->execute();
                  $count = $sliderquery->rowCount();
}

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Plain Page</h3>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <form action="" method="POST">
          <div class="input-group">
            <input type="text" class="form-control" name="searched_s_name" placeholder="Slide axtar...">
            <span class="input-group-btn">
              <button class="btn btn-default" name="search" type="submit">Axtar!</button>
            </span>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title ">
            <h2>Sliders <?php if ($count>0) {?>
              <span style="color:green;margin-left:5px;font-size: 16px;"><?php echo $count ." nəticə tapıldı..."; ?></span>
            <?php }else {?>
              <span style="color:red;margin-left:5px;font-size: 16px;"><?php echo $count ." nəticə tapıldı..."; ?></span>
           <?php } ?>   <?php  if ($_GET['status'] == 'ok') { ?>
                <span style="color: green; padding-left:15px;">Slider əlavə olundu...</span>
              <?php } else if ($_GET['status'] == 'no') { ?>
                <span style="color: red; padding-left:15px;">Slider əlavə olunmadı. Xəta baş verdi...</span>
              <?php } elseif ($_GET['delete_status']=='ok') {?>
              <span style="color: green; padding-left:15px;">Slider silindi...</span>
             <?php }elseif ($_GET['delete_status']=='no') {?>
              <span style="color: red; padding-left:15px;">Slider silinmədi...</span>
             <?php }?>
            </h2>
            <a href="slider_add.php" style="position: absolute; right:0px; top:7px;" class="btn btn-success "><i class="fa fa-plus"></i> Add slider</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Slider şəkil </th>
                    <th class="column-title text-center">Slider üst başlıq </th>
                    <th class="column-title text-center">Slider button başlıq </th>
                    <th class="column-title text-center">Slider aktivlik </th>
                    <th class="column-title text-center">Actions </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  while ($sliderpull = $sliderquery->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr class="even pointer">
                      <td class=" "><img width="200px;" height="100px;" src="../../<?php echo $sliderpull['slider_image'] ?>" alt=""></td>
                      <td class=" text-center "><?php echo $sliderpull['slider_toplabel'] ?></td>
                      <td class=" text-center "><?php echo $sliderpull['slider_button'] ?></td>
                      <td class="  text-center"><?php if ($sliderpull['slider_show'] == 1) {
                                      echo "Bəli";
                                    } else {
                                      echo "Xeyr";
                                    } ?></td>
                      <td class=" text-center"><a href="slider_edit.php?slider_id=<?php echo $sliderpull['slider_id'] ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</button></a>
                        <a href="../netting/executer.php?sliderdelete=ok&slider_id=<?php echo $sliderpull['slider_id'] ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button></a>
                      </td>
                    </tr>
                  <?php }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<?php include 'footer.php' ?>