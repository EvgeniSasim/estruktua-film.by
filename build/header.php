<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/img/favicons/favicon.svg" type="image/svg+xml" />
	<?php wp_head(); ?>
</head>
<body>
<header>
  <div class="container">
    <nav>
      <div class="navbar">
        <div class="logo">
          <a href="/">
            <img
              src="<?php bloginfo( 'template_url' ); ?>/img/logo_text.webp"
              alt="Logo"
              id="logo"
            />
          </a>
        </div>
        <div class="menu">
          <ul class="menu__list">
            <?php
            wp_nav_menu( [
            'theme_location'  =>
            'header_menu', 'menu' => '', 'container' => false, 'echo' => true,
            'fallback_cb' => 'wp_page_menu', 'items_wrap' => ' %3$s ', 'depth'
            => 1, ] ); ?>
          </ul>
        </div>
        <div class="tell">
          <ul>
            <li>
              <a href="tel:+375447456031" id="tell-first">+375(44)7456031</a>
              <ul class="tell-second">
                <li><a href="tel:+375447456031">+375(29)7459031</a></li>
                <li><a href="tel:+375447456031">+375(22)2770944</a></li>
              </ul>
            </li>
          </ul>
          <img
            src="<?php bloginfo( 'template_url' ); ?>/img/Polygon.webp"
            alt="Polygon"
          />
        </div>
        <div class="burger">
          <span></span>
        </div>
      </div>
    </nav>
  </div>
</header>
