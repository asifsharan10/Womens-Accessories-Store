<?php ob_start(); ?>
  <div class="contact-section7 my50">
    <div class="contact-section-wrapper container">
      <h1 class="contact-heading">
        <?= $updateContent['contactContent'] ?>
      </h1>
      <span class="phone-num"><?= $generalConfig['phone_number'] ?></span>
      <a href="contact.php" class="contact-btn">
        Contact Us
        <i class="fal fa-long-arrow-right ms-2"></i>
      </a>
    </div>
  </div>
<?php $sections['contactSection'] = ob_get_clean(); ?>