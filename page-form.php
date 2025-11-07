<?php
/**
 * Template Name: Form Page
 * Description: Сторінка форми заявки
 * @package vashfundament
 */
get_header();
?>

<main id="primary" class="site-main">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/form.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <div class="form-wrapper">
    <h1>Залишіть заявку</h1>
    <form class="contact-form" action="<?php echo get_template_directory_uri(); ?>/send.php" method="post">
      <label>Ім'я
        <input type="text" name="name" required>
      </label>
      <label>Email
        <input type="email" name="email" required>
      </label>
      <label>Телефон
        <input type="tel" name="phone" required>
      </label>
      <label>Повідомлення
        <textarea name="message" rows="5" required></textarea>
      </label>
      <button type="submit" class="btn-send">Надіслати</button>
    </form>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-back">← Назад на головну</a>
  </div>

  <!-- reCAPTCHA -->
  <script src="https://www.google.com/recaptcha/api.js?render=6LdpLgUsAAAAAJouZnHA8VRUWS8yVTXY2eOSqDfo"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.querySelector('.contact-form');
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LdpLgUsAAAAAJouZnHA8VRUWS8yVTXY2eOSqDfo', {action: 'submit'}).then(function(token) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'recaptcha_token';
            input.value = token;
            form.appendChild(input);
            form.submit();
          });
        });
      });
    });
  </script>
</main>

<?php
get_footer();
?>
