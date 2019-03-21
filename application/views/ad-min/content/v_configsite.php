<div class="col-lg-12">
    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">pengaturan halaman general website</h3>
        </div>
        <div class="widget-body">
            <!-- start form -->
            <div class="row">
                <div class="col-md-6">
                    <label for="information">SITE - meta tag judul</label>
                    <div class="form-group">
                        <a type="text" id="meta-tag-title" name="title" data-pk="<?=$meta_data[0]->id;?>" data-placeholder="masukkan meta tag judul" data-name="title" data-type="text" data-inputclass="form-control" data-url="<?php echo site_url('mp-admin/configsite/meta_tag_title_save')?>" data-value="<?=$meta_data[0]->meta_tag_title;?>" data-title="masukkan meta tag judul"><?=$meta_data[0]->meta_tag_title;?></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="address">SITE - meta tag keywords</label>
                    <form id="c_tag_form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$meta_data[0]->id;?>" />
                            <textarea name="keywords" id="hero-demo"><?=$meta_data[0]->meta_tag_keywords;?></textarea>
                            <span id="keywords" class="help-block"></span>
                        </div>
                        <button style="display:none !important;" onclick="save_tag_meta_keyword()" id="bttn_submit_tag" type="submit"></button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="phone">SITE - meta tag deskripsi</label>
                    <a type="textarea" id="meta-tag-description" name="description" data-pk="<?=$meta_data[0]->id;?>" data-placeholder="masukkan meta tag deskripsi" data-name="description" data-type="textarea" data-inputclass="form-control" data-url="<?php echo site_url('mp-admin/configsite/meta-tag-descprtion-save')?>" data-value="<?=$meta_data[0]->meta_tag_description;?>" data-title="masukkan meta tag deskripsi"><?=$meta_data[0]->meta_tag_description;?></a>
                </div>
                <div class="col-md-6">
                    <label for="information">SITE - banner video</label>
                    <div class="form-group">
                        <a type="textarea" id="banner-video" name="url_video" data-pk="<?=$slider_video[0]->id;?>" data-placeholder="masukkan url video" data-name="url_video" data-type="textarea" data-inputclass="form-control" data-url="<?php echo site_url('mp-admin/configsite/video-banner-save')?>" data-value="<?=$slider_video[0]->url;?>" data-title="masukkan url video deskripsi"><?=$slider_video[0]->url;?></a>

                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <label for="information">SITE - judul website</label>
                    <div class="form-group">
                        <a type="text" id="logo-title" name="logo_title" data-pk="<?=$logo_data[0]->id;?>" data-placeholder="masukkan nama judul website" data-name="logo_title" data-type="text" data-inputclass="form-control" data-url="<?php echo site_url('mp-admin/configsite/logo-title-save')?>" data-value="<?=$logo_data[0]->logo_title;?>" data-title="masukkan nama judul website"><?=$logo_data[0]->logo_title;?></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="information">SITE - subjudul website</label>
                    <div class="form-group">
                        <a type="text" id="sub-logo-title" name="sublogo_title" data-pk="<?=$logo_data[0]->id;?>" data-placeholder="masukkan nama judul website" data-name="sublogo_title" data-type="text" data-inputclass="form-control" data-url="<?php echo site_url('mp-admin/configsite/logo-subtitle-save')?>" data-value="<?=$logo_data[0]->logo_subtitle;?>" data-title="masukkan nama judul website"><?=$logo_data[0]->logo_subtitle;?></a>
                    </div>
                </div>
            </div>
            <div class="row">
             <!-- form submit -->
                <form id="c_website_logo_form" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <label for="address">SITE - logo website</label>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$logo_data[0]->id;?>" />
                            <input type="file" name="logo_picture" id="dropify-logo" class="dropify" />
                            <span id="logo_website" class="help-block"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-outline btn-primary" onclick="save_logo_website()" id="bttn_submit_logo" type="submit"> ubah</button>
                    </div>
                </form>
                <form class="form-horizontal" id="c_website_favicon_form" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <label for="address">SITE - favicon logo website</label>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$logo_data[0]->id;?>" />
                            <input type="file" name="favicon_picture" id="dropify-favicon" class="dropify" />
                            <span id="favicon_logo" class="help-block"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-outline btn-primary" onclick="save_favicon_website()" id="bttn_submit_favicon" type="submit"> ubah</button>
                    </div>
                </form>
            </div>
            <!-- form -->
            <hr>
            <p>contoh lokasi berdasarkan dari google maps - <em>latitude & longitude</em> </p>
            <div class="row">
                <div class="col-md-6">
                    <label for="information">SITE - latitude</label>
                    <div class="form-group">
                        <a type="text" id="latitude" name="latitude" data-pk="<?=$location[0]->id;?>" data-placeholder="masukkan latitude google lokasi" data-name="latitude" data-type="text" data-inputclass="form-control" data-url="<?php echo site_url('mp-admin/configsite/latitude-save')?>" data-value="<?=$location[0]->latitude;?>" data-title="masukkan nama judul website"><?=$location[0]->latitude;?></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="information">SITE -  longitude</label>
                    <div class="form-group">
                        <a type="text" id="longitude" name="longitude" data-pk="<?=$location[0]->id;?>" data-placeholder="masukkan longitude google lokasi" data-name="longitude" data-type="text" data-inputclass="form-control" data-url="<?php echo site_url('mp-admin/configsite/longitude-save')?>" data-value="<?=$location[0]->longitude;?>" data-title="masukkan longitude google lokasi"><?=$location[0]->longitude;?></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id ="map" style="height: 255px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>
