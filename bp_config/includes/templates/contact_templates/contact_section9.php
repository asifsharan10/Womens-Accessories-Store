<?php ob_start(); ?>
  <div class="contact-section9 my50">
    <div class="contact-section-wrapper container">
      <p class="contact-subheading">
        <?= $updateContent['contactTitle'] ?>
      </p>
      <span class="phone-num"><?= $generalConfig['phone_number'] ?></span>
      <span class="address"><?= $generalConfig['address'] ?></span>
    </div>
    <div class="contact-bottom">
      <div class="left">
        <i class="fas fa-envelope"></i>
        <span class="email-address"><?= $generalConfig['email'] ?></span>
      </div>
    </div>
  </div>
<?php $sections['contactSection'] = ob_get_clean(); ?>