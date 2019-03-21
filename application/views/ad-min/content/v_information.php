<div class="col-lg-12">
    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">pengaturan halaman kontak kami - INFORMASI</h3>
        </div>
        <div class="widget-body">
            <!-- start form -->
                <div class="row">
                    <div class="col-md-6">
                        <label for="information">INFORMASI - kontak kami</label>
                        <div class="form-group">
                            <a type="textarea" id="information" name="information" data-pk="<?=$information[0]->id;?>" data-placeholder="masukkan data informasi" data-name="information" data-type="textarea" data-inputclass="form-control"  data-url="<?php echo site_url('mp-admin/informasi/information-save')?>" data-value="<?=$information[0]->information;?>" data-title="masukkan informasi"><?=$information[0]->information;?></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="address">INFORMASI - alamat</label>
                        <div class="form-group">
                            <a type="textarea" id="address" name="address" data-pk="<?=$information[0]->id;?>" data-placeholder="masukkan data alamat" data-name="address" data-type="textarea" data-inputclass="form-control"  data-url="<?php echo site_url('mp-admin/informasi/address-save')?>" data-value="<?=$information[0]->address;?>" data-title="masukkan alamat"><?=$information[0]->address;?></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="phone">INFORMASI - No.tlpn/handphone</label>
                        <div class="form-group">
                            <a type="text" id="phone" name="phone" data-pk="<?=$information[0]->id;?>" data-placeholder="masukkan no.tlpn/handphone (contoh : +62877772017)" data-name="phone" data-type="text" data-inputclass="form-control"  data-url="<?php echo site_url('mp-admin/informasi/phone-save')?>" data-value="<?=$information[0]->phone_number;?>" data-title="masukkan no.tlpn/handphone"><?=$information[0]->phone_number;?></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="email">INFORMASI - email</label>
                        <div class="form-group">
                            <a type="text" id="email" name="email" data-pk="<?=$information[0]->id;?>" data-placeholder="masukkan email" data-name="email" data-type="text" data-inputclass="form-control"  data-url="<?php echo site_url('mp-admin/informasi/email-save')?>" data-value="<?=$information[0]->email_address;?>" data-title="masukkan email"><?=$information[0]->email_address;?></a>
                        </div>
                    </div>
                </div>
            <!-- form -->
        </div>
    </div>
</div>
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>