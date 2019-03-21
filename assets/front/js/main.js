var wow=new WOW( {
    mobile: false
});

$.fn.exists = function() {
      return this.length > 0;
}

wow.init();
$(document).ready(function() {
    $('.wpb-mobile-menu').slicknav( {
        prependTo: '.navbar-header', parentTag: 'liner', allowParentLinks: true, duplicate: true, label: '', closedSymbol: '<i class="fa fa-angle-right"></i>', openedSymbol: '<i class="fa fa-angle-down"></i>',
    }
    );
    if($('a.sup-title').exists()) {
        $("a.sup-title").modalVideo();
    }
    if($('a.figures-view').exists()) {
        $("a.figures-view").modalVideo();
    }
    if($('.youtube-video-play').exists()) {
        $('.youtube-video-play').mb_YTPlayer();
    }
    if($('a.list-foto').exists()) {
      $("a.list-foto").fancybox({
				'overlayShow'	: true,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});
    }
});
$(window).on('scroll', function() {
    if($(window).scrollTop()>200) {
        $('.scrolling-navbar').addClass('top-nav-collapse');
    }
    else {
        $('.scrolling-navbar').removeClass('top-nav-collapse');
    }
}

);
$('#clients-scroller').owlCarousel( {
    items: 4, itemsTablet: 3, margin: 90, stagePadding: 90, smartSpeed: 450, itemsDesktop: [1199, 4], itemsDesktopSmall: [980, 3], itemsTablet: [768, 3], itemsTablet: [767, 2], itemsTabletSmall: [480, 2], itemsMobile: [479, 1],
}

);
$('#color-client-scroller').owlCarousel( {
    items: 4, itemsTablet: 3, margin: 90, stagePadding: 90, smartSpeed: 450, itemsDesktop: [1199, 4], itemsDesktopSmall: [980, 3], itemsTablet: [768, 3], itemsTablet: [767, 2], itemsTabletSmall: [480, 2], itemsMobile: [479, 1],
}

);
$('#testimonial-item').owlCarousel( {
    autoPlay: 5000, items: 3, itemsTablet: 3, margin: 90, stagePadding: 90, smartSpeed: 450, itemsDesktop: [1199, 4], itemsDesktopSmall: [980, 3], itemsTablet: [768, 3], itemsTablet: [767, 2], itemsTabletSmall: [480, 2], itemsMobile: [479, 1],
}

);
$('#testimonial-dark').owlCarousel( {
    autoPlay: 5000, items: 3, itemsTablet: 3, margin: 90, stagePadding: 90, smartSpeed: 450, itemsDesktop: [1199, 4], itemsDesktopSmall: [980, 3], itemsTablet: [768, 3], itemsTablet: [767, 2], itemsTabletSmall: [480, 2], itemsMobile: [479, 1],
}

);
$('#single-testimonial-item').owlCarousel( {
    singleItem: true, autoPlay: 5000, items: 1, itemsTablet: 1, margin: 90, stagePadding: 90, smartSpeed: 450, itemsDesktop: [1199, 4], itemsDesktopSmall: [980, 3], itemsTablet: [768, 3], itemsTablet: [767, 2], itemsTabletSmall: [480, 2], itemsMobile: [479, 1], stopOnHover: true,
}

);
$("#image-carousel").owlCarousel( {
    autoPlay: 3000, items: 4, itemsDesktop: [1170, 3], itemsDesktopSmall: [1170, 3]
}

);
$("#carousel-image-slider").owlCarousel( {
    navigation: false, slideSpeed: 300, paginationSpeed: 400, singleItem: true, pagination: false, autoPlay: 3000,
}

);
$(document).ready(function() {
    $('#carousel-about-us').owlCarousel( {
        navigation: true, navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'], slideSpeed: 800, paginationSpeed: 400, autoPlay: true, singleItem: true, pagination: false, items: 1, itemsCustom: false, itemsDesktop: [1199, 4], itemsDesktopSmall: [980, 3], itemsTablet: [768, 2], itemsTabletSmall: false, itemsMobile: [479, 1],
    }
    );
}

);
$(function() {
    $('#portfolio').mixItUp({
        animation: {
            effects: 'fade',
            duration: 700
        }
    });
}

);
$('testimonial-carousel').carousel();
$('a[data-slide="prev"]').click(function() {
    $('#testimonial-carousel').carousel('prev');
}

);
$('a[data-slide="next"]').click(function() {
    $('#testimonial-carousel').carousel('next');
}

);
jQuery(document).ready(function($) {
    $('.counter').counterUp( {
        delay: 1, time: 800
    }
    );
}

);
$('.skill-shortcode').appear(function() {
    $('.progress').each(function() {
        $('.progress-bar').css('width', function() {
            return($(this).attr('data-percentage')+'%')
        }
        );
    }
    );
}

, {
    accY: -100
}

);
var offset=200;
var duration=500;
$(window).scroll(function() {
    if($(this).scrollTop()>offset) {
        $('.back-to-top').fadeIn(400);
    }
    else {
        $('.back-to-top').fadeOut(400);
    }
}

);
$('.back-to-top').click(function(event) {
    event.preventDefault();
    $('html, body').animate( {
        scrollTop: 0
    }
    , 600);
    return false;
});

//START SHOW MORE//
$('#foto_alumni').on('click','.show',function(){
    var offset = $(this).attr('data_offset');
    $('.spinner').show();
    $.ajax({
        type:'GET',
        dataType: "JSON",
        url:base_url+'ajax/more_foto_alumni/'+offset,
        success:function(data){
          if(data.status == true)
            setTimeout(function() {
              $('.block').append(data.foto);
              $('.show').attr('data_offset', data.offset);
              if(data.offset >= data.total_row) {
                $('.load-more').remove('.load-more');
              } else {
                $('.spinner').hide();
              }
            }, 2000);
        }
    });
    return false;
});
$('#foto').on('click','.show',function(){
    var offset = $(this).attr('data_offset');
    $('.spinner').show();
    $.ajax({
        type:'GET',
        dataType: "JSON",
        url:base_url+'ajax/more_foto/'+offset,
        success:function(data){
          if(data.status == true)
            setTimeout(function() {
              $('.block').append(data.foto);
              $('.show').attr('data_offset', data.offset);
              if(data.offset >= data.total_row) {
                $('.load-more').remove('.load-more');
              } else {
                $('.spinner').hide();
              }
              $("a.list-foto").fancybox({
        				'overlayShow'	: true,
        				'transitionIn'	: 'elastic',
        				'transitionOut'	: 'elastic'
        			});
            }, 2000);
        }
    });
    return false;
});
$('#blog').on('click','.show',function(){
    var offset = $(this).attr('data_offset');
    $('.spinner').show();
    $.ajax({
        type:'GET',
        dataType: "JSON",
        url:base_url+'ajax/more_'+uri2+'/'+offset,
        success:function(data){
          if(data.status == true)
            setTimeout(function() {
              $('.block').append(data.posting);
              $('.show').attr('data_offset', data.offset);
              if(data.offset >= data.total_row) {
                $('.load-more').remove('.load-more');
              } else {
                $('.spinner').hide();
              }
            }, 2000);
        }
    });
    return false;
});

//END SHOW MORE//

// FORM JS //
//---------//
var formContact = $('#contactForm');
formContact.find('input, textarea').focus(function(){
  $(this).parent().removeClass('has-error');
  $(this).next().text('');
});
function recaptchaCallback() {
  formContact.find('#captchaMsg').next().text('');
};
formContact.ajaxForm({
  dataType:  'json',
  beforeSerialize: function() {
    formContact.find('button').html('<i class="fa fa-spinner fa-spin fa-lg fa-fw"></i> Processing');
    formContact.find('.help-block').text('');
  },
  beforeSubmit: function() { },
  success: function(data)
  {
    if(data.status == true){
      formContact[0].reset();
      formContact.find('button').html('<i class="fa fa-check-circle"></i> Success');
      setTimeout(function () { formContact.find('button').html('<i class="fa fa-envelope"></i> Submit'); }, 3000);
    } else {
      formContact.find('button').html('<i class="fa fa-envelope"></i> Submit');
      for (var i = 0; i < data.inputerror.length; i++)
      {
        if(data.inputerror[i] == 'g-recaptcha-response') {
          $('#captchaMsg').next().text(data.error_string[i]);
        } else {
          formContact.find('#'+data.inputerror[i]).next().text(data.error_string[i]);
        }
      }
    }
  },
  error: function (jqXHR)
  {
    console.log('An error occured: ' + jqXHR.status + ' - ' + jqXHR.statusText);
  }

});
