<?php
/**
 * Vogue theme.
 *
 * @since 1.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since 1.0.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1200; /* pixels */
}

/**
 * Initialize theme.
 *
 * @since 1.0.0
 */
require( trailingslashit( get_template_directory() ) . 'inc/init.php' );

/**
 * Styles and Scripts
 */
function add_bootstrap_style_and_script() {
  wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
  wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/css/slick.css' );
  wp_enqueue_script( 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), '', true );
  wp_enqueue_script('inputmask', get_template_directory_uri() . '/js/jquery.inputmask.bundle.js', array('jquery'), '4.0.0', true );
  wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array('jquery'), '1.8.1', true );
  wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'), '1.8.1', true );
  wp_enqueue_script( 'api-maps-yandex', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', array('jquery'), '', true );
}
add_action ( 'wp_enqueue_scripts', 'add_bootstrap_style_and_script' );

/**
 * Widgets Init
 */
function mugu_widgets_init() {

    register_sidebar(array(
        'name' => esc_html__('Footer One', 'mugu'),
        'id' => 'footer-one',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
        ));

    register_sidebar(array(
        'name' => esc_html__('Footer Two', 'mugu'),
        'id' => 'footer-two',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
        ));

    register_sidebar(array(
        'name' => esc_html__('Footer Three', 'mugu'),
        'id' => 'footer-three',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
        ));

    register_sidebar(array(
        'name' => esc_html__('Footer Four', 'mugu'),
        'id' => 'footer-four',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
        ));

    register_sidebar(array(
        'name' => esc_html__('Footer Five', 'mugu'),
        'id' => 'footer-five',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
        ));


}
add_action('widgets_init', 'mugu_widgets_init');

// Убираем теги p в contact form 7
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/*
 * Phone Primary
 * Настройки -> Общие - Телефон первый
 * <?php echo get_option('phone_primary'); ?>
*/

function add_phone_primary() {
  add_settings_field( 'phone_primary', 'Телефон', 'admin_phone_primary', 'general' );//добавление поля
  register_setting( 'general', 'phone_primary' );//сохранение в БД
}

function admin_phone_primary() {
   echo "<input type='tel' class='regular-text' name='phone_primary' value='" . esc_attr( get_option( 'phone_primary' ) ) ."'>";
}
add_action('admin_menu', 'add_phone_primary');


/**
 * Настройки -> Общие -> Почта
 * <?php echo get_option('email_primary'); ?>
*/

function add_email_primary() {
	add_settings_field( 'email_primary', 'Почта', 'admin_email_primary', 'general' );//добавление поля
	register_setting( 'general', 'email_primary' );//сохранение в БД
}

//Вывод в админке
function admin_email_primary() {
	 echo "<input type='email' class='regular-text' name='email_primary' value='" . esc_attr( get_option( 'email_primary' ) ) ."'>";
}
add_action('admin_menu', 'add_email_primary');


/*
 * Режим работы
 * Настройки -> Общие - Режим работы
 * <?php echo get_option('work_time'); ?>
*/

function add_work_time() {
  add_settings_field( 'work_time', 'Режим работы', 'admin_work_time', 'general' );//добавление поля
  register_setting( 'general', 'work_time' );//сохранение в БД
}

function admin_work_time() {
   echo "<input type='text' class='regular-text' name='work_time' value='" . esc_attr( get_option( 'work_time' ) ) ."'>";
}
add_action('admin_menu', 'add_work_time');

/**
 * Настройки -> Общие -> Адрес
 * <?php echo get_option('company_address'); ?>
*/

function add_company_address() {
	add_settings_field( 'company_address', 'Адрес компании', 'admin_company_address', 'general' );//добавление поля
	register_setting( 'general', 'company_address' );//сохранение в БД
}

//Вывод в админке
function admin_company_address() {
	 echo "<input type='email' class='regular-text' name='company_address' value='" . esc_attr( get_option( 'company_address' ) ) ."'>";
}
add_action('admin_menu', 'add_company_address');

/**
 * Настройки -> Общие -> Координаты
 * <?php echo get_option('coordinates'); ?>
*/

function add_coordinates() {
	add_settings_field( 'coordinates', 'Координаты', 'admin_coordinates', 'general' );//добавление поля
	register_setting( 'general', 'coordinates' );//сохранение в БД
}

//Вывод в админке
function admin_coordinates() {
	 echo "<input type='email' class='regular-text' name='coordinates' value='" . esc_attr( get_option( 'coordinates' ) ) ."'>";
}
add_action('admin_menu', 'add_coordinates');

require get_template_directory() . '/blocks/guarantees.php';
require get_template_directory() . '/blocks/advantages.php';
require get_template_directory() . '/blocks/services.php';
require get_template_directory() . '/blocks/slider.php';
require get_template_directory() . '/blocks/countries.php';
require get_template_directory() . '/blocks/visa-type.php';
require get_template_directory() . '/blocks/wpb_vprice.php';

//Add custom font
function add_custom_font( $fonts ) {
  $fonts['GothamPro'] = 'GothamPro';
  $fonts['GothamPro:300'] = 'GothamPro(300)';
  $fonts['GothamPro:500'] = 'GothamPro(500)';
  $fonts['GothamPro:600'] = 'GothamPro(600)';
  $fonts['GothamPro:700'] = 'GothamPro(700)';
  $fonts['GothamPro:800'] = 'GothamPro(800)';
  $fonts['GothamPro:900'] = 'GothamPro(900)';
  return $fonts;
}
add_filter( 'presscore_options_get_safe_fonts', 'add_custom_font' ,30 , 1 );

add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
	register_nav_menu( 'header-top-menu', 'Меню в топ баре' );
}
