<?php
/**
 * Mobile header.
 *
 * @package the7
 * @since 3.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<div class='dt-close-mobile-menu-icon'><span></span></div>
<div class='dt-mobile-header'>
	<ul class="mobile-main-nav" role="menu">
		<?php
		if ( ! isset( $location ) ) {
			$location = ( presscore_has_mobile_menu() ? 'mobile' : 'primary' );
		}

		presscore_primary_nav_menu( $location );
		?>
		<div class="mobile-info">
        <div class="mobile-info__item">
          <a href="email:<?php echo get_option('email_primary'); ?>"><?php echo get_option('email_primary'); ?></a>
        </div>
        <div class="mobile-info__item"><?php echo get_option('work_time'); ?></div>
        <div class="mobile-info__item"><?php echo get_option('company_address'); ?></div>
        <div class="mobile-info__item"><a href="tel:<?php echo get_option('phone_primary'); ?>"><?php echo get_option('phone_primary'); ?></a></div>
    </div>
	</ul>
	<!-- <div class='mobile-mini-widgets-in-menu'></div> -->
</div>
