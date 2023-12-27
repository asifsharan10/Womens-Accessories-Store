<?php ob_start(); ?>
  <div class="contact-section10 overlay my50">
    <div class="contact-section-wrapper">
      <h1 class="contact-heading">
        <?= $updateContent['contactContent'] ?>
      </h1>
      <div class="contact-text-wrapper">
        <a href="contact.php" class="contact-btn">
          Contact Us
        </a>
      </div>
    </div>
  </div>
<?php $sections['contactSection'] = ob_get_clean(); ?>