<?php

/**
 *  Create elements WPBakery Page Builder
 */
add_action( 'vc_before_init', 'tigrard_add_countries' );
function tigrard_add_countries() {
  vc_map( array(
    "name" => __("Countries", "tigrard"),
    "base" => "countries",
    "as_parent" => array('only' => 'country'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "js_view" => 'VcColumnView'
  ) );

  vc_map( array(
    "name" => __("Country", "tigrard"),
    "base" => "country",
    "content_element" => true,
    "as_child" => array('only' => 'countries'),
    'show_settings_on_create' => true,
    "params" => array(
      array(
        "type" => "attach_image",
        "heading" => "Флаг",
        "param_name" => "image_id",
        "description" => "Выберите изображение флага"
      ),
      array(
        "type" => "textfield",
        "heading" => "Название страны",
        "param_name" => "name",
        'admin_label' => true,
        "value" => "",
        "description" => "Введите название страны"
      ),
      array(
        "type" => "vc_link",
        "heading" => "Ссылка",
        "param_name" => "link",
        "value" => "",
        "description" => "Введите ссылку"
      )
    )
  ) );
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_Countries extends WPBakeryShortCodesContainer {
  }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_Country extends WPBakeryShortCode {
  }
}

/**
 *  Countries Shortcode
 */

add_shortcode( 'countries', 'tigrard_countries_func' );
function tigrard_countries_func( $atts, $content ) {
 $content = do_shortcode( shortcode_unautop( $content ) );
 return "<div class='countries'>{$content}</div>";
}


add_shortcode( 'country', 'country_func' );
function country_func( $atts ) {
  extract( shortcode_atts( array(
  'image_id' => '',
  'name' => '',
  'link' => ''
  ), $atts ) );

  $link = vc_build_link( $link ); 

  $image_url = wp_get_attachment_image_src($image_id, 'full');
  $image_url = $image_url[0];

  return "<a class='countries__item' href='{$link['url']}'><img class='countries__flag' src='{$image_url}'><div class='countries__name'>{$name}</div></a>";
}
