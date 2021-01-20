<?php

/**
 *  Services Admin
 */

add_action( 'vc_before_init', 'tigrard_add_services' );
function tigrard_add_services() {
  vc_map(
    array(
      "name" => __( "Услуга", "primaria" ),
      "base" => "tigrard_services",
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
          "heading" => "Описание услуги",
          "param_name" => "content",
          "value" => "",
          "description" => "Введите описание услуги"
        )
      )
    )
  );
}

/**
 *  Шорткод
 */

add_shortcode( 'tigrard_services', 'tigrard_services_func' );

function tigrard_services_func( $atts, $content = null ) {
 extract( shortcode_atts( array(
  'id_img' => '',
  'title' => '',
 ), $atts ) );

 $url = wp_get_attachment_image_src($id_img, 'full');
 $content = wpb_js_remove_wpautop($content, true);
 return "<div class='services__item'><img src='{$url[0]}' class='services__img'><div class='services__name'>{$title}</div><div class='services__text'>{$content}</div></div>";
}
