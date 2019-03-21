<div class="user">
  <div id="esp-user-profile" data-percent="65" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart"><img src="<?=base_url();?>image/users/man.svg" alt="" class="avatar img-circle"><span class="status bg-success"></span></div>
  <h4 class="fs-16 text-white mt-15 mb-5 fw-300"><?=$this->session->userdata('first_name');?></h4>
  <p class="mb-0 text-muted">Administrator</p>
</div>
<ul class="list-unstyled navigation mb-0">
  <?php foreach ($menu_data as $menu_data_list) { ?>
        <?php if ($menu_data_list['parent_id'] == 0) { if ($menu_data_list['link'] == 0) { ?>
  <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#<?=$menu_data_list['id'];?>" aria-expanded="false" aria-controls="collapse19" class="collapsed"><i class="<?=$menu_data_list['class'];?>"></i><span class="sidebar-title"><?=$menu_data_list['name'];?></span></a>
    <?php } } ?>
    <ul id="<?=$menu_data_list['id'];?>" class="list-unstyled collapse">
      <?php foreach($submenu_data as $submenu_data_list) { if($submenu_data_list['parent_id'] == $menu_data_list['id']) { ?>
          <li><a href="<?=base_url().$submenu_data_list['link'];?>"><?=$submenu_data_list['name'];?></a></li>
      <?php } } ?>
    </ul>
  </li>
  <?php } ?>
</ul>
