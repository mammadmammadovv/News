<?php include 'header.php';

?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-5">
			<div class="col-lg-7">
				<h1 class="mb-0">Bizimlə əlaqə</h1>
				<div class="divider divider-primary divider-small mb-4">
					<hr class="mr-auto">
				</div>
				<p class="lead mb-5 mt-4">Bizimlə əlaqəyə keçmək üçün aşağıdakı formu doldurmağınız xahiş olunur.</p>

				<div class="alert alert-success d-none mt-4" id="contactSuccess">
					<strong>Success!</strong> Your message has been sent to us.
				</div>

				<div class="alert alert-danger d-none mt-4" id="contactError">
					<strong>Error!</strong> There was an error sending your message.
					<span class="text-1 mt-2 d-block" id="mailErrorMessage"></span>
				</div>

				<form id="contactForm" action="https://siteyukseltme.com/indir/demo/html/php/contact-form.php" method="POST">
					<div class="row">
						<div class="form-group col">
							<input type="text" placeholder="Adınız" value="" data-msg-required="Adınızı daxil edin" maxlength="100" class="form-control form-control-lg" name="name" id="name" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<input type="email" placeholder="E-mail ünvanınız" value="" data-msg-required="E-mail ünvanınızı daxil edin" data-msg-email="Düzgün e-mail ünvanı daxil edin" maxlength="100" class="form-control form-control-lg" name="email" id="email" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<input type="text" placeholder="Mövzu" value="" data-msg-required="Mövzunu daxil edin" maxlength="100" class="form-control form-control-lg" name="subject" id="subject" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<textarea maxlength="5000" placeholder="Mesaj" data-msg-required="Mesajınızı daxil edin" rows="5" class="form-control form-control-lg" name="message" id="message" required></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<input type="submit" name="contactMailSend" value="Göndər" class="btn btn-primary btn-lg mb-5" data-loading-text="Loading...">
						</div>
					</div>
				</form>

			</div>
			<div class="col-lg-4 col-lg-offset-1">

				<h4 class="mb-0">Ofisimiz</h4>
				<div class="divider divider-primary divider-small mb-4">
					<hr class="mr-auto">
				</div>

				<ul class="list list-icons list-icons-style-3 mt-4 mb-4">
					<li><i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> <?php echo $settingpull['setting_adress'] ?></li>
					<li><i class="fas fa-phone"></i> <strong>Phone:</strong> <?php echo $settingpull['setting_phone'] ?></li>
					<li><i class="far fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com"><?php echo $settingpull['setting_mail'] ?></a></li>
				</ul>

				<h4 class="pt-4 mb-0">İş vaxtları</h4>
				<div class="divider divider-primary divider-small mb-4">
					<hr class="mr-auto">
				</div>

				<ul class="list list-icons list-dark mt-4">
					<?php echo $settingpull['setting_working_hours'] ?>
				</ul>

			</div>
		</div>
	</div>

	<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
	<div id="map" class="google-map mt-5 mb-0"></div>
</div>

<?php include 'footer.php' ?>