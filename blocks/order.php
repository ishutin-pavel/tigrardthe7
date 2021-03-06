<div class="order__wrap">
  <div class="container">
    <div class="order">
      <h2 class="order__title">Оставить заявку на консультацию</h2>
      <div class="order__description">Специалист свяжется с вами в течении 15 минут</div>
      <form class="order-form" action="javascript();">
        <div class="order-form__items">
          <div class="order-form__item">
            <input type="text" name="name" placeholder="Имя" required>
          </div>
          <div class="order-form__item">
            <input type="tel" name="phone" placeholder="Телефон" required>
          </div>
          <div class="order-form__item">
            <input class="btn btn-primary order-form__submit" type="submit" value="Отправить заявку">
          </div>
        </div><!-- .items -->
        <div class="alert order-form__message hidden" style="display: none;" role="alert"></div>
        <input type='hidden' name='url' value='<?php echo get_permalink(); ?>'>
      </form>
    </div><!-- .container -->
  </div><!-- .order -->
</div><!-- .container -->
<script>
jQuery(document).ready(function() {

//Убираем красную обводку у поля телефона при клике на поле
jQuery(".order-form input[name='phone']").on('click', function(event) {
  jQuery(this).css('border', '1px solid gray');
});

//Убираем красную обводку у поля телефона при вводе
jQuery(".order-form input[name='phone']").keypress(function() {
  jQuery(this).css('border', '1px solid gray');
});

//Отправляем форму
jQuery(".order-form").submit(function() {
  var form = jQuery(this);
  var phone = jQuery(this).find('input[name="phone"]');
  var message = jQuery(this).find('.order-form__message');
	var btn = jQuery(this).find('.btn');

  if ( phone.val() == "") {
    message.fadeIn(300).addClass('alert-danger').text('Введите Ваш телефон');
    phone.css('border', '1px solid red').focus();
  } else {
		//отключаем кнопку
    btn.attr("disabled", true);
		message.fadeIn(300).removeClass('alert-danger').addClass('alert-info').text( 'Отправляем...' );
    jQuery.ajax({
      type: "POST",
      url: "/wp-content/themes/dt-the7/mail.php",
      data: form.serialize(),
      success: function ( response ) {
        var jsonData = JSON.parse(response);
        if (jsonData.success == "1") {
          message.fadeIn(300).removeClass('alert-danger alert-info').addClass('alert-success').text( jsonData.text );
					//включаем кнопку
          btn.removeAttr("disabled");
        }
        else {
          message.fadeIn(300).removeClass('alert-danger alert-info').addClass('alert-danger').text( jsonData.text );
					//включаем кнопку
          btn.removeAttr("disabled");
        }
      }
    });
  }//if
return false;
});


});//ready
</script>
