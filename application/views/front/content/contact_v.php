<div id="map" style="height:400px;"></div>

<section class="contact-form-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-50 text-center contact-title-text wow fadeIn" data-wow-delay="0.3s" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                <h1 class="section-title">Kontak Kami</h1>
            </div>
            <div class="col-md-4 contact-info-section">
                <div class="contact-widget office-location">
                    <h2><?=!empty($logo) ? $logo->logo_title : '';?></h2>
                    <address>
                      <?=!empty($contact) ? $contact->address : '';?><br>
                      <i class="fa fa-phone icon-xs"></i><?=!empty($contact) ? $contact->phone_number : '';?><br>
                      <i class="fa fa-envelope icon-xs"></i><?=!empty($contact) ? $contact->email_address : '';?>
                    </address>
                </div>
                <div class="contact-widget social-contact">
                    <h2>Social Links</h2>
                    <a href="#"><i class="fa fa-facebook icon-round-border icon-xs"></i></a>
                    <a href="#"><i class="fa fa-twitter icon-round-border icon-xs"></i></a>
                    <a href="#"><i class="fa fa-instagram icon-round-border icon-xs"></i></a>
                    <a href="#"><i class="fa fa-youtube icon-round-border icon-xs"></i></a>
                </div>
            </div>
            <div class="col-md-7 col-md-offset-1 contact-form contact-info-section">
                <form class="shake" action="<?=base_url('ajax/contact');?>" method="post" id="contactForm">
                    <div class="form-group">
                        <label for="name" class="sr-only">Name</label>
                        <input placeholder="Your Name" id="pnjName" class="form-control contact-control" name="pnjName" type="text">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input placeholder="Your Email" id="pnjEmail" class="form-control contact-control" name="pnjEmail" type="email">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="sr-only">Message</label>
                        <textarea placeholder="Your Message" id="pnjMessage" class="form-control" name="pnjMessage"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <div id="captchaMsg">
                          <?php echo $this->recaptcha->render(); ?>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <button class="btn btn-common btn-lg disabled" type="submit" id="form-submit" style="pointer-events: all; cursor: pointer;"><i class="fa fa-envelope"></i> Submit</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function initMap() {
      var uluru = {lat: <?=!empty($location) ? $location->latitude : '';?>, lng: <?=!empty($location) ? $location->longitude : '';?>};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: uluru
      });
      var marker = new google.maps.Marker({
        position: uluru,
        map: map
      });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFRf8rAnrraHNX3QttRZ35oo_71di1K_o&callback=initMap"></script>
