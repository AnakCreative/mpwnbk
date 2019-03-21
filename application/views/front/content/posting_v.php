<?php $uri1 = $this->uri->segment(1);?>

<section id="blog" class="section">

		<div class="container">
				<h1 class="section-title"><?=$title;?></h1>

				<div class="row block">

					<?php
		        if (!empty($posting)) {
		        $no = 0;
		        foreach($posting as $row){?>

						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-4">
								<div class="blog-item-wrapper">
										<div class="blog-item-img">
												<img src="<?=$row->image;?>" alt="<?=$row->title;?>">
										</div>
										<div class="blog-item-text">
												<h3 class="small-title"><?=$row->title;?></h3>
												<p>
														<?=$row->text;?>
												</p>
												<div class="blog-one-footer">
														<span class="date"><?=$row->date;?></span>
														<a href="<?=$row->detail;?>">Read More</a>
												</div>
										</div>
								</div>
						</div>

		      <?php
		        }
		      }?>

					<?php if (!empty($posting) && $offset < $total_row) { ?>
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
