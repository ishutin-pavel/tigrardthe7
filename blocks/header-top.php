<div class="header-top">
  <div class="container">
    <div class="header-top__inner">

    <nav id="access" class="header-top__nav" role="navigation">
      <?php wp_nav_menu( [
        'menu_class'      => 'header-top__menu',
        'theme_location'  => 'header-top-menu'
      ] ); ?>
    </nav>

    <div class="gtranslate"><?php echo do_shortcode('[GTranslate]'); ?></div>

    </div>
  </div>
</div>
