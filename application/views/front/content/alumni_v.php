<section class="portfolio-3-column-section classic-blog-section section-padding" id="alumni">
		<div class="container">


			<div class="row">
				<div class="card card-show col-12 mb-3" style="padding:0;">
		      <div class="row">
		        <div class="col-12 col-md-3">
		          <div class="image-group no-effect">
		            <img class="img-fluid" src="<?=!empty($alumni) ? base_url('image/alumni/'.$alumni->img) : '';?>">
		          </div>
		        </div>
		        <div class="card-block list col-12 col-md-9">
							<h4 class="blog-post-title"><?=!empty($alumni) ? $alumni->firstname . ' ' . $alumni->lastname : '';?></h4>
							<?=!empty($alumni) ? $alumni->email : '';?><br>
							<?=!empty($alumni) ? $alumni->biography : '';?>
						</div>
		      </div>
		    </div>
		  </div>

				<div id="foto_alumni" style="margin-left: -15px;margin-right: -15px;">
						<div class="row no-gutters block">
							<?php
								if (!empty($foto)) {
								$no = 0;
								foreach($foto as $row){?>

								<a class="list-foto col-md-3 col-lg-3 col-sm-3 col-xs-12 mix marketing planning" href="<?=$row->image;?>">
										<div class="portfolio-item">
												<div class="portfolio-img">
														<img src="<?=$row->image;?>" alt="">
												</div>
												<div class="portfoli-content">
														<div class="sup-desc-wrap">
																<div class="sup-desc-inner">
																		<div class="sup-meta-wrap">
																				<h4 class="sup-title"><?=$row->title;?></h4>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</a>

							<?php
								}
							}?>
						</div>

						<?php if (!empty($foto) && $offset < $total_row) { ?>
						<div class="col-md-12 load-more">
								<div class="loadmore-button">
										<a href="#" data_offset="<?=$offset;?>" class="btn btn-common show">
												<i class="fa fa-arrows"></i> Show More <i class="fa fa-spinner fa-spin fa-fw spinner hide"></i>
										</a>
								</div>
						</div>
						<?php }?>
				</div>

		</div>
</section>
