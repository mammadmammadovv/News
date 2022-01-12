<?php 
include '../netting/connection.php';
session_start();

function LoginControl(){
    include 'netting/connection.php';
    $admin_username = $_POST['admin_username'];

    $adminquery = mysqli_query($connect, "SELECT * FROM admin_users WHERE admin_username = $admin_username");
    $adminpull = mysqli_num_rows($adminquery);

    if ($adminpull == 0) {
        header('Location: login.php');
    }
};


function seo($s) {
	$tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ə','ü','Ü','ö','Ö','Ç','ç','(',')','/',' ',',','?',':');
	$eng = array('s','s','i','i','i','g','g','e','u','u','o','o','c','c','','','-','-','','','');
	$s = str_replace($tr,$eng,$s);
	$s = strtolower($s);
	$s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
	$s = preg_replace('/\s+/', '-', $s);
	$s = preg_replace('|-+|', '-', $s);
	$s = preg_replace('/#/', '', $s);
	$s = str_replace('.', '', $s);
	$s = trim($s, '-');
	return $s;
}
?>