<div class="row row-0 mailbox">
    <div class="col-md-5">
        <ul class="media-list inbox">
            <li class="media">
                <div class="pull-left">
                    <div class="form-group has-feedback mb-0">
                        <?php echo form_open('mp-admin/inbox'); ?>
                        <input name="keyword" type="text" aria-describedby="inputSearchInbox" placeholder="search inbox..." class="form-control rounded"><span aria-hidden="true" class="ti-search form-control-feedback"></span><span id="inputSearchInbox" class="sr-only">(default)</span>
                        <?php echo form_close(); ?>  
                    </div>
                </div>
                <div class="pull-right">
                    <div role="toolbar" aria-label="Toolbar with button groups" class="btn-toolbar">
                        <div role="group" aria-label="First group" class="btn-group">
                            <button onclick="button_submit_delete()" type="button" class="btn btn-outline btn-default"><i class="ti-trash"></i></button>
                        </div>
                    </div>
                </div>
            </li>
            <form id="delete_message_form" method="post">
            <?php foreach ($message_data->result() as $row) { ?>
                <li class="media <?php if($row->status==1) { ?>active<?php } else if($row->status==0){ ?>read<?php } ?>">
                    <div class="checkbox-custom pull-left">
                        <input name="forms[]" id="mailboxCheckbox<?=$row->id;?>" type="checkbox" value="<?=$row->id;?>">
                        <label for="mailboxCheckbox<?=$row->id;?>"></label>
                    </div>
                    <a onclick="bttn_detail_message(<?=$row->id;?>)" href="javascript:;">
                        <!-- <div class="media-left avatar"><img src="../build/images/users/02.jpg" alt="" class="media-object img-circle"><span class="status bg-success"></span></div> -->
                        <div class="media-body">
                            <h6 class="media-heading"><?=highlight($row->name,$this->input->post('keyword'))?></h6>
                            <h6 class="title"><?=highlight($row->email,$this->input->post('keyword'))?></h6>
                            <p class="summary"><?=highlight($row->message,$this->input->post('keyword'))?></p>
                        </div>
                        <div class="media-right text-nowrap">
                            <time datetime="2015-12-10T20:50:48+07:00" class="fs-11"><?=$row->date_created;?></time>
                        </div>
                    </a>
                </li>
                <button style="display:none !important;" type="submit" onclick="submit_delete_foreach()" id="submit_delete_bttn"></button>  
            <?php } ?>
            </form>  
            <?php if(empty($row)) { ?>
                <li class="media">
                    <div class="checkbox-custom pull-left">
                        <input id="mailboxCheckbox2" type="checkbox" value="value2">
                        <label for="mailboxCheckbox2"></label>
                    </div>
                    <a href="javascript:;">
                        <!-- <div class="media-left avatar"><img src="../build/images/users/11.jpg" alt="" class="media-object img-circle"><span class="status bg-danger"></span></div> -->
                        <div class="media-body">
                            <h6 class="media-heading">mohon maaf <em>pesan</em> yang anda cari tidak ada</h6>
                        </div>
                        <div class="media-right text-nowrap">
                            <time datetime="2015-12-10T20:42:40+07:00" class="fs-11">tidak ada data</time>
                        </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    
    <div class="col-md-7">
        <?php if(empty($detail_message)) { ?>
        <?php } else { foreach ($detail_message as $row) { ?>
            <div class="single-mail">
            <div class="clearfix">
                <div class="pull-left">
                    <div class="media">
                        <div class="media-left avatar"><img src="<?=base_url();?>image/users/man.svg" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                        <div style="width:auto" class="media-body">
                            <h6 class="media-heading"><?php if($row->name==""){ echo""; } else { echo $row->name; }?></h6>
                            <p class="text-muted mb-0"><a href="#"><?php if($row->email==""){ echo""; } else { echo $row->email; }?></a> to me</p>
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <div role="toolbar" aria-label="Toolbar with button groups" class="btn-toolbar">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline btn-default">balas pesan</button>
                            <button type="button" data-toggle="dropdown" aria-expanded="false" class="btn btn-outline btn-default dropdown-toggle"><span class="caret"></span><span class="sr-only">toggle dropdown</span></button>
                            <ul role="menu" class="dropdown-menu pull-right animated fadeInDown">
                                <li><a onclick="bttn_delete_message(<?php if($row->id==""){ echo""; } else { echo $row->id; }?>)" href="javascript:;">hapus pesan ini</a></li>
                            </ul>
                        </div>
                        <div role="group" aria-label="Second group" class="btn-group">
                            <button type="button" class="btn btn-outline btn-default"><i class="ti-angle-left"></i></button>
                            <button type="button" class="btn btn-outline btn-default"><i class="ti-angle-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="fw-300"><?php if($row->name==""){ echo""; } else { echo $row->name; }?></h3>
            <p class="drop-cap">
                <?php if($row->message==""){ echo""; } else { echo $row->message; }?>
            </p>
            <hr>
            <form id="messageForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="subject" value="no-reply mpwnbk.com">
                <input type="hidden" name="replyTo" value="<?php if($row->email==""){ echo""; } else { echo $row->email; }?>">    
                <textarea name="message" id="content-message"></textarea>
                <hr>    
                <div class="text-right">
                    <button onclick="replyThis(<?php if($row->id==""){ echo""; } else { echo $row->id; }?>)" type="submit" class="btn btn-raised btn-success btn-send">kirim</button>
                </div>
            </form>    
        </div>
        <?php } } ?>
    </div>
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>