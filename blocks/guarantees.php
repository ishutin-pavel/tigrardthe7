<?php

/**
 *  Guarantees Admin
 */

add_action( 'vc_before_init', 'tigrard_add_guarantees' );
function tigrard_add_guarantees() {
  vc_map(
    array(
      "name" => __( "Гарантия", "primaria" ),
      "base" => "tigrard_guarantees",
      "params" => array(
        array(
          "type" => "attach_image",
          "class" => "",
          "heading" => "Иконка",
          "param_name" => "id_img",
          "value" => "",
          "description" => "Выбирите иконку" 
        ),
        array(
          "type" => "textarea_html",
          "holder" => "div",
          "class" => "",
          "heading" => "Гарантия",
          "param_name" => "content",
          "value" => "",
          "description" => "Введите описание гарантии"
        )
      )
    )
  );
}

/**
 *  Шорткод
 */

add_shortcode( 'tigrard_guarantees', 'tigrard_guarantees_func' );

function tigrard_guarantees_func( $atts, $content = null ) {
 extract( shortcode_atts( array(
  'id_img' => '',
 ), $atts ) );

 $url = wp_get_attachment_image_src($id_img, 'full');
 $content = wpb_js_remove_wpautop($content, true);
 return "<div class='guarantees__item'><img src='{$url[0]}' class='guarantees__img'><div class='guarantees__text'>{$content}</div></div>";


}

