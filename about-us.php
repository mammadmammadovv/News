<?php include 'header.php';

$aboutusquery = $db->prepare("SELECT * FROM aboutus WHERE aboutus_id=?");
$aboutusquery->execute(array(0));
$aboutuspull = $aboutusquery->fetch(PDO::FETCH_ASSOC);
?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-5">
			<div class="col-lg-7">
				<h1 class="mb-0"><?php echo $aboutuspull['aboutus_title'] ?></h1>
				<div class="divider divider-primary divider-small mb-4">
					<hr class="mr-auto">
				</div>
				<?php echo $aboutuspull['aboutus_text'] ?>

			</div>
			<div class="col-lg-4 col-lg-offset-1">

				<h4 class="mt-5 mb-0">Our Commitment</h4>
				<div class="divider divider-primary divider-small mb-4">
					<hr class="mr-auto">
				</div>

				<div class="embed-responsive embed-responsive-16by9 mb-4">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $aboutuspull['aboutus_video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<h4 class="mt-5">Our Vision</h4>

				<div class="divider divider-primary divider-small mb-4">
					<hr class="mr-auto">
				</div>
				<blockquote class="blockquote-secondary">
					<p class="text-4"><?php echo $aboutuspull['aboutus_vision'] ?></p>
					<footer> <cite> - Our Vision</cite></footer>
				</blockquote>

				<h4 class="mt-5">Our Mision</h4>

				<div class="divider divider-primary divider-small mb-4">
					<hr class="mr-auto">
				</div>
				<blockquote class="blockquote-secondary">
					<p class="text-4"><?php echo $aboutuspull['aboutus_vision'] ?></p>
					<footer> <cite> - Our Mision</cite></footer>
				</blockquote>


				<!-- <ul class="list list-unstyled list-primary list-borders">
					<li class="pt-2 pb-2"><strong class="text-color-primary text-4">2017 - </strong> Moves its headquarters to a new building</li>
					<li class="pt-2 pb-2"><strong class="text-color-primary text-4">2014 - </strong> Porto creates its new brand</li>
					<li class="pt-2 pb-2"><strong class="text-color-primary text-4">2006 - </strong> Porto Office opens it doors in London</li>
					<li class="pt-2 pb-2"><strong class="text-color-primary text-4">2003 - </strong> Inauguration of the new office</li>
					<li class="pt-2 pb-2"><strong class="text-color-primary text-4">2001 - </strong> Porto goes into business</li>
				</ul> -->

			</div>
		</div>
	</div>
</div>


<?php include 'footer.php' ?>