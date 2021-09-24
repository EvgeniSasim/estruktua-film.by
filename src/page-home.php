<?php
get_header();
?>
	@@include('components/bem-blocks/_home-sections.html')
	@@include('components/bem-blocks/_advantage.html')
	@@include('components/bem-blocks/_home-servises.html')
	@@include('components/bem-blocks/_best-videos.html')
	@@include('components/bem-blocks/_reviews.html')
	@@include('components/bem-blocks/_faq-&-news.html')
	@@include('components/bem-blocks/_home-feedback.html')
  <script src="<?php bloginfo( 'template_url' ); ?>/js/swiper-bundle.min.js"></script>
  <script>
	  /// слайдер
const swiper = new Swiper(".swiper", {
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
  </script>

<?php
get_footer();