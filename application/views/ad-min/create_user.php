<div class="row">
    <div class="col-lg-12">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">pengaturan akun</h3>
            </div>
            <div class="widget-body">
                <br>  
                <?php if (empty($message)){ ?><?php } else { ?>  
                <div id="infoMessage" class="alert alert-info alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>    
                  <strong>info !</strong> <?=$message;?>
                </div>  
                <?php } ?> 
                <br>
                <?php echo form_open(uri_string(), array('class' => '', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                                <?php echo form_input($first_name);?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                                <?php echo form_input($last_name);?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <?=$this->lang->line('departement_field');?> <br />
                                <?php echo form_input($departement);?>
                            </div>
                        </div> -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo lang('create_user_phone_label', 'phone');?> <br />
                                <?php echo form_input($phone);?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php
                                  if($identity_column!=='email') {
                                      echo '<p>';
                                      echo lang('create_user_identity_label', 'identity');
                                      echo '<br />';
                                     // echo form_error('identity');
                                      echo form_input($identity);
                                      echo '</p>';
                                  }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo lang('create_user_email_label', 'email');?> <br />
                                <?php echo form_input($email);?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo lang('create_user_password_label', 'password');?> <br />
                                <?php echo form_input($password);?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                                <?php echo form_input($password_confirm);?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline btn-success"><i class="ti-save"></i> simpan</button>
                <?php echo form_close();?>
                    <hr>
                    <button onclick="back_to_account()" class="btn btn-outline btn-danger"><i class="ti-close"></i> batal</button>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>
<script>
/* $(function(ready){
    //input mask phone number
    $("#phone").mask("+99999-9999-9999");
}); */
</script>
