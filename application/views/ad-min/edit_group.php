<!-- content datatables for this page -->
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title"><?php echo lang('edit_group_heading');?></h3>
        <p><?php echo lang('edit_group_subheading');?></p>
    </div>
    <div class="widget-body">
    <div id="infoMessage"><?php echo $message;?></div>
    <br>    
    <?php echo form_open(current_url());?>

          <p>
                <?php echo lang('edit_group_name_label', 'group_name');?> <br />
                <?php echo form_input($group_name);?>
          </p>

          <p>
                <?php echo lang('edit_group_desc_label', 'description');?> <br />
                <?php echo form_input($group_description);?>
          </p>

          <p><button class="btn btn-outline btn-primary" type="submit"><i class="ti-save"></i> simpan</button></p>

    <?php echo form_close();?>
    <hr>
    <button onclick="back_to_account()" class="btn btn-outline btn-danger "><i class="ti-close"></i> batal</button>
    </div>
</div>
<!-- end content datatables for this page -->
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>