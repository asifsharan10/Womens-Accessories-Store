<?php ob_start(); ?>
  <div class="contact-section8 my50">
    <div class="background-div">
      <div class="left"></div>
      <div class="right"></div>
    </div>
    <div class="contact-section-wrapper container">
      <div class="left">
        <h1 class="contact-heading">
          <?= $updateContent['contactTitle'] ?>
        </h1>
      </div>
      <div class="right">
        <span class="phone-num"><?= $generalConfig['phone_number'] ?></span>
        <span class="email-address"><?= $generalConfig['email'] ?></span>
        <span class="address"><?= $generalConfig['address'] ?></span>
      </div>
    </div>
  </div>
<?php $sections['contactSection'] = ob_get_clean(); ?>