<style>
    html,
    body {
        height: 100%;
    }

    #actions {
        margin: 2em 0;
    }

    /* Mimic table appearance */

    div.table {
        display: table;
    }

    div.table .file-row {
        display: table-row;
    }

    div.table .file-row>div {
        display: table-cell;
        vertical-align: top;
        border-top: 1px solid #ddd;
        padding: 8px;
    }

    div.table .file-row:nth-child(odd) {
        background: #f9f9f9;
    }

    /* The total progress gets shown by event listeners */

    #total-progress {
        opacity: 0;
        transition: opacity 0.3s linear;
    }

    /* Hide the progress bar when finished */

    #previews .file-row.dz-success .progress {
        opacity: 0;
        transition: opacity 0.3s linear;
    }

    /* Hide the delete button initially */

    #previews .file-row .delete {
        display: none;
    }

    /* Hide the start and cancel buttons and show the delete button */

    #previews .file-row.dz-success .start,
    #previews .file-row.dz-success .cancel {
        display: none;
    }

    #previews .file-row.dz-success .delete {
        display: block;
    }
</style>
<div class="page-content container-fluid">
    <div class="widget">
        <div class="widget-body">
            <div class="row mb-15">
                <div class="col-md-12">
                    <p class="form-control-static"><i>manajement konten sistem</i></p>
                </div>
            </div>
            <div id="actions" class="row">

                <div class="col-lg-7">
                    <p style="color:red;">** gunakan file ukuran 1920 x 480 untuk hasil terbaik</p>
                    <hr>
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>add files...</span>
                    </span>
                    <button type="submit" class="btn btn-primary start">
                            <i class="glyphicon glyphicon-upload"></i>
                            <span>start upload</span>
                        </button>
                    <button type="reset" class="btn btn-warning cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>cancel upload</span>
                        </button>
                </div>

                <div class="col-lg-5">
                    <!-- The global file processing state -->
                    <span class="fileupload-process">
                      <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                      </div>
                    </span>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="table table-striped" class="files" id="previews">
                            <div id="template" class="file-row">
                                <!-- This is used as the file preview template -->
                                <div>
                                    <span class="preview"><img data-dz-thumbnail /></span>
                                </div>
                                <div>
                                    <p class="name" data-dz-name></p>
                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                </div>
                                <div>
                                    <p class="heading" data-dz-page></p>
                                    <input class="form-control" placeholder="masukkan judul" id="heading" name="heading">
                                </div>
                                <div>
                                    <p class="subheading" data-dz-page></p>
                                    <input class="form-control" placeholder="masukkan sub judul" id="subheading" name="subheading">
                                </div>
                                <!-- <div>
                                    <p class="page" data-dz-page></p>
                                    <select style="width:60% !important;" class="form-control" id="page" name="page">
                                      <?php if($slide_artikel == 0) { ?>
                                        <option value="artikel">header u/artikel</option>
                                      <?php } ?>
                                      <?php if($slide_info == 0) { ?>
                                        <option value="info">header u/info</option>
                                      <?php } ?>
                                      <?php if($slide_acara == 0) { ?>
                                        <option value="acara">header u/acara</option>
                                      <?php } ?>
                                      <?php if($slide_foto == 0) { ?>
                                        <option value="foto">header u/foto</option>
                                      <?php } ?>
                                      <?php if($slide_video == 0) { ?>
                                        <option value="video">header u/video</option>
                                      <?php } ?>
                                      <?php if($slide_angkatan == 0) { ?>
                                        <option value="alumni">header u/angkatan</option>
                                      <?php } ?>
                                      <?php if($slide_kontak == 0) { ?>
                                        <option value="contact">header u/kontak</option>
                                      <?php } ?>
                                    </select>
                                </div> -->
                                <div>
                                    <p class="size" data-dz-size></p>
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary start"><i class="glyphicon glyphicon-upload"></i><span>start</span></button>
                                    <button data-dz-remove class="btn btn-warning cancel"><i class="glyphicon glyphicon-ban-circle"></i><span>cancel</span></button>
                                    <button data-dz-remove class="btn btn-danger delete"><i class="glyphicon glyphicon-trash"></i><span>delete</span></button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="dropzone">
                            <div class="dz-message">
                                <h3> klik atau drag & drop gambar disini</h3>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-12">
                    <hr>
                    <div class="col-sm-3">
                        <button id="bttn_reload" onclick="reload_table()" class="btn btn-outline btn-success"><i class="ti-reload"></i> muat ulang isi tabel</button>
                    </div>
                    <br><br>
                    <table id="table" cellspacing="0" width="100%" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>judul</th>
                                <th>gambar</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- modal for editdata article -->
                <div id="modalform" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
                    <div role="document" class="modal-dialog modal-lg">
                        <form method="POST" id="c_page_slide_form" class="form-horizontal" enctype="multipart/form-data">
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
                                            <label class="control-label col-md-3">header</label>
                                            <div class="col-md-9">
                                                <input class="form-control" placeholder="header" name="heading" value="" />
                                                <span id="heading" class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">sub header</label>
                                            <div class="col-md-9">
                                                <input class="form-control" placeholder="sub header" name="subheading" value="" />
                                                <span id="subheading" class="help-block"></span>
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
                                    </div>
                                    <!-- end field form -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
                                    <button type="submit" onclick="bttn_save_slider_page()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>