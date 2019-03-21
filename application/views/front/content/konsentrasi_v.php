<section class="section" style="background: rgba(255, 255, 255, .8);">
    <div class="container">
        <h1 class="section-title"><?=$subpage;?></h1>
        <div class="row">
            <div class="col-sm-12 text-center">
                <?=!empty($detail) ? $detail->text : '';?>
            </div>
        </div>
    </div>
</section>

<section class="break"></section>

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
