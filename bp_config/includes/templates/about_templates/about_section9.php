<!-- About Section Starts Here -->
<?php ob_start(); ?>

<section>

  <div class="about_section about_section9 position-relative about-overlay p-0 my50">
    <div class="container">
      <div class="about-data">
        <h2 class="secondary_text_color"><?= $updateContent['aboutUsTitle'] ?></h2>
        <p class="secondary_text_color"><?= $updateContent['aboutUs'] ?></p>
        <a href="#products" class="btn btn-primary mt-3 arrow position-relative banner-btn-color">
            <?= $updateContent['buttonName'] ?>
        </a>
      </div>
    </div>
  </div>

</section>

<?php $sections['aboutSection'] = ob_get_clean(); ?>
<!-- About Section Ends Here -->