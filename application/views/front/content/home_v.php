<!-- Start Youtube Video Area -->
<div id="home" class="welcome-youtube-video-area">
		<a class="youtube-video-play" data-property="{videoURL:'<?=!empty($video) ? $video->url : '';?>',containment:'#home', showControls:false, autoPlay:true, zoom:0, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></a>
</div>
<!--/ Youtube Video Area -->

<section id="nav-second">
		<div class="container">
			<div class="row no-gutters">
					<a href="<?=base_url('konsentrasi/seni');?>" class="col-12 col-md-4">
						<div class="nav-list">
								<h2>SENI</h2>
						</div>
					</a>
					<a href="<?=base_url('konsentrasi/art');?>" class="col-12 col-md-4">
						<div class="nav-list">
								<h2>ART / CRAFT</h2>
						</div>
					</a>
					<a href="<?=base_url('konsentrasi/desain');?>" class="col-12 col-md-4">
						<div class="nav-list">
								<h2>DESAIN</h2>
						</div>
					</a>
			</div>
		</div>
</section>

<section class="section figures" style="background:url(<?=!empty($direksi) ? base_url('image/profile/').$direksi->picture : '';?>) no-repeat; background-size:100%; background-position: cover;">
		<div class="container">
			<img class="d-block d-md-none img-fluid" src="<?=!empty($direksi) ? base_url('image/profile/').$direksi->picture : '';?>"/>
				<div class="figures-quote pull-left">
					<h4><?=!empty($direksi) ? $direksi->name : '.....';?></h4>
 					<p><?=!empty($direksi) ? $direksi->description : '.....';?></p>
					<a class="figures-view" href="#" data-video-id="<?=!empty($direksi) ? $direksi->url : '';?>"><i class="fa fa-play-circle-o fa-3x"></i></a>
			  </div>
		</div>
</section>

<section id="news" class="section event">
		<div class="container">
				<h1 class="section-title">NEWS</h1>

					<?php
		        if (!empty($news)) {
		        $no = 0;
		        foreach($news as $row){?>

						<div class="row">
							<div class="card card-show col-12 mb-3">
					      <div class="row">
					        <div class="col-12 col-md-8">
					          <div class="image-group no-effect">
					            <img class="img-fluid" src="<?=$row->image;?>">
					          </div>
					        </div>
					        <div class="card-block list col-12 col-md-4">
										<h4 class="news-post-title"><?=$row->title;?></h4>
										<p><?=$row->text;?></p>
										<div class="news-one-footer">
												<span class="date"><?=$row->date;?></span>
												<a href="<?=$row->detail;?>">Read More</a>
										</div>
									</div>
					      </div>
					    </div>
					  </div>

		      <?php
		        }
		      }?>

		</div>
</section>

<section id="blog" class="section event" style="padding-top:0;">
		<div class="container">
				<h1 class="section-title">ACARA</h1>
				<div class="row">

					<?php
		        if (!empty($event)) {
		        $no = 0;
		        foreach($event as $row){?>

						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="blog-item-wrapper">
										<div class="blog-item-img">
												<a href="#">
														<img src="<?=$row->image;?>" alt="">
												</a>
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

				</div>
		</div>
</section>

<section id="advertise" class="section bg-grey advertise">
		<div class="container">
				<div class="row">

				<?php
	        if (!empty($advertise)) {
	        $no = 0;
	        foreach($advertise->result() as $row){ ?>

						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<img class="img-fluid" src="<?=base_url('image/advertise/');?><?=($row->adv_img != '') ? $row->adv_img : 'space_available.jpg';?>" alt="<?=$row->title;?>">
						</div>

		      <?php
							$no++;
		        }
						if($no < 3) {
							for($i=$no; $i<=3; $i++){?>

							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<img class="img-fluid" src="<?=base_url('image/advertise/space_available.jpg');?>">
							</div>

						<?php }
						}
		      }?>

				</div>
		</div>
</section>
