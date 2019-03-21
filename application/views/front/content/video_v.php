<section class="portfolio-3-column-section section-padding" id="foto">

		<div class="container">
				<h1 class="section-title" style="visibility: visible;">Video</h1>
				<div class="row">

						<div class="row">

							<?php
			        if (!empty($newest)) {
			        foreach($newest as $row){ ?>
								<div class="video col-md-3 col-lg-3 col-sm-3 col-xs-12">
										<div class="portfolio-item">
												<div class="portfolio-img">
														<img src="<?=$row->thumb;?>" alt="<?=$row->title;?>">
												</div>
												<div class="portfoli-content">
														<div class="sup-desc-wrap">
																<div class="sup-desc-inner">
																		<div class="sup-meta-wrap">
																				<h4 class="sup-title"><?=$row->title;?></h4>
																				<p class="sup-description"><?=$row->date;?> | <i><?=$row->views;?> Views</i></p>
																				<a class="sup-title" href="#" data-video-id="<?=$row->id;?>"><i class="fa fa-play-circle-o fa-3x"></i></a>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
			          <?php }
			        } ?>

						</div>
				</div>
		</div>

</section>
