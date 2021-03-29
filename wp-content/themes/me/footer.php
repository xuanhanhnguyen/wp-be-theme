<!--footer-->
<footer>
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-md-8 text-center">
				<?php
				if ( is_active_sidebar( 'footer' ) ) {
					dynamic_sidebar( 'footer' );
				}
				?>
                <div class="icon-social">
                    <a href="https://www.facebook.com/" target="_blank" class="icon-social-facebook"
                       style="background-color:#4267b2;"> <i class="fa fa-facebook-f"></i>
                    </a>
                    <a href="" target="_blank" class="icon-social-twitter" style="background-color:#1da1f2;"> <i
                                class="fa fa-twitter"></i>
                    </a>
                    <a href="https://www.youtube.com/" target="_blank" title="" class="icon-social-youtube"
                       style="background-color:#ff0000;">
                        <i class="fa fa-youtube"></i>
                    </a>
                    <a href="" target="_blank" class="icon-social-linked_in" style="background-color:#0a66c2;">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
                <div class="copy-right">
                    <p>Copyright © 2021. Bản quyền thuộc về ...</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--end footer-->
</div>

<!--icon hotline-->
<div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon"
     style=" display: block;">
    <div class="phonering-alo-ph-circle"></div>
    <div class="phonering-alo-ph-circle-fill"></div>
    <div class="phonering-alo-ph-img-circle">
        <a href="tel:(+84) 0968.90.7667" class="pps-btn-img position-absolute h-100 w-100" title="Liên hệ"></a>
    </div>
</div>
<!--end icon hotline-->
</div>
<!--js-->
<script src="<?php echo get_stylesheet_directory_uri() . '/assets/vendor/jquery/jquery-3.5.1.min.js' ?>"></script>
<script src="<?php echo get_stylesheet_directory_uri() . '/assets/vendor/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js' ?>"></script>
<script src="<?php echo get_stylesheet_directory_uri() . '/assets/vendor/owl-carousel/owl.carousel.js' ?>"></script>
<script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/index.js' ?>"></script>

<?php wp_footer(); ?>
</body>
</html>