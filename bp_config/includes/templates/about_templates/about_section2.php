<?php ob_start(); ?>
<div class="about_section2 p-0 my50">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-lg">
        <div class="me-lg-5"><img src="img/about.jpg" class="img-fluid d-block mx-auto" alt=""></div>
      </div>


      <div class="col-lg">
        <div class="py-5 py-lg-0 text-center text-lg-start">
          <h2 class="title about-text-color-alt"><?= $updateContent['aboutUsTitle'] ?></h2>
          <p class="about-text-color-alt"><?= $updateContent['aboutUs'] ?></p>
        </div>
      </div>


    </div>
  </div>
</div>
<?php $sections['aboutSection'] = ob_get_clean(); ?>