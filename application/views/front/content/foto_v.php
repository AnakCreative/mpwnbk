<section class="portfolio-3-column-section section-padding" id="foto">

		<div class="container">
				<h1 class="section-title" style="visibility: visible;">FOTO</h1>
				<div class="row">

						<div class="row block">

							<?php
								if (!empty($foto)) {
								$no = 0;
								foreach($foto as $row){?>

								<a class="list-foto col-md-3 col-lg-3 col-sm-3 col-xs-12 mix" href="<?=$row->image;?>">
										<div class="portfolio-item">
												<div class="portfolio-img">
														<img src="<?=$row->image;?>" alt="<?=$row->title;?>">
												</div>
												<div class="portfoli-content">
														<div class="sup-desc-wrap">
																<div class="sup-desc-inner">
																		<div class="sup-meta-wrap">
																				<h4 class="sup-title"><?=$row->title;?></h4>
																				<p class="sup-description"><?=$row->text;?></p>
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
