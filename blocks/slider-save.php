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
      ),
      array(
        "type" => "textfield",
        "heading" => "Заголовок слайда",
        "param_name" => "title",
        "value" => "",
        "description" => "Введите заголовок слайда"
      ),
      array(
        "type" => "textfield",
        "heading" => "Ссылка",
        "param_name" => "link",
        "value" => "#",
        "description" => "Укажите ссылку"
      ),
      array(
        "type" => "textarea_html",
        "holder" => "div",
        "class" => "",
        "heading" => "Описание",
        "param_name" => "content",
        "value" => "",
        "description" => "Введите описание"
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
   <div class='container'>
     <div class='row'>
       <div class='col-xl-8'></div>
       <div class='col-xl-4 tigrard-slider__dots'></div>
     </div>
   </div>
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
    appendDots: '.tigrard-slider__dots',
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });
});
</script>";
}


add_shortcode( 'single_img', 'single_img_func' );
function single_img_func( $atts, $content = null ) {
  extract( shortcode_atts( array(
  'image' => '',
  'title' => '',
  'btn' => '',
  'description' => ''
  ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true);
  $url = wp_get_attachment_image_src($image, 'full');

  return "<div class='tigrard-slider__slide'>
            <div class='container'>
              <div class='row'>
                <div class='col-lg-8'>
                  <img class='tigrard-slider__img' src='{$url[0]}'>
                </div>
                <div class='col-lg-4'>
                  <h2 class='tigrard-slider__title'>{$title}</h2>
                  <div class='tigrard-slider__description'>{$content}</div>
                  <a class='btn btn-primary tigrard-slider__description' href='{$btn}'>Подробнее</a>
                </div>
              </div>
            </div>
          </div>";
}

