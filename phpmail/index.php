<?php 
ob_start();
session_start();


//1 hafta falan bu mail açık denemelerinizi yapın...
//Eğitimleri sonra izlerseniz kendi hostunuzda deneyin
//localde çalışması için çok çok şey lazım localle uğraşmayın....
$smtpuser="";
$smtphost="";
$smtpport="";
$smtppass="";



if (isset($_POST['contactMailSend'])) {
	
	
	$adsoyad = htmlspecialchars(trim($_POST['name'])); 
	$subject = htmlspecialchars(trim($_POST['subject'])); 
	$email = htmlspecialchars(trim($_POST['mail'])); 
	$message = htmlspecialchars(trim($_POST['message'])); 


	include 'class.phpmailer.php';
	$epostal=$smtpuser;
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = false;
	$mail->Host = $smtphost;
	$mail->Port = $smtpport;
	$mail->SMTPSecure = 'tls';
	$mail->Username = $smtpuser;
	$mail->Password = $smtppass;
	$mail->SetFrom($mail->Username, $adsoyad);
	$mail->AddAddress($epostal, $adsoyad);
	$mail->AddAddress($email, $adsoyad);
	$mail->CharSet = 'UTF-8';
	$mail->Subject = 'İletişim Formu';
	$content = '
	<b>Websitenizden gelen iletişim maili</b><br>
	<table align="left" class="tg" style="undefined;table-layout: fixed; width: 535px">

		<tr>
			<td class="tg-031e">Ad Soyad</td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">'.$adsoyad.'</td>
		</tr>
		<tr>
			<td class="tg-031e">E-Posta</td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">'.$email.'</td>
		</tr>
		<tr>
			<td class="tg-031e">subject</td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">'.$subject.'</td>
		</tr>
		<tr>
			<td class="tg-031e">message</td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">'.$message.'</td>
		</tr>
	</table>';




	$mail->MsgHTML($content);
	if($mail->Send()) {

		header("Location:../index.php?iletisimgonder=ok");
	} 
	else {
			// bir sorun var, sorunu ekrana bastıralım
		header("Location:../index.php?iletisimgonder=no");
	}



}

exit;

?>

