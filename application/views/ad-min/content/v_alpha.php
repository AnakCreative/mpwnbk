<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="widget text-center">
            <div class="widget-body">
                <div class="clearfix">
                    <div class="pull-left"><a href="javascript:;" class="widget-reload"><i class="ti-control-record text-muted"></i></a></div>
                    <div class="pull-right"><a href="javascript:;" class="widget-remove"><i class="ti-trash text-muted"></i></a></div>
                </div>
                <h5 class="mb-5">PESAN MASUK</h5>
                <div class="fs-36 fw-600 mb-20 counter">
                    <?=$message;?>
                </div>
                <div id="esp-comment" data-percent="<?=$message_today;?>" style="height: 140px; width: 140px; line-height: 120px; padding: 10px;" class="easy-pie-chart fs-36"><i class="ti-comment-alt text-muted"></i><canvas height="280" width="280" style="height: 140px; width: 140px;"></canvas></div>
                <div class="clearfix mt-20">
                    <div class="pull-left">
                        <div class="fs-12">hari ini</div>
                        <div class="text-success">
                            <?=$message_today;?>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="fs-12">kemarin</div>
                        <div class="text-danger">
                            <?=$message_yesterday;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget text-center">
            <div class="widget-body">
                <div class="clearfix">
                    <div class="pull-left"><a href="javascript:;" class="widget-reload"><i class="ti-control-record text-muted"></i></a></div>
                    <div class="pull-right"><a href="javascript:;" class="widget-remove"><i class="ti-trash text-muted"></i></a></div>
                </div>
                <h5 class="mb-5">PHOTO</h5>
                <div class="fs-36 fw-600 mb-20 counter">
                    <?=$photo;?>
                </div>
                <div id="esp-photo" data-percent="<?=$photo_today;?>" style="height: 140px; width: 140px; line-height: 120px; padding: 10px;" class="easy-pie-chart fs-36"><i class="ti-image text-muted"></i><canvas height="280" width="280" style="height: 140px; width: 140px;"></canvas></div>
                <div class="clearfix mt-20">
                    <div class="pull-left">
                        <div class="fs-12">hari ini</div>
                        <div class="text-danger">
                            <?=$photo_today;?>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="fs-12">kemarin</div>
                        <div class="text-success">
                            <?=$photo_yesterday;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget text-center">
            <div class="widget-body">
                <div class="clearfix">
                    <div class="pull-left"><a href="javascript:;" class="widget-reload"><i class="ti-control-record text-muted"></i></a></div>
                    <div class="pull-right"><a href="javascript:;" class="widget-remove"><i class="ti-trash text-muted"></i></a></div>
                </div>
                <h5 class="mb-5">ALUMNI</h5>
                <div class="fs-36 fw-600 mb-20 counter">
                    <?=$alumni;?>
                </div>
                <div id="esp-user" data-percent="<?=$alumni_today;?>" style="height: 140px; width: 140px; line-height: 120px; padding: 10px;" class="easy-pie-chart fs-36"><i class="ti-user text-muted"></i><canvas height="280" width="280" style="height: 140px; width: 140px;"></canvas></div>
                <div class="clearfix mt-20">
                    <div class="pull-left">
                        <div class="fs-12">hari ini</div>
                        <div class="text-success">
                            <?=$alumni_today;?>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="fs-12">kemarin</div>
                        <div class="text-danger">
                            <?=$alumni_yesterday;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget text-center">
            <div class="widget-body">
                <div class="clearfix">
                    <div class="pull-left"><a href="javascript:;" class="widget-reload"><i class="ti-control-record text-muted"></i></a></div>
                    <div class="pull-right"><a href="javascript:;" class="widget-remove"><i class="ti-trash text-muted"></i></a></div>
                </div>
                <h5 class="mb-5">POSTING</h5>
                <div class="fs-36 fw-600 mb-20 counter">
                    <?=$posting;?>
                </div>
                <div id="esp-feedback" data-percent="<?=$posting_today;?>" style="height: 140px; width: 140px; line-height: 120px; padding: 10px;" class="easy-pie-chart fs-36"><i class="ti-receipt text-muted"></i><canvas height="280" width="280" style="height: 140px; width: 140px;"></canvas></div>
                <div class="clearfix mt-20">
                    <div class="pull-left">
                        <div class="fs-12">hari ini</div>
                        <div class="text-success">
                            <?=$posting_today;?>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="fs-12">kemarin</div>
                        <div class="text-success">
                            <?=$posting_yesterday;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-6">
        <div class="widget no-border">
            <div style="height: 160px" class="overlay-container overlay-color"><img src="<?=base_url();?>assets/back-end/build/images/backgrounds/47.jpg" alt="" class="overlay-bg img-responsive"></div>
            <div class="bd-l bd-r bd-b">
                <div style="position: relative; padding-left: 140px; padding-top: 20px"><a href="widgets.html#" style="position: absolute; top: -40px; left: 20px; border-radius: 50%; padding: 3px; background-color: #FFF"><img src="<?=base_url();?>image/users/man.svg" alt="" class="img-circle" width="100"></a>
                    <h4 class="mt-0 mb-5">
                        <?=$this->session->userdata('first_name');?>
                    </h4>
                    <p class="text-success">Administrator</p>
                </div>
                <div class="p-20 pt-0">
                    <p>
                        <?=$description;?>
                    </p><a href="<?=base_url();?>ad-min/c_alpha/edit_user/<?=$this->session->userdata('user_id');?>" class="btn btn-outline btn-success btn-block">PROFILE</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">recent activities</h3>
            </div>
            <div class="widget-body">
                <ul class="activity-list activity-sm list-unstyled mb-0">
                    <?php foreach ($activities_data as $list) { ?>
                    <li class="activity-purple">
                        <time datetime="2015-12-10T20:50:48+07:00" class="fs-12 text-muted"><?=$list->date;?>/<?=$list->time;?></time>
                        <p class="mt-10 mb-0">
                            <?=$list->aktifitas;?>
                        </p>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="widget no-border p-30 bg-primary">
            <div class="media">
                <div class="media-left media-middle pr-20"><i class="ti-settings fs-100"></i></div>
                <div class="media-body">
                    <ul class="list-unstyled fs-12 mb-0">
                        <li class="pt-5 pb-5">
                            <div class="block clearfix mb-5"><span class="pull-left">CPU usage</span><span class="pull-right"><?=$cpu_load;?></span></div>
                            <div class="progress progress-xs bg-light mb-0">
                                <!-- <div role="progressbar" data-transitiongoal="65" class="progress-bar progress-bar-white" style="width: 100%;" aria-valuenow="100"></div> -->
                            </div>
                        </li>
                        <li class="pt-5 pb-5">
                            <div class="block clearfix mb-5"><span class="pull-left">physical memory</span><span class="pull-right"><?php
function convert($size)
{
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}

echo convert(memory_get_usage(true)); // 123 kb
?></span></div>
                            <div class="progress progress-xs bg-light mb-0">
                                <!-- <div role="progressbar" data-transitiongoal="80" class="progress-bar progress-bar-white" style="width: 100%;" aria-valuenow="100"></div> -->
                            </div>
                        </li>
                        <li class="pt-5 pb-5">
                            <div class="block clearfix mb-5"><span class="pull-left">swap memory</span><span class="pull-right"><?php echo memory_get_usage() . "\n"; ?></span></div>
                            <div class="progress progress-xs bg-light mb-0">
                                <!-- <div role="progressbar" data-transitiongoal="80" class="progress-bar progress-bar-white" style="width: 80%;" aria-valuenow="80"></div> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="widget no-border p-30 bg-black">
            <div class="media">
                <div class="media-left media-middle pr-20"><i class="ti-harddrives fs-100"></i></div>
                <div class="media-body">
                    <ul class="list-unstyled fs-12 mb-0">
                        <li class="pt-5 pb-5">
                            <div class="block clearfix mb-5"><span class="pull-left">HDD (C:\)</span><span class="pull-right"><?php 
    $bytes = disk_free_space("."); 
    $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    echo $bytes . '<br />';
    echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br />';
?></span></div>
                            <div class="progress progress-xs bg-light mb-0">
                                <!-- <div role="progressbar" data-transitiongoal="65" class="progress-bar progress-bar-white" style="width: 65%;" aria-valuenow="65"></div> -->
                            </div>
                        </li>
                        <!-- <li class="pt-5 pb-5">
                            <div class="block clearfix mb-5"><span class="pull-left"><?php print `uname -v`; ?></span></div>
                            <div class="progress progress-xs bg-light mb-0">
                                <div role="progressbar" data-transitiongoal="80" class="progress-bar progress-bar-white" style="width: 80%;" aria-valuenow="80"></div>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="<?=base_url();?>assets/back-end/build/js/page-content/dashboard/index.js"></script> -->
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>