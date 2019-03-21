<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="keywords" content="<?=(empty($meta)) ? '' : $meta->meta_tag_keywords;?>">
    <meta name="description" content="<?=(empty($meta)) ? '' : $meta->meta_tag_description;?>">
    <meta name="author" content="">
    <title><?=(empty($logo)) ? '' : $logo->logo_title;?> | <?=$title;?></title>
    <link href="https://fonts.googleapis.com/css?family=Google+Sans:400,500|Roboto:300,400,500|Roboto+Mono:400,700|Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="<?=base_url();?>image/logo/<?=(empty($logo)) ? '' : $logo->favicon_picture;?>" sizes="16x16 32x32" type="image/png">

    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/front/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/front/css/modal-video.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/front/css/YTPlayer.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/front/css/jquery.fancybox-1.3.4.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/front/fonts/simple-line-icons.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/front/extras/owl/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/front/extras/owl/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/front/extras/normalize.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/front/css/main.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/front/css/slicknav.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/front/css/responsive.css?v1">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
    </script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
    </script>
    <![endif]-->
</head>

<body>
    <div class="bg" style="background:url(<?=!empty($bg) ? base_url('image/background/').$bg->image : '';?>) no-repeat; background-size:cover; background-position:center;"></div>

    <header id="header-wrap">
        <?php $this->load->view('front/layout/header_v');?>
    </header>

    <div class="wrapper" style="<?=($page == 'konsentrasi') ? 'background:unset' : '';?>">
	       <?php echo $content;?>
    </div>

    <footer>
        <?php $this->load->view('front/layout/footer_v');?>
    </footer>

    <script>
      var base_url = '<?=base_url();?>';
      var uri2 = '<?=$subpage;?>';
    </script>
    <script src="<?=base_url();?>assets/front/js/jquery-min.js"></script>
    <script src="<?=base_url();?>assets/front/js/popper.min.js"></script>
    <script src="<?=base_url();?>assets/front/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/front/js/jquery.mixitup.js"></script>
    <script src="<?=base_url();?>assets/front/js/smoothscroll.js"></script>
    <script src="<?=base_url();?>assets/front/js/wow.js"></script>
    <script src="<?=base_url();?>assets/front/js/owl.carousel.js"></script>
    <script src="<?=base_url();?>assets/front/js/waypoints.min.js"></script>
    <script src="<?=base_url();?>assets/front/js/jquery.counterup.min.js"></script>
    <script src="<?=base_url();?>assets/front/js/jquery.slicknav.js"></script>
    <script src="<?=base_url();?>assets/front/js/jquery.appear.js"></script>
    <script src="<?=base_url();?>assets/front/js/modal-video.min.js"></script>
    <script src="<?=base_url();?>assets/front/js/jquery.mb.YTPlayer.min.js"></script>
  	<script src="<?=base_url();?>assets/front/js/jquery.mousewheel-3.0.4.pack.js"></script>
  	<script src="<?=base_url();?>assets/front/js/jquery.fancybox-1.3.4.pack.js"></script>
    <script src="<?=base_url();?>assets/front/js/jquery.form.js"></script>
    <script src="<?=base_url();?>assets/front/js/main.js"></script>

</body>

</html>
