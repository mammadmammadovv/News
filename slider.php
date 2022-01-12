<div class="slider-container rev_slider_wrapper" style="height: 650px;">
					<div id="revolutionSlider" class="slider rev_slider manual" data-version="5.4.7">
						<ul>
							<?php
							$sliderquery= $db->prepare("SELECT * FROM sliders WHERE slider_show = '1' ORDER BY slider_id DESC");
							$sliderquery ->execute();

							while ($sliderpull = $sliderquery -> fetch(PDO::FETCH_ASSOC)) {?>
								<li data-transition="fade" data-title="Advocate Team" data-thumb="<?php echo $sliderpull['slider_image'] ?>">

								<img src="<?php echo $sliderpull['slider_image'] ?>"  
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat"
									class="rev-slidebg">

								

								<div style="height: 75px;" class="tp-caption main-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="-45"
									data-start="1500"
									data-whitespace="nowrap"						 
									data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									style="z-index: 5"
									data-mask_in="x:0px;y:0px;"><?php echo $sliderpull['slider_mainlabel'] ?></div>

								<div class="tp-caption bottom-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="5"
									data-start="2000"
									style="z-index: 5"
									data-transform_in="y:[100%];opacity:0;s:500;"><?php echo $sliderpull['slider_bottomlabel'] ?></div>

								
								
							</li>
							<?php } ?>
							
						</ul>
					</div>
				</div>