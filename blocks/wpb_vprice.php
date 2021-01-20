<?php
/**
 *  Создание родительского элемента плагин WPBakery Page Builder
 */
add_action( 'vc_before_init', 'wpb_vprice' );
function wpb_vprice() {
  //Родительский элемент
  vc_map( array(
    "name" => "vprice",
    "base" => "vprice",
    "as_parent" => array('only' => 'vprice_tab'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "params" => array(),
    "js_view" => 'VcColumnView'
  ) );

  //Дочерний элемент
  vc_map( array(
    "name" => "vprice_tab",
    "base" => "vprice_tab",
    "content_element" => true,
    "as_child" => array('only' => 'vprice'),
    "params" => array(
      array(
        "type" => "textfield",
        "heading" => "Номер таба",
        "param_name" => "tab_number",
        "value" => "1",
        "description" => "Пронумеруйте 1, 2, 3 слева направо"
      ),
      array(
        "type" => "textarea_html",
        "holder" => "div",
        "heading" => "Содержимое вкладки",
        "param_name" => "content"
      )
    )
  ) );
}

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_vprice extends WPBakeryShortCodesContainer {
  }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_vprice_tab extends WPBakeryShortCode {
  }
}



/**
 *  Шорткод родительского элемента
 */
add_shortcode( 'vprice', 'vprice_func' );
function vprice_func( $atts, $content = null ) {
 extract( shortcode_atts( array(
  'foo' => '',
 ), $atts ) );

 $content = wpb_js_remove_wpautop($content, true);

 return "
<div class='vprice__wrapper'>
  <div class='vprice'>
      <div class='vp_r1 vprice__title'></div>
      <div class='vp_r1 vprice__title vprice__title_1'>1. Рабочая виза и разрешение на работу на 3 года<span>для высококвалифицированных сотрудников</span></div>
      <div class='vp_r1 vprice__title vprice__title_3'>2. Рабочая виза и разрешение на работу на 1 год</div>

      <div class='vp_r2 vprice__title'>Срок рабочей визы</div>
      <div class='vp_r2 vprice__title'>3 года</div>
      <div class='vp_r2 vprice__title'>1 год</div>

      <div class='vp_r3 vprice__title'>Зарплата</div>
      <div class='vp_r3 vprice__title'>не менее 167 000 руб. в мес.</div>
      <div class='vp_r3 vprice__title'>любая</div>

      <div class='vp_r4 vprice__title'>Должность</div>
      <div class='vp_r4 vprice__title'>любая</div>
      <div class='vp_r4 vprice__title'>согласно списка<br>неквотируемых должностей</div>

      <div class='vp_r5 vprice__title'>Срок оформления</div>
      <div class='vp_r5 vprice__title'>1 месяц</div>
      <div class='vp_r5 vprice__title'>3 месяца</div>

      <div class='vp_r6 vprice__title'>Стоимость оформления</div>
      <div class='vp_r6 vprice__title'>35 000 ₽</div>
      <div class='vp_r6 vprice__title'>60 000 ₽</div>

      <div class='vp_r7 vprice__key vprice__dop'>
        Дополнительно оплачиваются:<br>
        <span>
        - госпошлины<br>
        - медицинская страховка
        </span>
      </div>
      <div class='vp_r7 vprice__dop'>3 500 руб. и 800 руб.</div>
      <div class='vp_r7 vprice__dop'>10 000 руб., 3 500 руб.,<br>800 руб. и 1 600 руб.</div>

      <div class='vp_r8 vprice__btn'></div>
      <div class='vp_r8 vprice__btn'>
        <a id='vprice__more_1' class='btn vprice__more vprice__more_active' href='#'>подробнее</a>
      </div>
      <div class='vp_r8 vprice__btn'>
        <a id='vprice__more_3' class='btn vprice__more' href='#'>подробнее</a>
      </div>
  </div><!-- .vprice -->
  <div class='vprice__tabs'>{$content}</div>
</div><!-- wrapper -->";
}


/**
 *  Шорткод дочернего элемента
 */
add_shortcode( 'vprice_tab', 'vprice_tab_func' );
function vprice_tab_func( $atts,  $content = null ) {
  extract( shortcode_atts( array(
  'tab_number' => '1',
  ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true);

  return "
    <div class='vprice__tab vprice__tab_{$tab_number}'>
      <div class='vprice__tab-close'></div>
      {$content}
      <div class='vprice__tab-order'>
        <div class='vprice__btn'>
          <a class='btn btn-primary service__popup vprice__btn-link' href='#service__popup'>Оформить услугу</a>
        </div>
      </div>
    </div><!-- .vprice__tab -->
  ";
}

