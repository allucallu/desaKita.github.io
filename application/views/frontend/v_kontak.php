<!-- contact form start -->
<section class="contact-form-wrap section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
            <form id="contact-form" class="contact__form" method="post" action="<?php echo site_url('send-email'); ?>">
                 <!-- form message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                        </div>
                    </div>
                    <!-- end message -->
                    <h3 class="text-md mb-4">Kontak Kami</h3>
                    <div class="form-group">
                        <input name="name" type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="form-group-2 mb-4">
                        <textarea name="message" class="form-control" rows="4" placeholder="Your Message"></textarea>
                    </div>
                    <button class="btn btn-main" name="submit" type="submit">Send Message</button>
                </form>
            </div>

            <div class="col-lg-5 col-sm-12">
                <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
                    <h2 class="mb-5 mt-2">Atau hubungi kami melalui media sosial kami.</h2>

                   

                    <ul class="social-icons list-inline mt-5">
                        <li class="list-inline-item">
                            <a href="http://www.themefisher.com"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="http://www.themefisher.com"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="http://www.themefisher.com"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="http://www.themefisher.com"><i class="fab fa-whatsapp"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="http://www.themefisher.com"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="google-map">
    <div id="map"></div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkeD96RycFz2cf1vAd4a6NZyeMUzXSawA"></script>
    <script>
        var map;

        function initialize() {
            var mapOptions = {
                zoom: 13,
                center: new google.maps.LatLng(-3.6121114299145765, 120.97854253916543)
            };
            map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        }

        var google_map = $('#map_canvas');

        if (google_map.length) {
            google.maps.event.addDomListener(window, 'load', initialize);
        }
    </script>