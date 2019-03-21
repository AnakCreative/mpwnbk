<!-- content datatables for this page -->
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title"><?php echo lang('index_heading');?></h3>
        <p><?php echo lang('index_subheading');?></p>
        <?php if (empty($message)){ ?><?php } else { ?>
        <div id="infoMessage" class="alert alert-info alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Info!</strong> <?=$message;?>
        </div>
        <?php } ?>
        <hr>
        <?php if ($akses[0]['add'] == 1){?>
            <!-- <button data-style="expand-left" onclick="create_group()" class="btn btn-outline btn-primary ladda-button ladda-progress"><span class="ladda-label"><i class="ti-plus"></i> <?php echo lang('index_create_group_link');?></span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 153px;"></div></button> -->
            <button data-style="expand-left" onclick="create_user()" class="btn btn-outline btn-primary ladda-button ladda-progress"><span class="ladda-label"><i class="ti-plus"></i> <?php echo lang('index_create_user_link');?></span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 153px;"></div></button>
        <?php } ?>
    </div>
    <div class="widget-body">
        <!-- <table id="grid"></table> -->
        <table id="usertablelist" cellspacing="0" width="100%" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th>nama depan</th>
                    <th>nama belakang</th>
                    <th>akun email</th>
                    <th>grup</th>
                    <th>status</th>
                    <th>foto profile</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user):?>
                <tr>
                    <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                    <td>
                        <?php foreach ($user->groups as $group):?>
                            <?php echo anchor("mp-admin/app/edit-group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                        <?php endforeach?>
                    </td>
                    <td><?php echo ($user->active) ? anchor("mp-admin/app/deactivate/".$user->id, lang('index_active_link')) : anchor("mp-admin/app/activate/". $user->id, lang('index_inactive_link'));?></td>
                    <td><img width="70px" src="<?=base_url();?>image/users/<?php if($user->image!=""){ echo $user->image; } else { echo "man.svg"; } ?>"></td>
                    <td>
                      <?php if ($akses[0]['update'] == 1){ ?>
                        <button class="btn btn-outline btn-primary" type="button" href="javascript:void()" title="edit" onclick="user_edit(<?=$user->id;?>)"><i class="ti-pencil-alt"></i></button>
                      <?php } ?>&nbsp;
                      <?php if ($akses[0]['delete'] == 1){ ?>
                        <button disabled class="btn btn-outline btn-danger" type="button" href="javascript:void()" title="delete" onclick="user_delete(<?=$user->id;?>)"><i class="ti-trash"></i></button>
                      <?php } else { ?>
                        <button class="btn btn-outline btn-danger" type="button" href="javascript:void()" title="delete" onclick="user_delete(<?=$user->id;?>)"><i class="ti-trash"></i></button>
                      <?php } ?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<!-- end content datatables for this page -->
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>