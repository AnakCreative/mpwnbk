<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/build/css/custom.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
<!-- END STYLE & JAVASCRIPT -->
<div class="page-content container-fluid">
  <div class="widget">
	<div class="widget-body">
	  <div class="row mb-15">
		<div class="col-md-7">
		  <p class="form-control-static"><i>manajemen konten sistem</i> VIDEO</p>
		</div>
		<div class="col-md-5">
		  <form action="<?=base_url()?>ad-min/c_video/search" method="get">	
		  <div class="input-group">
			<input name="key" placeholder="pencarian..." required="" class="form-control pr-15" type="text">
			<div class="input-group-btn">
			  <button type="submit" class="btn btn-outline btn-default"><i class="ti-search"></i></button>
			</div>
		  </div>
		  </form>
		</div>
	  </div>
	<div class="row">
	<div class="col-lg-12">
	<div class="row">
		<?php if (empty($video_data)){ ?>
		<div class="col-lg-12" id="error_not_found">
			maaf, tidak ada data {elapsed_time}
		</div>
		<?php } ?>
			<div class="row">
			<?php for ($i = 0; $i < count($video_data); ++$i) { ?>   
            <div class="col-sm-6 col-md-4">  
                <div class="thumbnail thumb">
                  <?=$this->settings->youtube_thumb($video_data[$i]->embed_url, $frame=2, $width="300px");?>          
                  <div class="middle">
                    <?=$video_data[$i]->text;?>  
                    <a class="popup-youtube" href="<?php if($video_data[$i]->embed_url!=""){ ?><?=$video_data[$i]->embed_url;?><?php } else { ?>#<?php } ?>" title="<?php if($video_data[$i]->text!=""){ ?><?=$video_data[$i]->text;?> <?php } else { ?>unknown<?php } ?>"><img class="play" src="<?=base_url();?>/assets/back-end/build/images/play.png">
                    </a>   
                  </div>
                  <div class="text-right caption">
                      <ul class="list-inline mb-0">
                        <li><a onclick="bttn_editing_video(<?=$video_data[$i]->video_id;?>)" href="javascript:void(0);"><i class="ti-pencil-alt text-info"></i></a></li>
                        <li><a onclick="bttn_delete_video(<?=$video_data[$i]->video_id;?>)" href="javascript:void(0);"><i class="ti-trash text-danger"></i></a></li>
                      </ul>
                  </div>    
                </div> 
            </div>    
			<?php } ?>
          </div>
	</div>
  </div>
  </div>
	  <nav>
		<?php echo $pagination; ?>
	  </nav>
	</div>
  </div>
</div>
<!-- modal for adding video -->
<div id="modalform" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
<div role="document" class="modal-dialog modal-lg">
    <form method="POST" id="c_video_form" class="form-horizontal" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            <h4 id="myAnimationModalLabel" class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <!-- field by id -->
          <!-- <input type="hidden" value="" name="id" /> -->
          <!-- field form each -->
          <div class="form-body">  
            <div class="form-group">
                <label class="control-label col-md-3">judul *</label>
                <div class="col-md-9">
                  <input class="form-control" placeholder="judul" name="text[0]" value=""/>
                  <span id="text_0" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">link url **</label>
                <div class="col-md-9">
                    <input id="content_url" placeholder="contoh : https://www.youtube.com/watch?v=WeCghp05vIc" name="embed_url[0]" class="form-control"/>
                    <span id="embed_url_0" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
              <label for="fileInputHor" class="col-sm-3 control-label">berkas gambar</label>
              <div class="col-sm-9">
                <input id="fileInputHor" name="file_image[0]" type="file" class="dropify">
                <span id="file_image_0" class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <p>* <i style="color:red;">harus diisi</i> / ** <i style="color:red;">sangat di anjurkan diisi</i></p>     
                <button type="button" onclick="bttn_adding_video_field()" class="btn btn-outline btn-primary"><i class="ti-plus"></i> tambah field</button>
                </div>    
            </div>
            <div id="video-form"></div> 
        </div>
        <!-- end field form -->
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
            <button type="submit" onclick="bttn_save_c_video()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
        </div>
    </div>
    </form>
</div>
</div>
<!-- end modal -->
<!-- modal editdata video -->
<div id="modalform-edit" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
<div role="document" class="modal-dialog modal-lg">
    <form method="POST" id="c_video_form_edit" class="form-horizontal" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            <h4 id="myAnimationModalLabel" class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <!-- field by id -->
          <input type="hidden" value="" name="id" />
          <!-- field form each -->
          <div class="form-body"> 
                <div class="form-group">
                    <label class="control-label col-md-3">judul</label>
                    <div class="col-md-9">
                      <input class="form-control" placeholder="title" name="text_edit" value=""/>
                      <span id="text_edit" class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">link url</label>
                    <div class="col-md-9">
                        <input id="content_url" placeholder="https://www.youtube.com/watch?v=WeCghp05vIc" name="embed_url_edit" class="form-control"/>
                        <span id="embed_url_edit" class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                  <label for="fileInputHor" class="col-sm-3 control-label">berkas gambar</label>
                  <div class="col-sm-9">
                    <input id="fileInputHor" name="file_image_edit" type="file" data-buttonname="btn-outline btn-primary" data-iconname="ti-zip" class="filestyle">
                    <span id="file_image_edit" class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                    <label id="img-label" for="img-src" class="col-sm-3 control-label">gambar</label>
                    <div class="col-sm-9">
                        <img id="img-src" width="200px" height="200px" class="img-thumbnail img-responsive"/>
                    </div>
                </div>   
          </div>
          <!-- end field form -->
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
            <button type="submit" onclick="bttn_save_c_video_edit()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
        </div>
    </div>
    </form>
</div>
</div>
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>
