<?php
/**
 * Classic header.
 *
 * @package the7
 * @since 3.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<div <?php presscore_header_class( 'masthead classic-header' ); presscore_header_inline_style(); ?> role="banner">

	<?php presscore_get_template_part( 'theme', 'header/top-bar' ); ?>

	<header class="header-bar">
		<?php presscore_get_template_part( 'theme', 'header/branding' ); ?>
	</header>

  <nav class="navigation">
    <div class="container">
      <?php presscore_get_template_part( 'theme', 'header/primary-menu' ); ?>
      <?php presscore_render_header_elements( 'near_menu_right' ); ?>
    </div>
  </nav>

</div>

<div class="mobile-contacts">
  <div class="gtranslate"><?php echo do_shortcode('[GTranslate]'); ?></div>
  <div class="text-area">
    <div class="header-contact">
      <div class="header-contact__icon">
        <i class="fal fa-phone"></i>
      </div>
      <div class="header-contact__content">
        <div class="header-contact__title">+7 (495) 923-88-85</div>
        <div class="header-contact__description">пн.-пт. с 10-00 до 18-00</div>
      </div>
    </div>
  </div>
</div>
