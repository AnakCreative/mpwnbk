<!-- <script src="http://code.gijgo.com/1.4.0/js/gijgo.js" type="text/javascript"></script>
<link href="http://code.gijgo.com/1.4.0/css/gijgo.css" rel="stylesheet" type="text/css" /> -->
<!-- Ladda UI-->
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end/');?>/plugins/ladda-bootstrap/dist/ladda-themeless.min.css">
<!-- content datatables for this page -->
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title">group alumni</h3>
    </div>
    <div class="widget-body">
        <div class="col-sm-3">
            <button id="bttn_reload" onclick="reload_table()" class="btn btn-outline btn-success"><i class="ti-reload"></i> muat ulang isi tabel</button>
        </div>
        <br><br>
        <table id="table" cellspacing="0" width="100%" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th>nama group</th>
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
    <form method="POST" id="c_group_alumni_form" class="form-horizontal" enctype="multipart/form-data">
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
                <label class="control-label col-md-3">nama group</label>
                <div class="col-md-9">
                    <input name="name" placeholder="name group" class="form-control" type="text" maxlength="30" autocomplete="off">
                    <span class="help-block"></span>
                </div>
            </div>
            <!-- end field form -->
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
            <button type="submit" onclick="bttn_save_group()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
        </div>
    </div>
    </form>
</div>
</div>
<!-- end modal -->
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>