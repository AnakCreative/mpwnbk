<div class="page-content container-fluid">
    <div class="widget">
        <div class="widget-body">
            <div class="row mb-15">
                <div class="col-md-12">
                    <p class="form-control-static"><i>manajement konten sistem</i></p>
                </div>
            </div>
            <div class="row mb-15">
                <?php foreach($profile_website as $list) {?>
                <div class="col-md-4">
                    <div class="widget no-border"><img src="<?=base_url();?>image/profile/<?php if($list->picture!=""){ echo $list->picture; } else { echo 'image404.png'; }?>" alt="" class="img-responsive">
                        <div class="bd-l bd-r bd-b">
                            <div class="p-20 bd-b">
                                <h4 class="mt-0"><?=$list->flag;?></h4>
                                <p><?=(strlen(strip_tags($list->description)) > 300) ? substr(strip_tags($list->description),0,300).' . . . ' : $list->description;?></p><a href="javascript:void(0);" onclick="bttn_editing_profilesite(<?=$list->id;?>)" class="btn btn-outline btn-success">ubah</a>
                            </div>
                            <div class="clearfix fs-12 text-muted pt-15 pb-15 pl-20 pr-20">
                                <div class="pull-left"><i class="ti-time"></i> <?=$this->settings->time_elapsed_string($list->date_created);?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div id="modalform" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
    <div role="document" class="modal-dialog modal-lg">
        <form method="POST" id="c_profilewebsiteForm" class="form-horizontal" enctype="multipart/form-data">
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
                            <label class="control-label col-md-3">pilih kategori konten</label>
                            <div class="col-md-9">
                                <select class="form-control" id="type-select" style="width:100%;" name="type">
                                  <option value="">-- pilih kategori konten --</option>
                                  <option value="poma">poma</option>
                                  <option value="ksrpd">ksrpd</option>
                                  <option value="visi">visi</option>
                                  <option value="misi">misi</option>
                                  <option value="about">about</option>
                                </select>
                                <span id="type" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">konten</label>
                            <div class="col-md-9">
                                <textarea name="text" id="content_profilewebsite"></textarea>
                                <span id="text" class="help-block"></span>
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
                    <button type="submit" onclick="bttn_save_c_profilewebsite()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>
