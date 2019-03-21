<a href="<?=base_url();?>" class="brand pull-left">
    <p style="color: white !important;">Administrator</p>
</a>
<a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>
<ul class="notification-bar list-inline pull-right">
    <li class="dropdown hidden-xs">
        <a id="dropdownMenu2" href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
            <div class="media mt-0">
                <div class="media-left avatar"><img src="<?=base_url('image/users/man.svg');?>" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                <div class="media-right media-middle pl-0">
                    <p class="fs-12 text-base mb-0">Hai,
                        <?=$this->session->userdata('first_name');?>
                    </p>
                </div>
            </div>
        </a>
        <ul aria-labelledby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown">
            <li><a href="<?=base_url('mp-admin/app/edit_user/');?><?=$this->session->userdata('user_id');?>"><i class="ti-settings mr-5"></i> pengaturan akun</a></li>
            <li><a href="<?=base_url('mp-admin/app/logout');?>"><i class="ti-power-off mr-5"></i> keluar</a></li>
        </ul>
    </li>
</ul>
