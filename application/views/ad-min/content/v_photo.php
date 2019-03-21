<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/build/css/custom.css">
<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">
<!-- END STYLE & JAVASCRIPT -->
<div class="page-content container-fluid">
<!-- content datatables for this page -->
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title">foto kegiatan</h3>
    </div>
    <div class="widget-body">
        <div class="col-sm-3">
            <button id="bttn_reload" onclick="reload_table()" class="btn btn-outline btn-success"><i class="ti-reload"></i> muat ulang isi tabel</button>
        </div>
        <br><br>
        <table id="table" cellspacing="0" width="100%" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>judul</th>
                    <th>teks</th>
                    <th>gambar</th>
                    <th>tanggal buat</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<!-- end content datatables for this page -->
</div>
<!-- modal for adding photo -->
<div id="modalform" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
<div role="document" class="modal-dialog modal-lg">
    <form method="POST" id="c_photo_form" class="form-horizontal" enctype="multipart/form-data">
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
                <label class="control-label col-md-3">judul **</label>
                <div class="col-md-9">
                  <input class="form-control" placeholder="judul" name="title[0]" value=""/>
                  <span id="title_0" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">pilih tipe foto **</label>
                <div class="col-md-9">
                    <div class="radio-custom radio-inline">
                        <input id="rdbTerribleHor" name="type_photo[0]" value="gallery" type="radio">
                        <label for="rdbTerribleHor">Galeri foto</label>
                    </div>
                    <div class="radio-custom radio-inline">
                        <input id="rdbWatchableHor-act" name="type_photo[0]" value="activities" type="radio">
                        <label for="rdbWatchableHor-act">Foto kegiatan</label>
                    </div>
                </div>
            </div>
            <div id="alumni-id" class="form-group"></div>
            <div class="form-group">
                <label class="control-label col-md-3">deskripsi</label>
                <div class="col-md-9">
                    <textarea name="text[0]" placeholder="deksripsi foto" class="form-control"></textarea>
                    <span id="text_0" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">posisi urutan</label>
                <div class="col-md-9">
                    <select name="position[0]" class="form-control">
                        <option value="1">posisi terbaru</option>
                        <option value="0">posisi terlama</option>
                    </select>
                    <span id="position_0" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
              <label for="fileInputHor" class="col-sm-3 control-label">berkas gambar</label>
              <div class="col-sm-9">
                <input id="fileInputHor" name="file_image[0]" type="file" class="dropify">
                <span id="file_image_0" class="help-block"></span>
              </div>
            </div>
            <!-- <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <p>* <i style="color:red;">harus diisi</i> / ** <i style="color:red;">sangat di anjurkan diisi</i></p>
                <button type="button" onclick="bttn_adding_photo_field()" class="btn btn-outline btn-primary"><i class="ti-plus"></i> tambah field</button>
                </div>
            </div>
            <div id="photo-form"></div> -->
        </div>
        <!-- end field form -->
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
            <button type="submit" onclick="bttn_save_c_photo()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
        </div>
    </div>
    </form>
</div>
</div>
<!-- end modal -->
<!-- modal editdata photo -->
<div id="modalform-edit" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
<div role="document" class="modal-dialog modal-lg">
    <form method="POST" id="c_photo_form_edit" class="form-horizontal" enctype="multipart/form-data">
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
                    <label class="control-label col-md-3">judul **</label>
                    <div class="col-md-9">
                      <input class="form-control" placeholder="title" name="title_edit" value=""/>
                      <span id="text_edit" class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">deskripsi foto</label>
                    <div class="col-md-9">
                        <textarea name="text_edit" placeholder="deksripsi foto" class="form-control"></textarea>
                        <span id="text_edit" class="help-block"></span>
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
                    <label class="control-label col-md-3">posisi urutan</label>
                    <div class="col-md-9">
                        <select name="position_edit" class="form-control">
                            <option value="1">posisi terbaru</option>
                            <option value="0">posisi terlama</option>
                        </select>
                        <span id="position" class="help-block"></span>
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
            <button type="submit" onclick="bttn_save_c_photo_edit()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
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
