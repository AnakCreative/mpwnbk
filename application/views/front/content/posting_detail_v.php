
<section class="classic-blog-section section-padding">
		<div class="container">
				<div class="row">

						<div class="col-md-9">

								<article class="blog-post-wrapper bg-white">
										<section class="featured-wrapper">
												<img src="<?=!empty($detail) ? $detail->image : '';?>" alt="">
										</section>

										<section class="blog-post-content">
												<div>
														<h2 class="blog-post-title"><?=!empty($detail) ? $detail->title : '';?></h2>
												</div>
												<div class="blog-post clearfix">
														<?=!empty($detail) ? $detail->text : '';?>
												</div>
										</section>
								</article>
						</div>

						<div class="col-md-3">
								<div class="sidebar-area">

										<aside class="widget popular-post">
												<h2 class="widget-title">Acara Terbaru</h2>
												<ul>

													<?php
														if (!empty($lastevent)) {
														$no = 0;
														foreach($lastevent as $row){?>

														<li>
																<div class="media">
																		<div class="media-left">
																				<a href="<?=$row->detail;?>"><img class="img-responsive" src="<?=$row->image;?>" alt="<?=$row->title;?>"></a>
																		</div>
																		<div class="media-body">
																				<h4><a href="<?=$row->detail;?>"><?=$row->title;?></a></h4>
																				<span class="published-time"><i class="fa fa-calendar"></i><?=$row->date;?></span>
																		</div>
																</div>
														</li>

													<?php
														}
													}?>

												</ul>
										</aside>

										<aside class="widget popular-post">
												<h2 class="widget-title">Berita Terbaru</h2>
												<ul>

													<?php
														if (!empty($lastnews)) {
														$no = 0;
														foreach($lastnews as $row){?>

														<li>
																<div class="media">
																		<div class="media-left">
																				<a href="<?=$row->detail;?>"><img class="img-responsive" src="<?=$row->image;?>" alt="<?=$row->title;?>"></a>
																		</div>
																		<div class="media-body">
																				<h4><a href="<?=$row->detail;?>"><?=$row->title;?></a></h4>
																				<span class="published-time"><i class="fa fa-calendar"></i><?=$row->date;?></span>
																		</div>
																</div>
														</li>

													<?php
														}
													}?>

												</ul>
										</aside>

										<aside class="widget popular-post">
												<h2 class="widget-title">Artikel Terbaru</h2>
												<ul>

													<?php
														if (!empty($lastartikel)) {
														$no = 0;
														foreach($lastartikel as $row){?>

														<li>
																<div class="media">
																		<div class="media-left">
																				<a href="#"><img class="img-responsive" src="<?=$row->image;?>" alt="<?=$row->title;?>"></a>
																		</div>
																		<div class="media-body">
																				<h4><a href="#"><?=$row->title;?></a></h4>
																				<span class="published-time"><i class="fa fa-calendar"></i><?=$row->date;?></span>
																		</div>
																</div>
														</li>

													<?php
														}
													}?>

												</ul>
										</aside>

								</div>
						</div>

				</div>
		</div>
</section>
