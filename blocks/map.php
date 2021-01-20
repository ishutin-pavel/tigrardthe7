  <?php /* if ( is_page(66) ) { require 'order-contact-page.php'; } else { require 'order.php'; } */ ?>
  <?php require 'order.php'; ?>
<div id="yandex-map">
  <?php require 'the-contacts.php'; ?>
</div>

<script>
  jQuery(document).ready(function() {

  ymaps.ready(init);
  var myMap;

  function init(){
    myMap = new ymaps.Map("yandex-map", {
        center: [<?php echo get_option('coordinates'); ?>],
        zoom: 16,
        behaviors: [ 'multiTouch', 'drag' ],//подключаем только перетаскивание и мультикасания для телефона
        controls: ['zoomControl']
    });

    myPlacemark_1 = new ymaps.Placemark([<?php echo get_option("coordinates"); ?>], {
      hintContent: "<?php echo get_option('company_address'); ?>",
      balloonContent: "<?php echo get_option('company_address'); ?>",
      iconContent: "<?php echo bloginfo('description'); ?>"
      },
      { preset: 'islands#darkBlueStretchyIcon' }
      );

    myMap.geoObjects.add(myPlacemark_1);


    function checkWidth() {
      var windowSize = jQuery(window).width();
      if (windowSize <= 1199) {
        myMap.behaviors.disable('drag');
        // console.log("Отключили перемещение карты при нажатой левой кнопке мыши либо одиночным касанием");

        myMap.behaviors.enable('multiTouch');
        // console.log("Включили масштабирование карты двойным касанием (например, пальцами на сенсорном экране)");
      } else if (windowSize >= 1200) {
          myMap.behaviors.enable('drag');
          // console.log("Включили перемещение карты при нажатой левой кнопке мыши либо одиночным касанием");
        }
    }//checkWidth

    // Execute on load
    checkWidth();
    // Bind event listener
    jQuery(window).resize(checkWidth);

  }//init

  });//ready
</script>

