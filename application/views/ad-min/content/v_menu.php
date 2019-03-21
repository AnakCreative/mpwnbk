<!-- <script src="http://code.gijgo.com/1.4.0/js/gijgo.js" type="text/javascript"></script>
<link href="http://code.gijgo.com/1.4.0/css/gijgo.css" rel="stylesheet" type="text/css" /> -->
<!-- Ladda UI-->
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end/');?>/plugins/ladda-bootstrap/dist/ladda-themeless.min.css">
<!-- content datatables for this page -->
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title">pengaturan menu</h3>
    </div>
    <div class="widget-body">
        <div class="col-sm-3">
            <button id="bttn_reload" onclick="reload_table()" class="btn btn-outline btn-success"><i class="ti-reload"></i> muat ulang isi tabel</button>
        </div>
        <br><br>
        <table id="table" cellspacing="0" width="100%" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th>nama menu</th>
                    <th>akar nama menu</th>
                    <th>link menu</th>
                    <th>kategori</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<!-- end content datatables for this page -->
<!-- modal for editdata menu -->
<div id="modalform" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
<div role="document" class="modal-dialog">
    <form method="POST" id="c_menu_form" class="form-horizontal" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            <h4 id="myAnimationModalLabel" class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <!-- id field form -->
            <input name="id" type="hidden" />
            <!-- end id field form -->
            <div class="form-group">
                <label class="control-label col-md-3">nama menu</label>
                <div class="col-md-9">
                    <input name="name" placeholder="name menu" class="form-control" type="text" maxlength="30" autocomplete="off">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">link</label>
                <div class="col-md-9">
                    <input name="link" placeholder="url menu" class="form-control" type="text" maxlength="30" autocomplete="off">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">icon menu</label>
                <div class="col-md-6">
                    <i class="ti-underline"></i> <a href="http://fontawesome.io/icons/" target="_blank">icon</a> <input list="class" name="class" placeholder="example : fa fa-paint-brush" maxlength="50" id="alloptions" class="form-control" type="text">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">level akun</label>
                <div class="col-md-9">
                    <select name="level" class="form-control">
                    <option value="">--select level user--</option>
                    <?php foreach ($level_user as $list){ ?>
                        <option value="<?=$list['id'];?>"><?=$list['name'];?></option>
                    <?php } ?>
                </select>
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">akar nama menu</label>
                <div class="col-md-9">
                    <select name="parent" class="form-control">
                    <option value="">--select parent--</option>
                    <?php foreach ($parent_data as $parent_data_list){ ?>
                        <option value="<?php echo $parent_data_list['id']; ?>"><?php echo $parent_data_list['name']; ?></option>
                    <?php } ?>
                </select>
                    <span class="help-block"></span>
                </div>
            </div>
            <!-- end field form -->
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
            <button type="submit" onclick="bttn_save_menu()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
        </div>
    </div>
    </form>
</div>
</div>
<!-- end modal -->
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>