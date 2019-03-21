<!-- <script src="http://code.gijgo.com/1.4.0/js/gijgo.js" type="text/javascript"></script>
<link href="http://code.gijgo.com/1.4.0/css/gijgo.css" rel="stylesheet" type="text/css" /> -->
<!-- ladda UI-->
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end/');?>/plugins/ladda-bootstrap/dist/ladda-themeless.min.css">
<!-- content datatables for this page -->
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title">hak akses keamanan menu</h3>
        <p>halaman ini digunakan untuk pengaturan hak akses pengaturan menu di admin.</p>
    </div>
    <div class="widget-body">
        <?php if ($akses[0]['add'] == 1){ ?>
        <div class="col-sm-4">
            <!-- <button data-style="expand-left" onclick="bttn_adding_accessprivilege()" class="btn btn-outline btn-primary ladda-button ladda-progress"><span class="ladda-label"><i class="ti-plus"></i> add</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 70px;"></div></button> -->
        <?php } ?>
            <button id="bttn_reload" onclick="reload_table()" class="btn btn-outline btn-success"><i class="ti-reload"></i> muat ulang isi tabel</button>
        </div>
        <br><br>
        <table id="table" cellspacing="0" width="100%" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th>nama akun</th>
                    <th>akun username</th>
                    <th>email</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<!-- end content datatables for this page -->
<!-- modal for editdata accessprivilege -->
<div id="modalform" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
<div role="document" class="modal-dialog">
    <form method="POST" id="c_accessprivilege_form" class="form-horizontal" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            <h4 id="myAnimationModalLabel" class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <!-- table edit access privilege edit -->
            <div class="row">
                <table id="accessprivilege_list_menu" cellspacing="0" width="100%" class="table table-striped dt-responsive nowrap"></table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-raised btn-default">close</button>
            <button type="submit" onclick="back_load()" id="btnSave" class="btn btn-raised btn-black">save changes</button>
        </div>
    </div>
    </form>
</div>
</div>
<!-- end modal -->
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>
