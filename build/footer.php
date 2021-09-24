
	<footer class="footer">
  <section class="footer-info">
    <div class="container">
      <div class="footer-navi">
        <div class="footer-navi__title">
          Частное проектно-строительное унитарное предприятие “ЭСТУКТУРА”
        </div>
        <div class="footer-navi__list">
          <ul>
            <li><a href="services.html">Услуги</a></li>
            <li><a href="portfolio.html">Портфолио</a></li>
            <li><a href="contact-us.html">О компании</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-contacts">
        <div class="footer-contacts__title">Контакты</div>
        <div class="footer-contacts__list">
          <a href="tel:+375447456031">+375447456031</a>
          <a href="tel:+375297459031">+375297459031</a>
          <div>
            <a href="tel:+375222770944">+375222770944</a>
            <span>тел./факс.</span>
          </div>
          <a href="mailto:estruktura-m@mail.ru">estruktura-m@mail.ru</a>
        </div>
      </div>
      <div class="footer-adress">
        <div class="footer-adress__title">Адрес</div>
        <div class="footer-adress__location">
          <span>Республика Беларусь</span>
          <span>Могилевская область</span>
          <span>г.Могилев</span>
          <span>ул. Космонавтов, 12</span>
        </div>
      </div>
      <div class="footer-socials">
        <div class="footer-socials__title">Следите за новостями</div>
        <div class="footer-socials__icons">
          <a href="https://www.instagram.com/estruktura_m/" target="_blanck"
            ><img
              src="<?php bloginfo( 'template_url' ); ?>/img/instagram_icon.webp"
              alt="Instagram"
          /></a>
          <a href="https://vk.com/estruktura" target="_blanck"
            ><img
              src="<?php bloginfo( 'template_url' ); ?>/img/vk_icon.webp"
              alt="VK"
          /></a>
          <a href="#"
            ><img
              src="<?php bloginfo( 'template_url' ); ?>/img/fb_icon.webp"
              alt="FaceBook"
          /></a>
        </div>
      </div>
    </div>
  </section>
  <section class="footer-section">
    <span>Copyright © 2021 Все права защищены</span>
  </section>
</footer>

	<div class="popup-form" id="myForm">
  <div class="popup-form__close" onclick="closeForm('myForm')">
    <img
      src="<?php bloginfo( 'template_url' ); ?>/img/close.webp"
      alt="Close"
    />
  </div>
  <div class="popup-form__title">Отправить заявку</div>
  <form action="mail.php" method="POST" id="popup">
    <div class="input-name">
      <div class="input-text">Имя</div>
      <input
        type="text"
        placeholder="Введите ваше имя "
        required="required"
        name="name"
      />
    </div>
    <div class="input-number">
      <div class="input-text">Телефон</div>
      <input
        type="text"
        name="phone"
        placeholder="Введите номер телефона"
        required="required"
      />
    </div>
    <button class="btn" type="submit">Отправить</button>
  </form>
  <img
    src="<?php bloginfo( 'template_url' ); ?>/img/callback.webp"
    alt="Оставить заявку"
    class="popup-form__img"
  />
</div>

<div class="thanks-form" id="thanks-window">
  <div class="thanks-form__close" onclick="closeForm('thanks-window')">
    <img
      src="<?php bloginfo( 'template_url' ); ?>/img/close.webp"
      alt="Close"
    />
  </div>
  <div class="thank-content">
    <div class="thanks-form__title">Спасибо! Ваш запрос отправлен!</div>
    <img
      src="<?php bloginfo( 'template_url' ); ?>/img/good.webp"
      alt="Оставить заявку"
      class="thanks-form__img"
    />
  </div>
</div>
 
<?php wp_footer(); ?>
</body>
</html>