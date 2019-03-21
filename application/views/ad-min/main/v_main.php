<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?=$title_site;?> | Administrator
	</title>
	<meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> <link rel="shortcut icon" href="<?=base_url();?>image/logo/logopnj.ico"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/PACE/themes/blue/pace-theme-flash.css"> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/PACE/pace.min.js"></script> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/bootstrap/dist/css/bootstrap.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/themify-icons/themify-icons.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/font-awesome/css/font-awesome.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/animo.js/animate-animo.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/flag-icon-css/css/flag-icon.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/toastr/toastr.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/SpinKit/css/spinners/7-three-bounce.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/jvectormap/jquery-jvectormap-2.0.3.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/morris.js/morris.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/datatables.net-colreorder-bs/css/colReorder.bootstrap.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/weather-icons/css/weather-icons-wind.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/weather-icons/css/weather-icons.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/jquery-minicolors/jquery.minicolors.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/bootstrap-daterangepicker/daterangepicker.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/dropify/dist/css/dropify.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/build/css/fourth-layout.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/dropzone/dist/min/dropzone.min.css"> <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/jQuery-tagEditor-master/jquery.tag-editor.css"><!--[if lt IE 9]> <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]--> <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/><link href="<?=base_url('assets/back-end/plugins/fileuploader/dist/jquery.fileuploader.min.css');?>" rel="stylesheet" type="text/css"><link href="<?=base_url('assets/back-end/plugins/fileuploader/dist/font/font-fileuploader.css');?>" rel="stylesheet" type="text/css">
    <script src="<?=base_url('assets/back-end/plugins/');?>ckeditor5-build-classic/build/ckeditor.js" type="text/javascript"></script>
</head>

<body>
    <!-- Header start-->
    <header>
        <?php $this->load->view('ad-min/main/v_header');?>
    </header>
    <!-- header end-->
    <div class="main-container">
        <!-- main sidebar start-->
        <aside class="main-sidebar">
            <?php $this->load->view('ad-min/main/v_menu');?>
        </aside>
        <!-- main sidebar end-->
        <div class="page-container">
            <div class="page-header container-fluid">
                <?php if($content_header =="c_alpha") { ?>
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mt-0 mb-5">selamat datang
                            <?=$this->session->userdata('first_name');?>
                        </h4>
                        <p class="text-muted mb-0">manajement konten sistem</p>
                    </div>
                </div>
                <?php } else { ?>
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mt-0 mb-5">
                            <?=$sub_header;?>
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="<?=base_url();?>"><?=$sub_header;?></a></li>
                            <li class="active">
                                <?=$content_header;?>
                            </li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <?php if($akses[0]['add'] == 1 && $this->uri->segment(2) != "informasi" && $this->uri->segment(2) != "accessprivillege" && $this->uri->segment(2) != "configsite" && $this->uri->segment(2) != "inbox" && $this->uri->segment(2) != "banner" && $this->uri->segment(2) != "c_message" && $this->uri->segment(2) != "readmore" && $this->uri->segment(2)!= "photoactivities" && $this->uri->segment(2) != "app") {?>
                        	<button id="btn-add" onclick="bttn_adding_<?=$this->uri->segment(2);?>()" class="btn btn-outline btn-primary"><i class="ti-plus"></i> tambah</button>
                        <?php } ?>
                        <button id="btn-reload" onclick="location.href='<?=base_url();?>mp-admin/<?=$this->uri->segment(2);?>'" class="btn btn-outline btn-info"><i class="ti-reload"></i> muat ulang</button>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="page-content container-fluid">
                <?=$content;?>
            </div>
            <div class="footer">2017 © <a href="#">Politeknik Negeri Jakarta</a> by <a href="#" target="_blank">ANAK MAS creative.</a></div>
            <!-- <div class="footer">2017</div> -->
        </div>
    </div>
	<script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/jquery/dist/jquery.min.js"></script> <script type="text/javascript" src="<?=base_url('assets/back-end/');?>/plugins/jquery/dist/jquery.form.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/bootstrap/dist/js/bootstrap.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/animo.js/animo.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/toastr/toastr.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/moment/min/moment.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/blockUI/jquery.blockUI.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/jquery-waypoints/waypoints.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/Counter-Up/jquery.counterup.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/jvectormap/maps/jquery-jvectormap-world-mill.js"></script> <script type="text/javascript" src="<?=base_url("assets/back-end/");?>/plugins/kapusta-jquery.sparkline/dist/jquery.sparkline.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/raphael/raphael-min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/morris.js/morris.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/datatables.net/js/jquery.dataTables.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script> <script type="text/javascript" src="<?=base_url('assets/back-end/');?>/plugins/bootstrap-filestyle/src/bootstrap-filestyle.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/jszip/dist/jszip.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/pdfmake/build/pdfmake.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/pdfmake/build/vfs_fonts.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/datatables.net-buttons/js/buttons.print.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/jquery-minicolors/jquery.minicolors.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/dropify/dist/js/dropify.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/jquery.tagsinput/src/jquery.tagsinput.js"></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/dropzone/dist/min/dropzone.min.js"></script> <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/jQuery-tagEditor-master/jquery.tag-editor.js"></script> <script type="text/javascript" src="<?=base_url();?>assets/back-end/plugins/jQuery-tagEditor-master/jquery.caret.min.js"></script> <script type="text/javascript" src="<?=base_url("assets/back-end/");?>/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script><script type="text/javascript" src="<?=base_url('assets/back-end/plugins/fileuploader/dist/jquery.fileuploader.min.js');?>"></script>
	<script type="text/javascript">
        var base_url = "<?=base_url('mp-admin/app/');?>";
        var url = "<?=base_url('mp-admin/');?><?=$this->uri->segment(2);?>/";
        var logout = "<?=base_url('mp-admin/app/logout');?>";
        var asset_url = "<?=base_url('assets/back-end/');?>";
        var uri = "<?=$this->uri->segment(2); ?>";
        var image_url = "<?=base_url();?>";
        var default_url = "<?=base_url();?>";
        var controller = "<?=$this->uri->segment(2);?>";
        var session_search = "<?=$this->session->userdata('search_word');?>";

        function variable_logo_picture() {
            $.ajax({
                url: base_url + 'ic-logo-settings/',
                type: "GET",
                dataType: "JSON",
                success: function(data) { //if data success load from database

                    var logo;

                    if (data.logo_picture != "") {
                        logo = data.logo_picture;
                    } else {
                        logo = "logo-sm-pnj.png";
                    }

                    var drEvent = $('#dropify-logo').dropify({
                        defaultFile: image_url + "image/logo/" + logo,
                        // custom messages
                        messages: {
                            'default': 'tarik dan jatuh berkas gambar anda disini',
                            'replace': 'tarik dan jatuh berkas gambar anda disini untuk merubah',
                            'remove': 'hapus',
                            'error': 'oops, terjadi kesalahan.'
                        },
                        error: {
                            'fileSize': 'the file size is too big ({{ value }} max).',
                            'minWidth': 'the image width is too small ({{ value }}}px min).',
                            'maxWidth': 'the image width is too big ({{ value }}}px max).',
                            'minHeight': 'the image height is too small ({{ value }}}px min).',
                            'maxHeight': 'the image height is too big ({{ value }}px max).',
                            'imageFormat': 'the image format is not allowed ({{ value }} only).'
                        },
                        tpl: {
                            wrap: '<div class="dropify-wrapper"></div>',
                            loader: '<div class="dropify-loader"></div>',
                            message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
                            preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                            filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                            clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
                            uploadButton: '<button type="button" class="dropify-upload">{{ upload }}</button>',
                            errorLine: '<p class="dropify-error">{{ error }}</p>',
                            errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
                        },
                        callbacks: {
                            uploadCallback: ''
                        }

                    });

                    drEvent.on('dropify.afterClear', function(event, element) {
                        delete_logo_file(data.id);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'fadeIn',
                        hideMethod: 'fadeOut',
                        timeOut: 8000
                    };
                    toastr.error('terjadi kesalahan, tidak bisa mengambil data logo picture...', 'system says,');
                }
            });
        }

        function variable_favicon_picture() {
            $.ajax({
                url: base_url + 'favicon-logo-settings/',
                type: "GET",
                dataType: "JSON",
                success: function(data) { //if data success load from database

                    var favicon;

                    if (data.favicon_picture != "") {
                        favicon = data.favicon_picture;
                    } else {
                        favicon = "logo-sm-pnj.png";
                    }

                    var drEvent = $('#dropify-favicon').dropify({
                        defaultFile: image_url + "image/logo/" + favicon,
                        // custom messages
                        messages: {
                            'default': 'tarik dan jatuh berkas gambar anda disini',
                            'replace': 'tarik dan jatuh berkas gambar anda disini untuk merubah',
                            'remove': 'hapus',
                            'error': 'oops, terjadi kesalahan.'
                        },
                        error: {
                            'fileSize': 'the file size is too big ({{ value }} max).',
                            'minWidth': 'the image width is too small ({{ value }}}px min).',
                            'maxWidth': 'the image width is too big ({{ value }}}px max).',
                            'minHeight': 'the image height is too small ({{ value }}}px min).',
                            'maxHeight': 'the image height is too big ({{ value }}px max).',
                            'imageFormat': 'the image format is not allowed ({{ value }} only).'
                        },
                        tpl: {
                            wrap: '<div class="dropify-wrapper"></div>',
                            loader: '<div class="dropify-loader"></div>',
                            message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
                            preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                            filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                            clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
                            uploadButton: '<button type="button" class="dropify-upload">{{ upload }}</button>',
                            errorLine: '<p class="dropify-error">{{ error }}</p>',
                            errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
                        },
                        callbacks: {
                            uploadCallback: ''
                        }

                    });

                    drEvent.on('dropify.afterClear', function(event, element) {
                        delete_favicon_file(data.id);
                    });

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'fadeIn',
                        hideMethod: 'fadeOut',
                        timeOut: 8000
                    };
                    toastr.error('terjadi kesalahan, tidak bisa mengambil data logo picture...', 'system says,');
                }
            });
        }

        function delete_favicon_file(id) {
            $.ajax({
                url: base_url + 'checksession',
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    if (data.session == true) {
                        // ajax delete data to database
                        $.ajax({
                            url: base_url + 'delete-favicon/' + id,
                            type: "POST",
                            dataType: "JSON",
                            success: function(data) {
                                location.reload();
                            },
                            error: function(jqXHR, textStatus, errorThrown) { // if failed delete this data
                                toastr.options = {
                                    closeButton: true,
                                    progressBar: true,
                                    showMethod: 'fadeIn',
                                    hideMethod: 'fadeOut',
                                    timeOut: 8000
                                };
                                toastr.error('terjadi kesalahan, tidak bisa menghapus data...', 'system says,');
                            }
                        });
                    } else {
                        window.location.href = logout;
                    }
                }
            });
        }

        function delete_logo_file(id) {
            $.ajax({
                url: base_url + 'checksession',
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    if (data.session == true) {
                        // ajax delete data to database
                        $.ajax({
                            url: base_url + 'delete-logo/' + id,
                            type: "POST",
                            dataType: "JSON",
                            success: function(data) {
                                location.reload();
                            },
                            error: function(jqXHR, textStatus, errorThrown) { // if failed delete this data
                                toastr.options = {
                                    closeButton: true,
                                    progressBar: true,
                                    showMethod: 'fadeIn',
                                    hideMethod: 'fadeOut',
                                    timeOut: 8000
                                };
                                toastr.error('terjadi kesalahan, tidak bisa menghapus data...', 'system says,');
                            }
                        });
                    } else {
                        window.location.href = logout;
                    }
                }
            });
        }
    </script>
    <script src="<?=base_url();?>assets/back-end/build/js/fourth-layout/custom.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATUdQzCNOsv0lTHWwJ9CI0BcC6_bM7FQk"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/back-end/build/js/fourth-layout/app.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/back-end/build/js/fourth-layout/demo.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/back-end/build/js/page-content/widgets/widgets.js"></script>
</body>

</html>
