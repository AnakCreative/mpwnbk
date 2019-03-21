<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/build/css/custom.css">
<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">
<!-- END STYLE & JAVASCRIPT -->
<div class="page-content container-fluid">
  <div class="widget">
	<div class="widget-body">
	  <div class="row mb-15">
		<div class="col-md-7">
		  <?php if(empty($total_rows || $search)) { ?>    
             <p class="form-control-static"><i>manajement konten sistem</i> slide gambar halama utama</p>  
          <?php } else { ?> 
             <p class="form-control-static"><strong><?=$total_rows;?></strong> hasil pencarian dari kata: <strong><?=$search;?></strong></p>
          <?php } ?> 
		</div>
		<div class="col-md-5">
		  <form action="<?=base_url()?>ad-min/c_slideheader/search" method="get">	
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
		<?php if (empty($header_data)){ ?>
		<div class="col-lg-12" id="error_not_found">
			maaf, tidak ada data {elapsed_time}
		</div>
		<?php } ?>
        <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                <?php for ($i = 0; $i < count($header_data); ++$i) { ?> 
                <li class="image-border col-xs-6 col-sm-4 col-md-3" data-src="<?=base_url();?>/image/header/<?php if($header_data[$i]->header_img!=""){echo $header_data[$i]->header_img;}else{echo"image404.png";}?>" data-sub-html="<h4><?=$header_data[$i]->heading;?></h4><p><?=$header_data[$i]->text;?></p><button type='button' class='btn btn-outline btn-primary' onclick='bttn_editing_header(<?=$header_data[$i]->header_id;?>)'><i class='ti-pencil-alt'></i></button>&nbsp;<button type='button' class='btn btn-outline btn-danger' onclick='bttn_delete_header(<?=$header_data[$i]->header_id;?>)'><i class='ti-trash'></i></button>">
                    <a class="image-list" href="">
                        <img class="photo-list" src="<?=base_url();?>/image/header/<?php if($header_data[$i]->header_img!=""){echo $header_data[$i]->header_img;}else{echo"image404.png";}?>" alt="<?=$header_data[$i]->heading;?>" alt="<?=$header_data[$i]->heading;?>">
                        <div class="title-photo">
                            <div class="text">
                                <p style="margin:0 auto; text-align:center;"><?=$header_data[$i]->heading;?></p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php } ?>
            </ul>
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
    <form method="POST" id="c_header_form" class="form-horizontal" enctype="multipart/form-data">
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
                <label class="control-label col-md-3">heading **</label>
                <div class="col-md-9">
                  <input class="form-control" placeholder="heading teks" name="heading[0]" value=""/>
                  <span id="heading_0" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">subheading **</label>
                <div class="col-md-9">
                  <input class="form-control" placeholder="subheading teks" name="subheading[0]" value=""/>
                  <span id="subheading_0" class="help-block"></span>
                </div>
            </div>  
            <div class="form-group">
                <label class="control-label col-md-3">deskripsi</label>
                <div class="col-md-9">
                    <textarea name="text[0]" placeholder="deksripsi foto" class="form-control"></textarea>
                    <span id="text_0" class="help-block"></span>
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
                <button type="button" onclick="bttn_adding_header_field()" class="btn btn-outline btn-primary"><i class="ti-plus"></i> tambah field</button>
                </div>    
            </div>
            <div id="header-form"></div> 
        </div>
        <!-- end field form -->
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
            <button type="submit" onclick="bttn_save_c_header()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
        </div>
    </div>
    </form>
</div>
</div>
<!-- end modal -->
<!-- modal editdata photo -->
<div id="modalform-edit" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
<div role="document" class="modal-dialog modal-lg">
    <form method="POST" id="c_header_form_edit" class="form-horizontal" enctype="multipart/form-data">
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
                    <label class="control-label col-md-3">heading **</label>
                    <div class="col-md-9">
                      <input class="form-control" placeholder="title" name="heading" value=""/>
                      <span id="heading" class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">subheading **</label>
                    <div class="col-md-9">
                      <input class="form-control" placeholder="title" name="subheading" value=""/>
                      <span id="subheading" class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">deskripsi</label>
                    <div class="col-md-9">
                        <textarea name="text" placeholder="deksripsi heading teks" class="form-control"></textarea>
                        <span id="text" class="help-block"></span>
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
            <button type="submit" onclick="bttn_save_c_header_edit()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
        </div>
    </div>
    </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
<script>
    lightGallery(document.getElementById('lightgallery'));
</script>
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>