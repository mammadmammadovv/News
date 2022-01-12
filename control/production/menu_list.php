<?php include 'header.php';

$menuquery = $db->prepare("SELECT * FROM menus WHERE menu_id=?");
$menuquery->execute(array(0));
$menupull = $menuquery->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Menyu idarə paneli</h3>
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
          <div class="x_title ">
            <h2>Menyular <?php if ($_GET['status'] == 'ok') { ?>
                <span style="color: green; padding-left:15px;">Menu əlavə olundu...</span>
              <?php } else if ($_GET['status'] == 'no') { ?>
                <span style="color: red; padding-left:15px;">Menu əlavə olunmadı. Xəta baş verdi...</span>
              <?php } else if ($_GET['update'] == 'ok') { ?>
                <span style="color: green; padding-left:15px;">Menu dəyişdirildi...</span>
              <?php } else if ($_GET['update'] == 'no') { ?>
                <span style="color: red; padding-left:15px;">Menu dəyişdirilmədi. Xəta baş verdi...</span>
              <?php } elseif ($_GET['delete_status']=='ok') {?>
              <span style="color: green; padding-left:15px;">Menu silindi...</span>
             <?php }elseif ($_GET['delete_status']=='no') {?>
              <span style="color: red; padding-left:15px;">Menu silinmədi...</span>
             <?php }?></h2>
            <a href="menu_add.php" style="position: absolute; right:0px; top:7px;" class="btn btn-success "><i class="fa fa-plus"></i> Menyu əlavə et</a>
            <div class="clearfix"></div>
          </div>
            <div class="x_content">


              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                     
                      <th class="column-title">Menyu id </th>
                      <th class="column-title">Menyu ad </th>
                      <th class="column-title">Menyu link </th>
                      <th class="column-title">Menyu sıra </th>
                      <th class="column-title text-center">Actions </th>
                     
                      
                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php 
                    $menuquery = $db->prepare("SELECT * FROM menus where menu_up=:menu_up");
                    $menuquery ->execute(array('menu_up'=>0));

                    while ($menupull = $menuquery ->fetch(PDO::FETCH_ASSOC)) {
                      $menu_id = $menupull['menu_id']?>
                    <tr class="even pointer">
                      
                   
                      <td class=" "><?php echo $menupull['menu_id'] ?></td>
                      <td class=" "><?php echo $menupull['menu_name'] ?></td>
                      <td class=" "><?php echo $menupull['menu_url'] ?></td>
                      <td class=" "><?php echo $menupull['menu_row'] ?></td>
                      <td class=" text-center"><a href="menu_edit.php?menu_id=<?php echo $menupull['menu_id'] ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Dəyiş</button></a>
                      <a href="menu_list.php?menudelete=ok&menu_id=<?php echo $menupull['menu_id'] ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Sil</button></a></td>
                   

                      
                      
                    </tr>
                    <?php  
                      $submenuquery = $db->prepare("SELECT * FROM menus WHERE menu_up=:menu_id ORDER BY menu_row ASC");
                      $submenuquery->execute(array('menu_id'=>$menu_id));
                      while ( $submenupull = $submenuquery->fetch(PDO::FETCH_ASSOC)) {
                     
                      ?>

                    <tr class="even pointer">
                      
                   
                      <td class=" "><?php echo $submenupull['menu_id'] ?></td>
                      <td class=" ">--- &nbsp;<?php echo $submenupull['menu_name'] ?></td>
                      <td class=" "><?php echo $submenupull['menu_url'] ?></td>
                      <td class=" "><?php echo $submenupull['menu_row'] ?></td>
                      <td class=" text-center"><a href="menu_edit.php?menu_id=<?php echo $submenupull['menu_id'] ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Dəyiş</button></a>
                      <a href="menu_list.php?menudelete=ok&menu_id=<?php echo $submenupull['menu_id'] ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Sil</button></a></td>
                   

                      
                      
                    </tr>
                    <?php } }?>
                   
                   
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