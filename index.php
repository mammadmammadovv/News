<?php include 'header.php' ;
	$aboutquery = $db->prepare("SELECT * FROM aboutus WHERE aboutus_id=?");
	$aboutquery -> execute(array(0));
	$aboutpull = $aboutquery->fetch(PDO::FETCH_ASSOC);

?>



<?php  ?>
<div role="main" class="main">
				<?php include 'slider.php' ?>
				<section class="section section-default section-no-border mt-0">
					<div class="container pt-3 pb-4">
						<div class="row justify-content-around">
							<div class="col-lg-7 mb-4 mb-lg-0">
								<h2 class="mb-0"><?php echo $aboutpull['aboutus_title'] ?></h2>
								<div class="divider divider-primary divider-small mb-4">
									<hr class="mr-auto">
								</div>
								<p class="mt-4"><?php echo substr($aboutpull['aboutus_text'],0,550).'...' ?></p>

								<a class="mt-3" href="about-us.php">Daha çox    <i class="fas fa-long-arrow-alt-right"></i></a>
							</div>


							<?php  $count= rand(1,10); 
							
							if ($count>5) {?>
								<div class="col-lg-4">
								<h4 class="mb-0">Bizim missiyamız</h4>
								<div class="divider divider-primary divider-small mb-4">
									<hr class="mr-auto">
								</div>
								<p class="mt-4 "><?php echo $aboutpull['aboutus_mision'] ?></p>
							</div>
							<?php }else {?>
								<div class="col-lg-4">
								<h4 class="mb-0">Bizim baxışımız</h4>
								<div class="divider divider-primary divider-small mb-4">
									<hr class="mr-auto">
								</div>
								<p class="mt-4 "><?php echo $aboutpull['aboutus_vision'] ?></p>
							</div>
							<?php }?>
							
						</div>
					</div>
				</section>
				

				<div class="container-fluid">
					

					<div class="container">
						
						
					</div>

				</div>
				
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h2 class="mt-4 mb-0">Son xəbərlər</h2>
							<div class="divider divider-primary divider-small divider-small-center mb-4">
								<hr>
							</div>
						</div>
					</div>
					<div class="row">
						<?php 
						
						$newsquery = $db->prepare("SELECT * FROM news WHERE news_show='1' ORDER BY news_date DESC limit 2");
						$newsquery->execute();
						while ($newspull = $newsquery->fetch(PDO::FETCH_ASSOC)) {?>
							<div class="col-lg-6">
								
								<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mb-5">
									<span class="thumb-info-side-image-wrapper p-0 d-none d-sm-block">
										<a title="" href="news_detail.php?news_id=<?php echo $newspull['news_id'] ?>">
											<img src="<?php echo $newspull['news_image'] ?>" class="img-fluid" alt="" style="width: 195px; height:235px">
										</a>
									</span>
									<span class="thumb-info-caption">
										<span class="thumb-info-caption-text">
											<h4 class="mb-3 mt-1"><a title="" class="text-dark" href="news_detail.php?news_id=<?php echo $newspull['news_id'] ?>"><?php echo substr( $newspull['news_title'],0,100).'...' ?></a></h4>
											<span class="post-meta">
												<span><?php $date = strtotime($newspull['news_date']);
                                                    echo date('d M Y ', $date) ?>  | <a href="#"><?php echo $newspull['news_author'] ?></a></span>
											</span>
											<p class="text-3"><?php echo substr( $newspull['news_subtitle'],0,50).'...' ?></p>
											<a class="mt-3" href="news_detail.php?news_id=<?php echo $newspull['news_id'] ?>">Daha çox <i class="fas fa-long-arrow-alt-right"></i></a>
										</span>
									</span>
								</span>
	
							</div>
						<?php } ?> 
						
						
					</div>
				</div>

			
			</div>

<?php include 'footer.php' ?>