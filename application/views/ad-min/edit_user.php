<div class="row">
    <div class="col-lg-12">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">pengaturan akun</h3>
            </div>
            <div class="widget-body">
                <?php echo form_open(uri_string(), array('class' => '', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
                                <?php echo form_input($first_name);?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
                                <?php echo form_input($last_name);?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo lang('edit_user_ldescription_label', 'description');?> <br />
                                <?php echo form_textarea($description);?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo lang('edit_user_email_label', 'email');?> <br />
                                <?php echo form_input($email);?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo lang('edit_user_phone_label', 'phone');?> <br />
                                <?php echo form_input($phone);?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo lang('edit_user_password_label', 'password');?> <br />
                                <?php echo form_input($password);?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                                <?php echo form_input($password_confirm);?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label><?php echo lang('edit_user_groups_heading');?></label>
                                <div>
                                <?php if ($this->ion_auth->is_admin()): ?>
                                    <?php foreach ($groups as $group):?>
                                    <?php $gID=$group['id']; $checked = null; $item = null;
                                        foreach($currentGroups as $grp) { if ($gID == $grp->id) { $checked= 'checked="checked"'; break; } } ?>
                                      <div style="margin-bottom: 7px" class="checkbox-inline checkbox-custom">
                                        <input id="<?=$group['name'];?>" type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                        <label for="<?=$group['name'];?>" class="checkbox-muted text-muted"><?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?></label>
                                      </div>
                                    <?php endforeach?>
                                <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_hidden('id', $user->id);?>
                    <?php echo form_hidden($csrf); ?>
                    <button type="submit" class="btn btn-outline btn-success"><?php echo lang('edit_user_submit_btn');?></button>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>