<?php ob_start(); ?>
<section class="contact-section1 p-0 my50">
  <div class="container d-flex align-items-center">
    <h1 class="contact-heading my-0">
      <?= $updateContent['contactTitle'] ?>
    </h1>
    <p class="contact-text my-0"><?= $updateContent['contactContent']; ?><span></p>
  </div>
</section>
<?php $sections['contactSection'] = ob_get_clean(); ?>