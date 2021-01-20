<?php

add_action( 'vc_before_init', 'visa_type_admin' );
function visa_type_admin() {
  vc_map(
    array(
      "name" => "Тип визы",
      "base" => "visa_type",
      "params" => array(
        array(
          "type" => "textfield",
          "heading" => "Иконка",
          "param_name" => "icon",
          "value" => "",
          "description" => "Иконка fontawesome"
        ),
        array(
          "type" => "dropdown",
          "heading" => "Тип иконки",
          "param_name" => "type",
          "value" => array('fas','far','fal','fad'),
          "description" => "Тип иконки fontawesome"
        ),
        array(
          "type" => "textfield",
          "heading" => "Заголовок",
          "param_name" => "title",
          "value" => "",
          "admin_label" => true,
          "description" => "Введите заголовок"
        ),
        array(
          "type" => "vc_link",
          "heading" => "Ссылка",
          "param_name" => "link",
          "value" => "",
          "description" => "Введите ссылку"
        )
      )
    )
  );
}

add_shortcode( 'visa_type', 'visa_type_func' );
function visa_type_func( $atts ) {
 extract( shortcode_atts( array(
  'icon' => 'fa-address-book',
  'type' => 'far',
  'title' => '',
  'link' => '#'
 ), $atts ) );

 $link = vc_build_link( $link ); 

 return "<a class='visa-type' href='{$link['url']}'><div class='visa-type__icon'><i class='{$type} {$icon}'></i></div><div class='visa-type__name'>{$title}</div></a>";
}


