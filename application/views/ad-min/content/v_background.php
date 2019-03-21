<!-- <script src="http://code.gijgo.com/1.4.0/js/gijgo.js" type="text/javascript"></script>
<link href="http://code.gijgo.com/1.4.0/css/gijgo.css" rel="stylesheet" type="text/css" /> -->
<!-- Ladda UI-->
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end/');?>/plugins/ladda-bootstrap/dist/ladda-themeless.min.css">
<!-- content datatables for this page -->
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title">pengaturan background gambar</h3>
    </div>
    <div class="widget-body">
        <div class="col-sm-3">
            <button id="bttn_reload" onclick="reload_table()" class="btn btn-outline btn-success"><i class="ti-reload"></i> muat ulang isi tabel</button>
        </div>
        <br><br>
        <table id="table" cellspacing="0" width="100%" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
            <tr>
                <th>image</th>
                <th>untuk halaman</th>
                <th>dibuat oleh</th>
                <th>tanggal pembuatan</th>
                <th>aksi</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<!-- end content datatables for this page -->
<!-- modal for editdata facility -->
<div id="modalform" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
    <div role="document" class="modal-dialog">
        <form method="POST" id="background_form" class="form-horizontal" enctype="multipart/form-data">
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
                            <label class="control-label col-md-3">pilih halaman</label>
                            <div class="col-md-9">
                                <select class="form-control" id="type-select" style="width:100%;" name="type">
                                    <option value="">-- pilih halaman --</option>
                                    <option value="home">beranda</option>
                                    <option value="about">tentang</option>
                                    <option value="alumni">alumni</option>
                                    <option value="info">info</option>
                                    <option value="kontak">kontak</option>
                                    <option value="seni">seni</option>
                                    <option value="art">art</option>
                                    <option value="desain">desain</option>
                                </select>
                                <span id="type" class="help-block"></span>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="fileInputHor" class="col-sm-3 control-label">berkas gambar</label>
                            <div class="col-sm-9">
                                <input id="fileInputHor" name="file_image" type="file" data-buttonname="btn-outline btn-primary" data-iconname="ti-zip" class="filestyle">
                                <span id="file_image" class="help-block"></span>
                                <span class="text-center" style="color:red;">*1980 - *840 w|h maks. filetype: jpg,png,gif</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="img-label" for="img-src" class="col-sm-3 control-label">gambar</label>
                            <div class="col-sm-9">
                                <img id="img-src" width="200px" height="200px" class="img-thumbnail img-responsive" />
                            </div>
                        </div>
                        <!-- end field form -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
                        <button type="submit" onclick="bttn_save_background()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
                    </div>
                </div>
        </form>
    </div>
</div>
<!-- end modal -->
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>