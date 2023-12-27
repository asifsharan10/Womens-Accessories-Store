<?php ob_start(); ?>
  <div class="contact-section6 overlay my50">
    <div class="contact-section-wrapper container">
      <div class="contact-heading-wrapper">
        <p class="contact-subheading">
          <?= $updateContent['contactTitle'] ?>
        </p>
        <h1 class="contact-heading">
          <?= $updateContent['contactContent'] ?>
        </h1>
      </div>
      <div class="contact-btn-wrapper">
        <a href="contact.php" class="contact-btn">
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
<?php $sections['contactSection'] = ob_get_clean(); ?>