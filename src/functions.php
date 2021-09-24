<?php
add_action( 'wp_enqueue_scripts', 'estr_style' );
add_action( 'wp_footer', 'estr_scripts' );
function estr_style() {
	wp_enqueue_style( 'libs-style', get_template_directory_uri() . '/css/style.min.css');
}
function estr_scripts() {
	wp_enqueue_script( 'estr_scripts', get_template_directory_uri() .'/js/main.min.js');
}
// Регистрируем меню 
		add_action( 'after_setup_theme', function(){
			register_nav_menus( [
				'header_menu' => 'Меню в шапке',
				'footer_menu' => 'Меню в подвале'
			] );
		} );

		add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );
		function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
			if ( 'header_menu' === $args->theme_location ) {
				$classes = [ 'menu__list-item' ];
			} else {
				$classes = [];
			}
		
			return $classes;
		}
// Страница настроек

/////////////////
	////  Убираем лишнее с админки
	add_action('admin_menu', 'remove_admin_menu');
	function remove_admin_menu() {
		// remove_menu_page('options-general.php'); // Удаляем раздел Настройки	
		  remove_menu_page('tools.php'); // Инструменты
		remove_menu_page('plugins.php'); // Плагины
		// remove_menu_page('themes.php'); // Внешний вид	
		remove_menu_page('edit.php'); // Посты блога
		remove_menu_page('upload.php'); // Медиабиблиотека
		remove_menu_page('edit-comments.php'); // Комментарии	
	}
/// Удаляем Эмоджи
// `Disable Emojis` Plugin Version: 1.7.2
if( 'Отключаем Emojis в WordPress' ){

	/**
	 * Disable the emoji's
	 */
	function disable_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );    
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
		add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
	}
	add_action( 'init', 'disable_emojis' );

	/**
	 * Filter function used to remove the tinymce emoji plugin.
	 * 
	 * @param    array  $plugins  
	 * @return   array             Difference betwen the two arrays
	 */
	function disable_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		}

		return array();
	}

	/**
	 * Remove emoji CDN hostname from DNS prefetching hints.
	 *
	 * @param  array  $urls          URLs to print for resource hints.
	 * @param  string $relation_type The relation type the URLs are printed for.
	 * @return array                 Difference betwen the two arrays.
	 */
	function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {

		if ( 'dns-prefetch' == $relation_type ) {

			// Strip out any URLs referencing the WordPress.org emoji location
			$emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
			foreach ( $urls as $key => $url ) {
				if ( strpos( $url, $emoji_svg_url_bit ) !== false ) {
					unset( $urls[$key] );
				}
			}

		}

		return $urls;
	}

}
?>