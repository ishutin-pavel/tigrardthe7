<?php

/**
 *  Advantages Admin
 */

add_action( 'vc_before_init', 'tigrard_add_advantage' );
function tigrard_add_advantage() {
  vc_map(
    array(
      "name" => "Преимущество",
      "base" => "tigrard_advantage",
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
          "type" => "textfield",
          "heading" => "Заголовок",
          "param_name" => "title",
          "value" => "",
          "description" => "Введите заголовок"
        ),
        array(
          "type" => "textarea_html",
          "holder" => "div",
          "class" => "",
          "heading" => "Гарантия",
          "param_name" => "content",
          "value" => "",
          "description" => "Введите описание преимущества"
        )
      )
    )
  );
}

/**
 *  Shortcode
 */

add_shortcode( 'tigrard_advantage', 'tigrard_advantage_func' );

function tigrard_advantage_func( $atts, $content = null ) {
 extract( shortcode_atts( array(
  'id_img' => '',
 ), $atts ) );

 $url = wp_get_attachment_image_src($id_img, 'full');
 $content = wpb_js_remove_wpautop($content, true);
 return "<div class='advantage__item'><img src='{$url[0]}' class='advantage__img'><div class='advantage__content'><div class='advantage__text'>{$content}</div></div></div>";
}

