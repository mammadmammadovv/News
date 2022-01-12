<?php include 'header.php';
 

if (isset($_POST['search'])) {
  $searched_s_name = $_POST['searched_s_name'];
  $newsquery = $db->prepare("SELECT * FROM news WHERE news_title LIKE '%$searched_s_name%' ORDER BY news_date DESC");
                  $newsquery->execute();
                  $count = $newsquery->rowCount();
}else {
  $newsquery = $db->prepare("SELECT * FROM news ORDER BY news_date DESC");
                  $newsquery->execute();
                  $count = $newsquery->rowCount();
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
            <h2>Xəbərlər  <?php  if ($_GET['status'] == 'ok') { ?>
                <span style="color: green; padding-left:15px;">Xəbər əlavə olundu...</span>
              <?php } else if ($_GET['status'] == 'no') { ?>
                <span style="color: red; padding-left:15px;">Xəbər əlavə olunmadı. Xəta baş verdi...</span>
              <?php } elseif ($_GET['delete_status']=='ok') {?>
              <span style="color: green; padding-left:15px;">Xəbər silindi...</span>
             <?php }elseif ($_GET['delete_status']=='no') {?>
              <span style="color: red; padding-left:15px;">Xəbər silinmədi...</span>
             <?php }?> <?php if ($count>0) {?>
              <span style="color:green;margin-left:5px;font-size: 16px;"><?php echo $count ." nəticə tapıldı..."; ?></span>
            <?php }else {?>
              <span style="color:red;margin-left:5px;font-size: 16px;"><?php echo $count ." nəticə tapıldı..."; ?></span>
           <?php } ?>  
            </h2>
            <a href="news_add.php" style="position: absolute; right:0px; top:7px;" class="btn btn-success "><i class="fa fa-plus"></i> Xəbər əlavə et</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Xəbər şəkil </th>
                    <th class="column-title text-center">Xəbər başlıq </th>
                    <th class="column-title text-center">Xəbər yazarı</th>
                    <th class="column-title text-center">Xəbər tarixi</th>
                    <th class="column-title text-center">Actions </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  while ($newspull = $newsquery->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr class="even pointer">
                      <td class=" "><img width="120px;" height="150px;" src="../../<?php echo $newspull['news_image'] ?>" alt=""></td>
                      <td class=" text-center "><?php echo $newspull['news_title'] ?></td>
                      <td class=" text-center "><?php echo $newspull['news_author'] ?></td>
                      <td class="  text-center"><?php $date = strtotime($newspull['news_date']); echo date('d M Y',$date)  ?></td>
                      <td class=" text-center"><a href="news_edit.php?news_id=<?php echo $newspull['news_id'] ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</button></a>
                        <a href="../netting/executer.php?newsdelete=ok&news_id=<?php echo $newspull['news_id'] ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button></a>
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