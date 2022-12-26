		<div style="display: none;" id="hidden-content">
			<?php echo do_shortcode('[contact-form-7 id="473" title="Get Free Case Evaluation"]'); ?>
		</div>
        <!--<section class="brands content-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-2 justify-content-center d-flex align-items-center">
                        <img class="img-fluid brand-img" src="/wp-content/themes/mosheslaw/assets/images/brand/featuredin4.png" alt="">
                    </div>
                    <div class="col-sm-2 justify-content-center d-flex align-items-center">
                        <img class="img-fluid brand-img" src="/wp-content/themes/mosheslaw/assets/images/brand/nolo-logo-e1516079824580.png" alt="">
                    </div>
                    <div class="col-sm-2 justify-content-center d-flex align-items-center">
                        <img class="img-fluid brand-img" src="/wp-content/themes/mosheslaw/assets/images/brand/law_360.png" alt="">
                    </div>
                    <div class="col-sm-2 justify-content-center d-flex align-items-center">
                        <img class="img-fluid brand-img" src="/wp-content/themes/mosheslaw/assets/images/brand/featuredin1.png" alt="">
                    </div>
                    <div class="col-sm-2 justify-content-center d-flex align-items-center">
                        <img class="img-fluid brand-img" src="/wp-content/themes/mosheslaw/assets/images/brand/realtor_logo.svg" alt="">
                    </div>
                    <div class="col-sm-2 justify-content-center d-flex align-items-center">
                        <img class="img-fluid brand-img" src="/wp-content/themes/mosheslaw/assets/images/brand/blf.png" alt="">
                    </div>
					 <div class="col-sm-2 justify-content-center d-flex align-items-center">
                        <img class="img-fluid brand-img" src="/wp-content/themes/mosheslaw/assets/images/brand/BDC.svg" alt="">
                    </div>
                    <div class="col-sm-2 justify-content-center d-flex align-items-center">
                        <img class="img-fluid brand-img" src="/wp-content/themes/mosheslaw/assets/images/brand/1010WINS-e1516080014979.png" alt="">
                    </div>
                    <div class="col-sm-2 justify-content-center d-flex align-items-center">
                        <img class="img-fluid brand-img" src="/wp-content/themes/mosheslaw/assets/images/brand/New_York_Post_logo.png" alt="">
                    </div>
                </div>
            </div>
        </section> --><!--
       <section class="mailchimp-one">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-xl-5">
                        <div class="mailchimp-one__content">
                            <h3 class="mailchimp-one__title">Join Our List To Stay Intouch</h3>
                            <p class="mailchimp-one__text">Stay in Touch.</p>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="mailchimp-one__form mc-form">
                            <?php echo do_shortcode('[contact-form-7 id="482" title="Join Our List To Stay Intouch"]'); ?>
                        </div>
                        <div class="mc-form__response"></div>
                    </div>
                </div>
            </div>
        </section>-->
        <div class="footer__menu">
            <ul class="footer__menu-list">
            
                <li><a href="/contact/contact-us-in-brooklyn-nyc/"><i class="fas fa-map-marker-alt"></i><span>map</span></a></li>
                <li>
                    <a href="mailto:info@mosheslaw.com">
                        <i class="far fa-envelope"></i>
                        <span>email</span>
                    </a>
                </li>
                <li><a href="tel:8884450234"><i class="fas fa-mobile-alt"></i><span>call</span></a></li>
            </ul>
        </div>
        <footer class="site-footer content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6">
                        <div class="footer-widget">
                            <div class="footer-widget__logo"><img width="300" height="62" src="/wp-content/themes/mosheslaw/assets/images/resources/logo_white_new.png" alt="Awesome Image" /></div>
                            <h3 class="footer-widget__title">Call Us</h3>
							<div><a href="tel:8884450234">888-445-0234</a></div>
                            <p class="footer-widget__text">We are here for you on evenings, weekends and holidays and will work around your schedule to defend your rights.</p><!-- /.footer-widget__text -->
                        </div><!-- /.footer-widget -->
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">Visit Us</h3><!-- /.footer-widget__title -->
                            <?php echo do_shortcode('[show_contacts id="only_address_footer"]'); ?>
                          <!--  <p class="footer-widget__text footer-widget__contact-info"><span>Helpline: </span> <a href="tel:(888) 445-0234">(888) 445-0234</a></p> /.footer-widget__text -->
                            <p class="footer-widget__text">Mon to Fri : 09:00 am - 7:00 pm <br> Sat, Sun : CLOSED</p><!-- /.footer-widget__text -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-xl-2 col-lg-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">Employment Lawyers</h3><!-- /.footer-widget__title -->
                            <?php wp_nav_menu(array('menu' => 'footer-menu1', 'theme_location' => 'footer-menu1', 'container' => false, 'items_wrap' => '<ul id="%1$s" class="footer-widget__links list-unstyled">%3$s</ul>')); ?>
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-lg-2 -->
                    <div class="col-xl-2 col-lg-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">Personal Injury Lawyers</h3><!-- /.footer-widget__title -->
							<?php wp_nav_menu(array('menu' => 'footer-menu2', 'theme_location' => 'footer-menu2', 'container' => false, 'items_wrap' => '<ul id="%1$s" class="footer-widget__links list-unstyled">%3$s</ul>')); ?>
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-lg-3 -->
                    <div class="col-xl-2 col-lg-6">
                        <div class="footer-widget footer-widget__quick-link">
                            <h3 class="footer-widget__title">Real Estate Lawyers</h3><!-- /.footer-widget__title -->
                            <?php wp_nav_menu(array('menu' => 'footer-menu3', 'theme_location' => 'footer-menu3', 'container' => false, 'items_wrap' => '<ul id="%1$s" class="footer-widget__links list-unstyled">%3$s</ul>')); ?>
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-lg-3 -->
                    <div class="col-xl-2 col-lg-6">
                        <div class="footer-widget footer-widget__quick-link">
                            <h3 class="footer-widget__title">Quick Links</h3><!-- /.footer-widget__title -->
                            <?php wp_nav_menu(array('menu' => 'footer-menu4', 'theme_location' => 'footer-menu4', 'container' => false, 'items_wrap' => '<ul id="%1$s" class="footer-widget__links list-unstyled">%3$s</ul>')); ?>
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-lg-3 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-12" style="font-size: 14px;">
                        Prior results do not guarantee a similar outcome. This Website is attorney advertisement and is for informational purposes only. The hiring of an attorney is an important decision that should not be based solely upon advertisements. Materials in Law Office of Yuriy Moshes, P.C. website have been prepared to permit you to learn more about the services we offer to clients. These materials do not, and are not intended to, constitute legal advice. Neither transmission nor receipt of such materials will create an attorney-client relationship between the sender and receiver. Users are advised not to take, or refrain from taking, any action based upon materials in this Website without consulting legal counsel.
                    </div>
                </div>
            </div><!-- /.container -->
        </footer><!-- /.site-footer -->


        <div class="site-footer__bottom">
            <div class="container">
                <p class="site-footer__copy">2021 © Law Office of Yuriy Moshes, P.C. All Rights Reserved. <a href="/privacy-policy/">Privacy Notice</a></p><!-- /.site-footer__copy -->

                <div class="site-footer__social">
                    <a href="https://www.facebook.com/ymosheslaw/" class="fab fa-facebook" target="_blank" rel="nofollow"></a>     
                    <a href="https://www.youtube.com/channel/UCeZJ0kpMD4ly5cItPSQ5UzQ" class="fab fa-youtube" target="_blank" rel="nofollow"></a>
                    <a href="https://www.instagram.com/lawofficeofyuriymoshes/" class="fab fa-instagram" target="_blank" rel="nofollow"></a>
					<a href="https://twitter.com/yuriymen" class="fab fa-twitter" target="_blank" rel="nofollow"></a>
                </div><!-- /.site-footer__social -->
            </div><!-- /.container -->
        </div><!-- /.site-footer__bottom -->
    </div><!-- /.page-wrapper -->
    <div data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></div>
	<?php wp_footer(); ?>
	<script type="text/javascript">
		setTimeout(function(){var a=document.createElement('script');a.type='text/javascript';a.async=true;a.src='https://birdeye.com/embed/webchat?account=158033025252133&ver=1&btype=1&wid=1862781535&source=0&key=tz2Am9XBXlcNqvKohnHINPPCcA6fnlg1&update=&';
		var b=document.getElementsByTagName('script')[0];b.parentNode.insertBefore(a,b);},7000);
	</script>
	<div id="bf-revz-widget-1862781535"></div>

    <link rel="stylesheet" href="/wp-content/themes/mosheslaw/new.css">
<!--<script src="/wp-content/themes/mosheslaw/assets/js/jquery3.min.js"></script>
<script src="/wp-content/themes/mosheslaw/assets/js/slick.min.js"></script>
<script>
    $(".single-slider").slick({
        slidesToShow: 3,
        arrows: true,
        infinite: false,
		dots:false,
        prevArrow: '<div class=" arrows arrow-left ">‹</div>',
        nextArrow: '<div class=" arrows arrow-right ">›</div>',
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    })
</script>-->
</body>
</html>