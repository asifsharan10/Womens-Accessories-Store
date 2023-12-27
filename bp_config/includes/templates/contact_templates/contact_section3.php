<?php ob_start(); ?>
  <div class="contact-section3 my50">
    <h1 class="contact-heading">
      <?= $updateContent['contactContent'] ?>
    </h1>
    <div class="contact-text-wrapper">
      <div class="contact-text">
        <i class="fas fa-headset my-0 me-2 p-0"></i>
        <p class="my-0 me-2 p-0">Call Us At:</p>
        <span class="phone-num m-0 p-0"><?= $generalConfig['phone_number'] ?></span>
      </div>
      <a href="contact.php" class="contact-btn">
        Contact Us
        <i class="fal fa-long-arrow-right ms-2"></i>
      </a>
    </div>
  </div>
<?php $sections['contactSection'] = ob_get_clean(); ?>