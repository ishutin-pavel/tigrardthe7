<?php
//Подключаем ядро WordPress
require_once( dirname(__FILE__) . '/../../../wp-load.php');

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

  /*
   * Задача проверить телефон
   */
  
  //Получаем телефон
  if ( isset($_POST['phone']) && $_POST['phone'] != '' )  {
    $phone = $_POST['phone'];
  } else {
    echo json_encode( array('success' => 0, 'text' => 'Не заполнено поле телефон') );
    exit;
  }
  //Обрезаем возможные пробелы
  $phone = trim($phone);
  //Удаляем из телефона лишние символы +7 (444) 444-4_-__
  $phone = str_replace( array('-','_',' ', '(', ')' ), '', $phone);
  //Проверяем длину телефона
  if ( strlen($phone) < 11 ) {
    echo json_encode( array('success' => 0, 'text' => 'Длина телефона меньше 11 символов. Пример: 89001112233') );
    exit;
  }

  //Email администратора
  //$to = get_option('admin_email');
	//$to = 'ishutin-pavel@mail.ru';
	$to = 'office@tigrard.ru';
  $message = '';

  //Имя
  if ( isset($_POST['name']) && $_POST['name'] != '' )  {
    $message .= 'Имя: ' . $_POST['name'].PHP_EOL;
  }

  //Телефон
  $message .= 'Телефон: ' . $phone.PHP_EOL;

  //Почта
  if ( isset($_POST['email']) && $_POST['email'] != '' )  {
    $message .= 'Почта: ' . $_POST['email'].PHP_EOL;
  }

  //Модель
  if ( isset($_POST['model']) && $_POST['model'] != '' )  {
    $message .= 'Модель: ' . $_POST['model'].PHP_EOL;
  }

  //Текстовое поле
  if ( isset($_POST['comment']) && $_POST['comment'] != '' )  {
    $message .= 'Сообщение: ' . $_POST['comment'].PHP_EOL;
  }

  //Страница отправки
  if ( isset($_POST['url']) && $_POST['url'] != '' )  {
    $message .= 'Страница отправки: ' . $_POST['url'];
  }

  //Формируем тему письма
  $subject = "Новая заявка с сайта - tigrard.ru";

  //Отправляем
  if(
    wp_mail( $to, $subject, $message, $headers = '', $attachments = array() )
  ) {
    echo json_encode( array('success' => 1, 'text' => 'Сообщение успешно отправлено!') );
    exit;
  } else {
    echo json_encode( array('success' => 0, 'text' => 'Данные формы небыли получены!') );
  }

}//POST

