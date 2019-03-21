<div class="col-md-12">
    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">pengaturan - IKLAN</h3>
        </div>
        <div class="widget-body">
            <div class="row mb-15">
                <?php if (empty($advertise_data)){ ?>
                <div class="col-lg-12" id="error_not_found">
                    maaf, tidak ada data {elapsed_time}
                </div>
                <?php } ?>
                <?php for ($i = 0; $i < count($advertise_data); ++$i) { ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail"><a href="<?=base_url();?>image/advertise/<?php if($advertise_data[$i]->adv_img!=""){echo $advertise_data[$i]->adv_img;}else{ echo"image404.png "; }?>" title="<?=$advertise_data[$i]->title;?>"><img width="240" height="80" src="<?=base_url();?>image/advertise/<?php if($advertise_data[$i]->adv_img!=""){echo $advertise_data[$i]->adv_img;}else{ echo"image404.png"; }?>" alt="" class=""></a>
                        <div class="text-right caption">
                            <ul class="list-inline mb-0">
                                <?php if ($akses[0]['delete'] == 1) { ?>
                                    <li style="cursor:pointer;" onclick="bttn_delete_advertise(<?=$advertise_data[$i]->advertise_id;?>)"><i class="ti-trash text-danger"></i></li>
                                <?php } ?>
                                <?php if ($akses[0]['update'] == 1){?>
                                    <li style="cursor:pointer;" onclick="bttn_editing_advertise(<?=$advertise_data[$i]->advertise_id;?>)"><i class="ti-settings text-info"></i></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- modal for adding photo -->
<div id="modalform" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
    <div role="document" class="modal-dialog modal-lg">
        <form method="POST" id="c_advertise_form" class="form-horizontal" enctype="multipart/form-data">
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
                                <input class="form-control" placeholder="judul" name="title" value="" />
                                <span id="title" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fileInputHor" class="col-sm-3 control-label">berkas gambar</label>
                            <div class="col-sm-9">
                                <input id="fileInputHor" name="file_image" type="file" class="dropify">
                                <span id="file_image" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <p>* <i style="color:red;">harus diisi</i> / ** <i style="color:red;">sangat di anjurkan diisi</i></p>
                            </div>
                        </div>
                    </div>
                    <!-- end field form -->
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
                    <button type="submit" onclick="bttn_save_c_advertise()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end modal -->
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>