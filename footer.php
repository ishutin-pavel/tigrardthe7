<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the <div class="wf-container wf-clearfix"> and all content after
 *
 * @package vogue
 * @since 1.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( presscore_is_content_visible() ): ?>

			</div><!-- .wf-container -->
		</div><!-- .wf-wrap -->
	</div><!-- #main -->

	<?php
	if ( presscore_config()->get( 'template.footer.background.slideout_mode' ) ) {
		echo '</div>';
	}

	do_action( 'presscore_after_main_container' );
	?>

<?php endif; // presscore_is_content_visible ?>

	<a href="#" class="scroll-top"></a>

</div><!-- #page -->

<?php 
  if( is_front_page() ) {
    require 'blocks/sale.php';
  }
?>
<?php require 'blocks/map.php'; ?>

<footer class="site-footer">
  <?php if ( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ) : ?>
    <div class="footer-t">
      <div class="container">
        <div class="row">

          <?php
              if ( is_active_sidebar( 'footer-one' ) ) {
                echo '<div class="col footer-one">';
                  dynamic_sidebar( 'footer-one' ); 
                echo '</div>';
              }

            if ( is_active_sidebar( 'footer-two' ) ) {
              echo '<div class="col footer-two">';
                dynamic_sidebar( 'footer-two' ); 
              echo '</div>';
            }

            if ( is_active_sidebar( 'footer-three' ) ) {
              echo '<div class="col footer-three">';
                dynamic_sidebar( 'footer-three' ); 
              echo '</div>';
            }

            if ( is_active_sidebar( 'footer-four' ) ) {
              echo '<div class="col footer-four">';
                dynamic_sidebar( 'footer-four' ); 
              echo '</div>';
            }

            if ( is_active_sidebar( 'footer-five' ) ) {
              echo '<div class="col footer-five">';
                dynamic_sidebar( 'footer-five' ); 
              echo '</div>';
            }
          ?>
        </div><!-- .row -->
      </div><!-- .container -->
      <div class="footer-copyright">
        <div class="container">© ТИГРАРД / Все права защищены.</div>
      </div>
    </div><!-- .footer-t -->
  <?php endif; ?>
</footer>

<?php if(is_page(735)) { ?>
<script>
//Goals Google Analitics
var workvisa = document.querySelector('#wpcf7-f1038-p735-o2');
workvisa.addEventListener( 'wpcf7mailsent', function( event ) {
  ga('send', 'event', 'workvisa', 'submit');
  console.log('google analitics goal - Форма рабочие визы');
}, false );
</script>
<?php } ?>



<a class="pulse-button" href="#cbh-popup"><i class="fa fa-phone" aria-hidden="true"></i></a>

<div id="cbh-popup" class="white-popup cbh-popup mfp-hide">
    <ul>
        <li><a href="tel:+74959238885"><span class="cbh-popup__list-icon"><i class="fa fa-phone" aria-hidden="true"></i></span> Позвонить</a></li>
        <li><a href="#cf7__callBack" class="cbh-popup__callBack"><span class="cbh-popup__list-icon"><i class="fa fa-mobile" aria-hidden="true"></i></span> Заказать звонок</a></li>
        <li><a href="https://api.whatsapp.com/send?phone=79859238885"><span class="cbh-popup__list-icon"><i class="fab fa-whatsapp" aria-hidden="true"></i></span> Whatsapp</a></li>
    </ul>
</div>

<?php wp_footer(); ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter46428294 = new Ya.Metrika({
                    id:46428294,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/46428294" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
