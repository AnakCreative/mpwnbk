<nav class="navbar navbar-expand-md scrolling-navbar nav-bg">
		<div class="container-fluid">
				<div class="navbar-header">
						<a class="navbar-brand" href="<?=base_url();?>">
								<?=!empty($logo) ? '<img src="'.base_url("image/logo/$logo->logo_picture").'" alt="'.$logo->logo_title.'">' : '';?>
								<div class="logo-text">
									<p class="title-brand"><?=!empty($logo) ? ucwords($logo->logo_title) : '';?></p>
									<p class="subtitle-brand d-none d-sm-block"><?=!empty($logo) ? strtoupper($logo->logo_subtitle) : '';?></p>
									<p class="subtitle-brand d-block d-sm-none" style="display:none;">WNBK</p>
								</div>
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
						</button>
				</div>
				<div class="collapse navbar-collapse" id="main-menu">
						<ul class="navbar-nav mr-auto w-100 justify-content-end">
								<li class="nav-item">
										<a class="nav-link <?=($title == 'Home') ? 'active' : '';?>" href="<?=base_url();?>">Home</a>
								</li>
								<li class="nav-item">
										<a class="nav-link <?=($page == 'about') ? 'active' : '';?>" href="<?=base_url('about');?>">About</a>
								</li>
								<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle <?=($page == 'angkatan') ? 'active' : '';?>" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Alumni</a>
										<ul class="dropdown-menu">
											<?php
								        if (!empty($angkatan->result())) {
								        foreach($angkatan->result() as $row){?>

												<a class="dropdown-item" href="<?=base_url('angkatan/'.$row->angkatan);?>">Angkatan <?=$row->angkatan;?></a>

											<?php
												}
											}?>
										</ul>
								</li>
								<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle <?=($page == 'info') ? 'active' : '';?>" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info</a>
										<ul class="dropdown-menu">
												<a class="dropdown-item" href="<?=base_url('info/artikel');?>">Artikel</a>
												<a class="dropdown-item" href="<?=base_url('info/news');?>">News</a>
												<div class="subdropdown">
														<a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kegiatan</a>
														<ul class="dropdown-submenu">
																<a class="dropdown-item" href="<?=base_url('info/acara');?>">Acara</a>
																<a class="dropdown-item" href="<?=base_url('info/foto');?>">Foto</a>
																<a class="dropdown-item" href="<?=base_url('info/video');?>">Video</a>
														</ul>
												</div>
										</ul>
								</li>
								<li class="nav-item">
										<a class="nav-link <?=($page == 'contact') ? 'active' : '';?>" href="<?=base_url('contact');?>">Kontak Kami</a>
								</li>
						</ul>
				</div>

				<ul class="wpb-mobile-menu">
						<li>
								<a class="active" href="<?=base_url();?>">Home</a>
						</li>
						<li>
								<a href="<?=base_url('about');?>">About</a>
						</li>
						<li>
								<a href="#">Angkatan</a>
								<ul>
									<?php
										if (!empty($angkatan->result())) {
										foreach($angkatan->result() as $row){?>

										<li><a href="<?=base_url('angkatan/'.$row->angkatan);?>">Angkatan <?=$row->angkatan;?></a></li>

										<?php
											}
										}?>
								</ul>
						</li>
						<li>
								<a href="#">Info</a>
								<ul>
										<li><a href="<?=base_url('artikel');?>">Artikel</a></li>
										<li><a href="<?=base_url('info');?>">News</a></li><li>
										<li><a href="#">Kegiatan</a>
												<ul>
														<li><a href="<?=base_url('artikel');?>">Acara</a></li>
														<li><a href="<?=base_url('foto');?>">Foto</a></li>
														<li><a href="<?=base_url('video');?>">Video</a></li>
												</ul>
										</li>
								</ul>
						</li>
						<li>
								<a href="<?=base_url('contact');?>">Kontak Kami</a>
						</li>
				</ul>

		</div>
</nav>
