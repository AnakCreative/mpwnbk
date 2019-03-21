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

<section class="section pb-3">
    <div class="container">
        <h1 class="section-title">TENTANG KAMI</h1>
        <div class="pb-4">
            <div class="col-12 text-center">
			        <?=!empty($about) ? $about->description : '.....';?>
            </div>
        </div>
    </div>
</section>

<section id="visi-misi">
  <div class="container">
	  <div class="row no-gutters">
	    <div class="col-12 col-md-6">
	      <h4 class="text-center">VISI</h4>
	      <div class="section-subcontent mb-30">
	        <?=!empty($visi) ? $visi->description : '.....';?>
	      </div>
	    </div>
	    <div class="col-12 col-md-6">
	      <h4 class="text-center">MISI</h4>
	      <div class="section-subcontent mb-30">
	        <?=!empty($misi) ? $misi->description : '.....';?>
	      </div>
	    </div>
	  </div>
	</div>
</section>

<section id="visi-misi">
  <div class="container">
	  <div class="row no-gutters">
	    <div class="col-12 col-md-6">
	      <h4 class="text-center">KSRPD</h4>
	      <div class="section-subcontent mb-30">
	        <?=!empty($ksrpd) ? $ksrpd->description : '.....';?>
	      </div>
	    </div>
	    <div class="col-12 col-md-6">
	      <h4 class="text-center">POMA</h4>
	      <div class="section-subcontent mb-30">
	        <?=!empty($poma) ? $poma->description : '.....';?>
	      </div>
	    </div>
	  </div>
	</div>
</section>

<section id="page-konsentrasi">
	<div class="row no-gutters">
    <div class="col-12 col-md-4">
      <div class="image-group">
        <img class="img-fluid" src="<?=base_url('image/konsentrasi/art_craft_12052018.jpg');?>" alt="gallery example">
        <div class="caption-bg"></div>
        <div class="caption">
          <h5>SENI</h5>
          <a href="<?=base_url('konsentrasi/seni');?>" class="btn btn-outline btn-radius btn-sm mt-2">Detail</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="image-group">
        <img class="img-fluid" src="<?=base_url('image/konsentrasi/seni_12052018.jpg');?>" alt="gallery example">
        <div class="caption-bg"></div>
        <div class="caption">
          <h5>ART & CRAFT</h5>
          <a href="<?=base_url('konsentrasi/art');?>" class="btn btn-outline btn-radius btn-sm mt-2">Detail</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="image-group">
        <img class="img-fluid" src="<?=base_url('image/konsentrasi/design_12052018.jpg');?>" alt="gallery example">
        <div class="caption-bg"></div>
        <div class="caption">
          <h5>DESAIN</h5>
          <a href="<?=base_url('konsentrasi/desain');?>" class="btn btn-outline btn-radius btn-sm mt-2">Detail</a>
        </div>
      </div>
    </div>
  </div>
</section>
