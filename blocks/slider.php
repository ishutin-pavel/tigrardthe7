<?php

/**
 *  Создание элемента плагин WPBakery Page Builder
 */
add_action( 'vc_before_init', 'tigrard_add_slider' );
function tigrard_add_slider() {
  vc_map( array(
    "name" => __("Your Gallery", "tigrard"),
    "base" => "your_gallery",
    "as_parent" => array('only' => 'single_img'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "params" => array(
      array(
        "type" => "textfield",
        "heading" => "Слайдер для главной",
        "param_name" => "el_class",
        "description" => "Слайдер для главной"
      )
    ),
    "js_view" => 'VcColumnView'
  ) );

  vc_map( array(
    "name" => __("Gallery Image", "tigrard"),
    "base" => "single_img",
    "content_element" => true,
    "as_child" => array('only' => 'your_gallery'),
    "params" => array(
      array(
        "type" => "attach_image",
        "heading" => "Изображение слайда",
        "param_name" => "image",
        "description" => "Выберите изображение слайда"
      )
    )
  ) );
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_Your_Gallery extends WPBakeryShortCodesContainer {
  }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_Single_Img extends WPBakeryShortCode {
  }
}

/**
 *  Шорткод слайдера
 */

add_shortcode( 'your_gallery', 'tigrard_gallery_func' );
function tigrard_gallery_func( $atts, $content = null ) {
 extract( shortcode_atts( array(
  'el_class' => '',
 ), $atts ) );

 $content = wpb_js_remove_wpautop($content, true);

 return "<div class='tigrard-slider {$el_class}'>{$content}</div>
<script>
jQuery(document).ready(function() {
  jQuery('.tigrard-slider').slick({
    lazyLoad: 'ondemand',
    autoplay: true,
    autoplaySpeed: 3000,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });
});
</script>";
}


add_shortcode( 'single_img', 'single_img_func' );
function single_img_func( $atts ) {
  extract( shortcode_atts( array(
  'image' => ''
  ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true);
  $url = wp_get_attachment_image_src($image, 'full');

  return "<div class='tigrard-slider__slide'><img class='tigrard-slider__img' src='{$url[0]}'></div>";
}

