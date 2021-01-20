//Goals Google Analitics
var workvisa = document.querySelector('#wpcf7-f1038-p735-o2');
workvisa.addEventListener( 'wpcf7mailsent', function( event ) {
  ga('send', 'event', 'workvisa', 'submit');
  console.log('google analitics goal - Форма рабочие визы');
}, false );

var callback = document.querySelector('#cf7__callBack');
callback.addEventListener( 'wpcf7mailsent', function( event ) {
  ga('send', 'event', 'callback', 'submit');
  console.log('google analitics goal - Обратный звонок');
}, false );
