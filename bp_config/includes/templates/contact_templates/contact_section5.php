<?php ob_start(); ?>
  <div class="contact-section5 overlay my50">
    <div class="contact-section-wrapper">
      <h1 class="contact-heading">
        <?= $updateContent['contactContent'] ?>
      </h1>
      <div class="contact-cards-wrapper">
        <div class="contact-card phone-card">
          <i class="fas fa-headset mx-0 mb-4"></i>
          <p class="my-0 p-0">Call Us At</p>
          <span class="phone-num m-0 p-0"><?= $generalConfig['phone_number'] ?></span>
        </div>
        <div class="contact-card email-card">
          <i class="fas fa-envelope mx-0 mb-4"></i>
          <p class="my-0 p-0">Email</p>
          <span class="email m-0 p-0"><?= $generalConfig['email'] ?></span>
        </div>
      </div>
      <div class="contact-text-wrapper">
        <a href="contact.php" class="contact-btn">
          Contact Us
        </a>
      </div>
    </div>
  </div>
<?php $sections['contactSection'] = ob_get_clean(); ?>