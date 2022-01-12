<?php 
ob_start();
session_start();
include 'connection.php';

if (isset($_POST['generalsettingupdate'])) {
    $general_setting_update = $db -> prepare("UPDATE settings SET 
    setting_title=:title,
    setting_subtitle=:subtitle,
    setting_phone=:phone,
    setting_mail=:mail,
    setting_adress=:adress,
    setting_working_hours=:working_hours
    WHERE setting_id = 0");
    $update = $general_setting_update -> execute(array('title' => $_POST['setting_title'], 'subtitle' => $_POST['setting_subtitle'], 'phone' => $_POST['setting_phone'], 
    'mail' => $_POST['setting_mail'],  'adress' => $_POST['setting_adress'], 'working_hours'=>$_POST['setting_working_hours']));

    if ($update) {
        Header("Location: ../production/general-setting.php?status=ok");
    }else{
        Header("Location: ../production/general-setting.php?status=no");
    }
    
}

if (isset($_POST['linksettingupdate'])) {
   $link_setting_update = $db ->prepare("UPDATE settings SET 
   setting_recapctha=:recapctha,
   setting_goooglemap=:googlemap,
   setting_analystic=:analystic,
   setting_facebook=:facebook,
   setting_twitter=:twitter,
   setting_youtube=:youtube,
   setting_google=:google
   WHERE setting_id=0");
   $update = $link_setting_update ->execute(array('recapctha' => $_POST['setting_recapctha'], 'googlemap' => $_POST['setting_goooglemap'], 'analystic' => $_POST['setting_analystic'],
    'facebook' => $_POST['setting_facebook'], 'twitter' => $_POST['setting_twitter'], 'youtube' => $_POST['setting_youtube'], 'google' => $_POST['setting_google'] ));

    if ($update) {
        Header("Location: ../production/link-setting.php?status=ok");
    }else {
        Header("Location: ../production/link-setting.php?status=no");
    }
}

if (isset($_POST['smtpsettingupdate'])) {
    $smtp_setting_update = $db -> prepare("UPDATE settings SET
    setting_smtphost=:smtphost,
    setting_smtpuser=:smtpuser,
    setting_smtppassword=:smtppassword,
    setting_smtpport=:smtpport
    WHERE setting_id=0");
    $update = $smtp_setting_update ->execute(array('smtphost' => $_POST['setting_smtphost'], 'smtpuser' => $_POST['setting_smtpuser'],
    'smtppassword' => $_POST['setting_smtppassword'], 'smtpport' => $_POST['setting_smtpport']));

    if ($update) {
        header("Location: ../production/smtp-setting.php?status=ok");
    }else {
        header("Location: ../production/smtp-setting.php?status=no");
    }
}

if (isset($_POST['aboutusupdate'])) {
    $aboutus_update = $db ->prepare("UPDATE aboutus SET
    aboutus_title=:title,
    aboutus_text=:desc_text,
    aboutus_video=:video,
    aboutus_vision=:vision,
    aboutus_mision=:mision
    WHERE aboutus_id=0");
    $update= $aboutus_update ->execute(array('title'=>$_POST['aboutus_title'], 'desc_text'=>$_POST['aboutus_text_porto'], 'video'=>$_POST['aboutus_video'], 
    'vision'=>$_POST['aboutus_vision'], 'mision'=>$_POST['aboutus_mision']));

    if ($update) {
        header("Location: ../production/about-us.php?status=ok");
    }else {
        header("Location: ../production/about-us.php?status=no");
    }
}

if (isset($_POST['slideradd'])) {

    $uploads_dir = "../../new_image/sliders";
    @$tmp_name = $_FILES['slider_image']["tmp_name"];
    @$name = $_FILES['slider_image']['name'];

    $unique1 = rand(1, 1000);
    $unique2 = rand(1, 1000);
    $unique3 = rand(1, 1000);
    $unique4 = rand(1, 1000);

    $unique_name = $unique1 . $unique2 . $unique3 . $unique4;

    $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");

    $slider_add = $db->prepare("INSERT INTO sliders SET
    slider_toplabel=:toplabel,
    slider_mainlabel=:mainlabel,
    slider_bottomlabel=:bottomlabel,
    slider_button=:s_button,
    slider_image=:s_image,
    slider_link=:s_link,
    slider_show=:s_show");

    $s_insert = $slider_add ->execute(array('toplabel' => $_POST['slider_toplabel'], 'mainlabel' => $_POST['slider_mainlabel'],
     'bottomlabel' => $_POST['slider_bottomlabel'], 's_button' => $_POST['slider_button'],
    's_image' => $img_path, 's_link' => $_POST['slider_link'], 's_show' => $_POST['slider_show'] ));

    if ($s_insert) {
        header("Location: ../production/sliders.php?status=ok");
    }else {
        header("Location: ../production/sliders.php?status=no");
    }
}

if (isset($_POST['menuadd'])) {
    if(!empty($_POST['menu_up'])) {
        $selected = $_POST['menu_up'];
        $menu_add = $db->prepare("INSERT INTO menus SET
    menu_name=:m_name,
    menu_url=:m_url,
    menu_row=:m_row,
    menu_up=:m_up");

    $insert = $menu_add ->execute(array('m_name' => $_POST['menu_name'], 'm_url' => $_POST['menu_url'],
     'm_row' => $_POST['menu_row'], 'm_up'=> $selected ));

    if ($insert) {
        header("Location: ../production/menu_list.php?status=ok");
    }else {
        header("Location: ../production/menu_list.php?status=no");
    }
    }else {
        $menu_add = $db->prepare("INSERT INTO menus SET
    menu_name=:m_name,
    menu_url=:m_url,
    menu_row=:m_row");

    $insert = $menu_add ->execute(array('m_name' => $_POST['menu_name'], 'm_url' => $_POST['menu_url'],
     'm_row' => $_POST['menu_row']));

    if ($insert) {
        header("Location: ../production/menu_list.php?status=ok");
    }else {
        header("Location: ../production/menu_list.php?status=no");
    }
    }
    
}

if (isset($_POST['menuupdate'])) {
    $menu_id=$_POST['menu_id'];
    $menu_update = $db->prepare("UPDATE menus SET
    menu_name=:m_name,
    menu_url=:m_url,
    menu_row=:m_row
    WHERE menu_id=$menu_id");

    $save=$menu_update->execute(array('m_name'=>$_POST['menu_name'], 'm_url'=>$_POST['menu_url'], 'm_row'=>$_POST['menu_row']));

    if ($save) {
        header("Location: ../production/menu_list.php?update=ok");
    }else {
        header("Location: ../production/menu_list.php?update=no");
    }
}

if ($_GET['menudelete']=='ok') {
    $delete = $db ->prepare("DELETE FROM menus WHERE menu_id=:menu_id");
    $save = $delete->execute(array('menu_id'=>$_GET['menu_id']));

    
    if ($save) {
        header("Location: ../production/menu_list.php?delete_status=ok");
    }else {
        header("Location: ../production/menu_list.php?delete_status=no");
    }
}


if (isset($_POST['sliderupdate'])) {
    if ($_FILES['slider_image']['size']>0) {
        $slider_id = $_POST['slider_id'];
        $uploads_dir = "../../new_image/sliders";
        @$tmp_name = $_FILES['slider_image']["tmp_name"];
        @$name = $_FILES['slider_image']['name'];
        $unique1 = rand(1, 1000);
        $unique2 = rand(1, 1000);
        $unique3 = rand(1, 1000);
        $unique4 = rand(1, 1000);
        $unique_name = $unique1 . $unique2 . $unique3 . $unique4;
        $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");
    
        $slider_update = $db ->prepare("UPDATE sliders SET 
        slider_toplabel=:toplabel,
        slider_mainlabel=:mainlabel,
        slider_bottomlabel=:bottomlabel,
        slider_button=:s_button,
        slider_image=:s_image,
        slider_link=:s_link,
        slider_show=:s_show
        WHERE slider_id = $slider_id");
    
        $save = $slider_update ->execute(array('toplabel'=>$_POST['slider_toplabel'],'mainlabel'=>$_POST['slider_mainlabel'],'bottomlabel'=>$_POST['slider_bottomlabel'],
        's_button'=>$_POST['slider_button'], 's_image'=>$img_path, 's_link'=>$_POST['slider_link'], 's_show'=>$_POST['slider_show']));
    
        

        if ($save) {
            $imagedeletefolder = $_POST['slider_image'];
            unlink("../../$imagedeletefolder");
            header("Location: ../production/slider_edit.php?slider_id=$slider_id&status=ok");
        }else {
            header("Location: ../production/slider_edit.php?slider_id=$slider_id&status=no");
        }
    }else {
        $slider_id = $_POST['slider_id'];
        $slider_update = $db ->prepare("UPDATE sliders SET 
        slider_toplabel=:toplabel,
        slider_mainlabel=:mainlabel,
        slider_bottomlabel=:bottomlabel,
        slider_button=:s_button,
        slider_link=:s_link,
        slider_show=:s_show
        WHERE slider_id = $slider_id");
    
        $save = $slider_update ->execute(array('toplabel'=>$_POST['slider_toplabel'],'mainlabel'=>$_POST['slider_mainlabel'],'bottomlabel'=>$_POST['slider_bottomlabel'],
        's_button'=>$_POST['slider_button'], 's_link'=>$_POST['slider_link'], 's_show'=>$_POST['slider_show']));
    
        if ($save) {
            header("Location: ../production/slider_edit.php?slider_id=$slider_id&status=ok");
        }else {
            header("Location: ../production/slider_edit.php?slider_id=$slider_id&status=no");
        }
    }
   
}

if ($_GET['sliderdelete']=="ok") {

    $slider_delete = $db ->prepare("DELETE FROM sliders WHERE slider_id=:slider_id");

    $save= $slider_delete->execute(array('slider_id' => $_GET['slider_id']));

    if ($save) {
        header("Location: ../production/sliders.php?delete_status=ok");
    }else {
        header("Location: ../production/sliders.php?delete_status=no");
    }
}


if (isset($_POST['newsupdate'])) {
    if ($_FILES['news_image']['size']>0) {
    $news_id = $_POST['news_id'];
    $uploads_dir = "../../new_image/news";
    @$tmp_name = $_FILES['news_image']["tmp_name"];
    @$name = $_FILES['news_image']['name'];

    $unique1 = rand(1, 1000);
    $unique2 = rand(1, 1000);
    $unique3 = rand(1, 1000);
    $unique4 = rand(1, 1000);

    $unique_name = $unique1 . $unique2 . $unique3 . $unique4;

    $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");

    $news_update = $db->prepare("UPDATE news SET 
    news_title=:title,
    news_subtitle=:subtitle,
    news_text=:n_text,
    news_image=:n_image,
    news_author=:author,
    news_tag=:tag,
    news_comment=:comment,
    news_show=:show
    WHERE news_id=$news_id
    ");
    $save=$news_update->execute(array('title'=>$_POST['news_title'], 'subtitle'=>$_POST['news_subtitle'], 'n_text'=>$_POST['news_text'], 'n_image'=>$img_path,
    'author'=>$_POST['news_author'], 'tag'=>$_POST['news_tag'], 'comment'=>$_POST['news_comment'], 'show'=>$_POST['news_show']  ));

    if ($save) {
        header("Location: ../production/news_edit.php?news_id=$news_id&status=ok");
    }else {
        header("Location: ../production/news_edit.php?news_id=$news_id&status=ok");
    }
}else {
    $news_id = $_POST['news_id'];
    $news_update = $db->prepare("UPDATE news SET 
    news_title=:title,
    news_subtitle=:subtitle,
    news_text=:n_text,
    news_author=:author,
    news_tag=:tag,
    news_comment=:comment,
    news_show=:show
    WHERE news_id=$news_id
    ");
    $save=$news_update->execute(array('title'=>$_POST['news_title'], 'subtitle'=>$_POST['news_subtitle'], 'n_text'=>$_POST['news_text'], 
    'author'=>$_POST['news_author'],  'tag'=>$_POST['news_tag'], 'comment'=>$_POST['news_comment'], 'show'=>$_POST['news_show']  ));

    if ($save) {
        header("Location: ../production/news_edit.php?news_id=$news_id&status=ok");
    }else {
        header("Location: ../production/news_edit.php?news_id=$news_id&status=ok");
    }
}


}

if (isset($_POST['newsadd'])) {
    $date = date('Y-m-d H:i:s ');
    $uploads_dir = "../../new_image/news";
    @$tmp_name = $_FILES['news_image']["tmp_name"];
    @$name = $_FILES['news_image']['name'];

    $unique1 = rand(1, 1000);
    $unique2 = rand(1, 1000);
    $unique3 = rand(1, 1000);
    $unique4 = rand(1, 1000);

    $unique_name = $unique1 . $unique2 . $unique3 . $unique4;

    $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");

    $news_add = $db->prepare("INSERT INTO news SET
    news_title=:title,
    news_subtitle=:subtitle,
    news_text=:n_text,
    news_image=:n_image,
    news_author=:author,
    news_date=:n_date,
    news_tag=:tag,
    news_comment=:comment,
    news_show=:show");

    $n_insert = $news_add ->execute(array('title'=>$_POST['news_title'], 'subtitle'=>$_POST['news_subtitle'], 'n_text'=>$_POST['news_text'], 'n_image'=>$img_path,
    'author'=>$_POST['news_author'], 'n_date'=>$date, 'tag'=>$_POST['news_tag'], 'comment'=>$_POST['news_comment'], 'show'=>$_POST['news_show']));

    if ($n_insert) {
        header("Location: ../production/news.php?status=ok");
    }else {
        header("Location: ../production/news.php?status=no");
    }
}


if ($_GET['newsdelete']=="ok") {
    

    $news_delete = $db ->prepare("DELETE FROM news WHERE news_id=:news_id");

    $save= $news_delete->execute(array('news_id' => $_GET['news_id']));

    if ($save) {
        header("Location: ../production/news.php?delete_status=ok");
    }else {
        header("Location: ../production/news.php?delete_status=no");
    }
}


if (isset($_POST['sendComment'])) {
    $news_id = $_POST['news_id'];
    $date = date('Y-m-d H:i:s ');
    

    $add_comment = $db->prepare("INSERT INTO comments SET
    comment_name_surname=:name_surname,
    comment_email=:c_mail,
    comment_text=:c_text,
    comment_date=:c_date,
    comment_show=:c_show,
    news_id=:news_id,
    parent_id=:p_id
    ");

    $c_insert = $add_comment->execute(array(
    'name_surname'=>$_POST['comment_name_surname'],
    'c_mail'=>$_POST['comment_email'],
    'c_text'=>$_POST['comment_text'],
    'c_date'=>$date,
    'c_show'=>1,
    'news_id'=>$_POST['news_id'],
    'p_id'=>$_POST['main_comment_id']));

    if ($c_insert) {
        header("Location: ../../news_detail.php?news_id=$news_id&status=ok");
    }else {
        header("Location: ../../news_detail.php?news_id=$news_id&status=no");
    }
}


if (isset($_POST['headerlogoupdate'])) {
        $uploads_dir = "../../new_image/settings";
        @$tmp_name = $_FILES['setting_logo_header']["tmp_name"];
        @$name = $_FILES['setting_logo_header']['name'];
        $unique1 = rand(1, 1000);
        $unique2 = rand(1, 1000);
        $unique3 = rand(1, 1000);
        $unique4 = rand(1, 1000);
        $unique_name = $unique1 . $unique2 . $unique3 . $unique4;
        $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");
    
        $update = $db ->prepare("UPDATE settings SET 
        setting_logo_header =:logo
        WHERE setting_id = 0");
    
        $save = $update ->execute(array('logo'=>$img_path));

        if ($save) {
            $imagedeletefolder = $_POST['header_old_logo'];
            unlink("../../$imagedeletefolder");
            header("Location: ../production/general-setting.php?status=ok");
        }else {
            header("Location: ../production/general-setting.php?status=no");
        }
   
}


if (isset($_POST['footerlogoupdate'])) {
    $uploads_dir = "../../new_image/settings";
    @$tmp_name = $_FILES['setting_logo_footer']["tmp_name"];
    @$name = $_FILES['setting_logo_footer']['name'];
    $unique1 = rand(1, 1000);
    $unique2 = rand(1, 1000);
    $unique3 = rand(1, 1000);
    $unique4 = rand(1, 1000);
    $unique_name = $unique1 . $unique2 . $unique3 . $unique4;
    $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");

    $update = $db ->prepare("UPDATE settings SET 
    setting_logo_footer =:logo
    WHERE setting_id = 0");

    $save = $update ->execute(array('logo'=>$img_path));

    if ($save) {
        $imagedeletefolder = $_POST['footer_old_logo'];
        unlink("../../$imagedeletefolder");
        header("Location: ../production/general-setting.php?status=ok");
    }else {
        header("Location: ../production/general-setting.php?status=no");
    }

}



if (isset($_POST['loggin'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = md5($_POST['admin_password']) ;

    if ($admin_username && $admin_password) {
        $query = $db->prepare("SELECT * FROM admin_users WHERE admin_username=:a_username and admin_password=:a_password");
        $query ->execute(array(
            'a_username' => $admin_username,
            'a_password' => $admin_password
        ));
        $count = $query->rowCount();
        $save = $query->fetch(PDO::FETCH_ASSOC);

        if ($count>0) {
            $_SESSION['admin']=$admin_username;
            $_SESSION['admin_image']= $save['admin_image'];
            $_SESSION['admin_id'] = $save['admin_id'];
            $_SESSION['admin_show']=$save['admin_status'];

            header("Location: ../production/index.php");
        }else {
            header("Location: ../production/login.php?status=no");
        }

    }
}

if (isset($_POST['userupdate'])) {
    $admin_password = md5($_POST['admin_password']);
    
        $admin_id = $_POST['admin_id'];
        $admin_update = $db ->prepare("UPDATE admin_users SET 
        admin_username=:a_username,
        admin_password=:a_password,
        admin_status=:a_status
        WHERE admin_id = $admin_id");
        
    
        $save = $admin_update ->execute(array('a_username'=>$_POST['admin_username'],'a_password'=>$admin_password,
        'a_status'=>$_POST['admin_status']));
        
        if ($save) {
            header("Location: ../production/user_edit.php?admin_id=$admin_id&status=ok");
        }else {
            header("Location: ../production/user_edit.php?admin_id=$admin_id&status=no");
        }
   
}

if (isset($_POST['userlogoupdate'])) {
    $admin_id = $_POST['admin_id'];
    $uploads_dir = "../../new_image/admins";
    @$tmp_name = $_FILES['admin_image']["tmp_name"];
    @$name = $_FILES['admin_image']['name'];
    $unique1 = rand(1, 1000);
    $unique2 = rand(1, 1000);
    $unique3 = rand(1, 1000);
    $unique4 = rand(1, 1000);
    $unique_name = $unique1 . $unique2 . $unique3 . $unique4;
    $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");

    $update = $db ->prepare("UPDATE admin_users SET 
    admin_image =:a_image
    WHERE admin_id = $admin_id");

    $save = $update ->execute(array('a_image'=>$img_path));

    if ($save) {
        $imagedeletefolder = $_POST['old_image'];
        unlink("../../new_image/admins/$imagedeletefolder");
        header("Location: ../production/user_edit.php?admin_id=$admin_id&status=ok");
    }else {
        header("Location: ../production/user_edit.php?admin_id=$admin_id&status=no");
    }

}

?>