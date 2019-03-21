<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/build/css/custom.css">
<!-- END CSS POSTING DETAIL -->
<div class="widget">
    <div class="widget-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row hidden-md hidden-lg">
                    <h1 class="text-center">
                        <?=$posting_data[0]->title;?>
                    </h1>
                </div>
                <div class="pull-left col-md-4 col-xs-12 thumb-contenido"><img class="center-block img-responsive" src='<?=base_url(); ?>image/posting/<?php if($posting_data[0]->img!=""){ ?><?=$posting_data[0]->img;?><?php } else { ?>image404.png<?php } ?>' /></div>
                <div class="">
                    <h1 class="hidden-xs hidden-sm">
                        <?=$posting_data[0]->title;?>
                    </h1>
                    <hr>
                    <small><?=$posting_data[0]->date_created;?></small><br>
                    <small><strong><?=$posting_data[0]->username;?></strong></small>
                    <hr>
                    <p class="text-justify">
                        <?=$posting_data[0]->text;?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <button class="btn btn-block btn-outline btn-danger" onclick="window.location.href='<?=base_url();?>/<?=$this->uri->segment(1);?>/<?=$this->uri->segment(2);?>'"><i class="ti-arrow-left"></i> kembali</button>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>
