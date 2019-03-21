<div class="page-content container-fluid">
    <div class="widget">
        <div class="widget-body">
            <div class="row mb-15">
                <div class="col-md-12">
                    <p class="form-control-static"><i>manajement konten sistem</i></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                    <div class="col-sm-3">
                        <button id="bttn_reload" onclick="reload_table()" class="btn btn-outline btn-success"><i class="ti-reload"></i> muat ulang isi tabel</button>
                    </div>
                    <br><br>
                    <table id="table" cellspacing="0" width="100%" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>nama</th>
                                <th>deskripsi</th>
                                <th>posisi</th>
                                <th>foto</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal for editdata article -->
<div id="modalform" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
    <div role="document" class="modal-dialog modal-lg">
        <form method="POST" id="c_direksi_form" class="form-horizontal" enctype="multipart/form-data">
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
                            <label class="control-label col-md-3">nama</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="nama" name="name" value="" />
                                <span id="name" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">url youtube</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="url youtube" name="url" value="" />
                                <span id="url" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">pilih posisi</label>
                            <div class="col-md-9">
                                <select class="js-example-basic-single js-states form-control" style="width:100%;" name="position">
                                    <option value="">-- pilih posisi --</option>
                                    <option value="direksi">direksi</option>
                                    <option value="wakil">wakil direksi</option>
                                </select>
                                <span id="posisi" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">deskripsi</label>
                            <div class="col-md-9">
                                <textarea name="description" class="form-control"></textarea>
                                <span id="description" class="help-block"></span>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="fileInputHor" class="col-sm-3 control-label">berkas gambar</label>
                            <div class="col-sm-9">
                                <input id="fileInputHor" name="file_image" type="file" data-buttonname="btn-outline btn-primary" data-iconname="ti-zip" class="filestyle">
                                <span id="file_image" class="help-block"></span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label id="img-label" for="img-src" class="col-sm-3 control-label">gambar</label>
                            <div class="col-sm-9">
                                <img id="img-src" width="200px" height="200px" class="img-thumbnail img-responsive" />
                            </div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <!-- end field form -->
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
                    <button type="submit" onclick="bttn_save_direksi()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>