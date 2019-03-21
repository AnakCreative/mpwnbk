<!-- content datatables for this page -->
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title"><?php echo lang('deactivate_heading');?></h3>
        <p><?php echo lang('index_subheading');?></p>
    </div>
    <div class="widget-body">
        <?php echo sprintf(lang('deactivate_subheading'), $user->username);?> ?
        <br>
        <?php echo form_open("ad-min/c_alpha/deactivate/".$user->id);?>

          <p>
            <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
            <input type="radio" name="confirm" value="yes" checked="checked" />
            <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
            <input type="radio" name="confirm" value="no" />
          </p>

          <?php echo form_hidden($csrf); ?>
          <?php echo form_hidden(array('id'=>$user->id)); ?>

          <p><button class="btn btn-outline btn-primary" type="submit"><i class="ti-save"></i> simpan</button></p>

        <?php echo form_close();?>
    </div>
</div>
<!-- end content datatables for this page -->
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>