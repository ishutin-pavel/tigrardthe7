<?php
/**
 * The Header for single posts.
 *
 * @package the7
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?><!DOCTYPE html>
<!--[if lt IE 10 ]>
<html <?php language_attributes(); ?> class="old-ie no-js">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php if ( presscore_responsive() ) : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php endif; ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if IE]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  <script src="//code-ya.jivosite.com/widget/DoxHgGoPUQ" async></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
do_action( 'presscore_body_top' );

$config = presscore_config();
?>

<?php get_template_part( 'blocks/header', 'top' ); ?>

<div id="page"<?php if ( 'boxed' == $config->get( 'template.layout' ) ) echo ' class="boxed"'; ?>>

<?php
if ( apply_filters( 'presscore_show_header', true ) ) {
	presscore_get_template_part( 'theme', 'header/header', str_replace( '_', '-', $config->get( 'header.layout' ) ) );
	presscore_get_template_part( 'theme', 'header/mobile-header' );
}

if ( presscore_is_content_visible() && $config->get( 'template.footer.background.slideout_mode' ) ) {
	echo '<div class="page-inner">';
}
?>
<div id="cf7__callBack" class="cf7__callBack white-popup mfp-hide"><?php echo do_shortcode( '[contact-form-7 id="949" title="Обратный звонок"]' ); ?></div>
<div id="service__popup" class="cf7__callBack white-popup mfp-hide"><?php echo do_shortcode( '[contact-form-7 id="3146" title="Заказ услуги"]' ); ?></div>
