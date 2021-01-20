<?php
/**
 * Description here.
 *
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
				<div class="branding">

					<?php
					$logo = '';
					$logo .= presscore_get_the_main_logo();

					// Do not display mobile logo on mixed headers
					if ( ! presscore_header_layout_is_mixed() ) {
						$logo .= presscore_get_the_mobile_logo();
					}

					presscore_display_the_logo( $logo );
					unset( $logo );
					?>

          <div class="text-area">
            <div class="header-contact">
              <div class="header-contact__icon">
                <i class="fal fa-clock"></i>
              </div>
              <div class="header-contact__content">
                <div class="header-contact__title">zakaz@tigrard.ru</div>
                <div class="header-contact__description">WhatsApp:+7-985-923-88-85</div>
              </div>
            </div>
          </div>

          <div class="text-area">
            <div class="header-contact">
              <div class="header-contact__icon">
                <i class="fal fa-phone"></i>
              </div>
              <div class="header-contact__content">
                <div class="header-contact__title">+7 (495) 923-88-85</div>
                <div class="header-contact__description">пн.-пт. с 10-00 до 18-00</div>
              </div>
            </div>
          </div>

          <div class="callBack__wrap">
            <a class="btn btn-primary callBack__link" href="#cf7__callBack">Бесплатная консультация</a>
          </div>

				</div>
