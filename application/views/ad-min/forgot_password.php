<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PNJ - Administrator</title>
    <link rel="shortcut icon" href="<?=base_url();?>image/logo/logopnj.ico">    
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("assets/back-end/");?>/plugins/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="<?=base_url("assets/back-end/");?>/plugins/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("assets/back-end/");?>/plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("assets/back-end/");?>/plugins/themify-icons/themify-icons.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("assets/back-end/");?>/build/css/fourth-layout.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://--> 
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-image: url('<?=base_url('assets/backend/');?>/build/images/backgrounds/login-bg.png')" class="body-bg-full v3">
    <div class="container page-container">
      <div class="page-content">
        <div class="main-content">
          <div class="v3">
            <div class="logo"><img src="<?=base_url('image/logo/');?>/logo-sm-pnj.png" alt="" width="140"></div>
            <p class="text-muted"><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
            <?php echo form_open("mp-admin/app/forgot-password");?>
              <div class="form-group">
                <label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
                <?php echo form_input($identity);?>
              </div>
              <button type="submit" style="width: 130px" class="btn btn-primary btn-rounded">reset</button>
            <?php echo form_close();?>
              <br>
            <?php if (empty($message)){ ?><?php } else { ?>
             <div id="infoMessage" class="alert alert-info alert-dismissable">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>info !</strong> <?=$message;?>
             </div>
            <?php } ?>    
          </div>  
        </div>
        <div class="sub-content">
          <ul class="text-white activity-list list-unstyled mb-0">
            <?php foreach ($activities_data as $list) { ?>  
            <li class="activity-white">
              <div class="media">
                <div class="media-left">
                  <time datetime="<?=$list->date;?>T<?=$list->time;?>+07:00" class="fs-30 fw-500"><?=$list->time;?><!-- <span class="fs-14">PM</span> --></time>
                </div>
                <div class="media-body">
                  <h5 class="media-heading"><?=$list->user_name;?></h5>
                  <p><?=$list->aktifitas;?></p>
                </div>
              </div>
            </li>
            <?php } ?>  
          </ul>
        </div>
      </div>
    </div>
    <!-- jQuery-->
    <script type="text/javascript" src="<?=base_url("assets/back-end/");?>/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript">
        var base_url = "<?=base_url('back-end/admin/');?>";
        var logout = "<?=base_url('back-end/admin/logout');?>";
        var asset_url = "<?=base_url('assets/backend/');?>";
    </script>  
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="<?=base_url("assets/back-end/");?>/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="<?=base_url("assets/back-end/");?>/build/js/fourth-layout/extra-demo.js"></script>
  </body>
</html>