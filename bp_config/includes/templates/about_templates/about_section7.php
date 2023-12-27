<?php ob_start(); ?>
<div class="about_section7 p-0 ">

  <div class="container-fluid position-relative">
    <div class="row">
      <div class="col-12 col-sm-5 left"></div>
      <div class="col-sm-7 d-none d-sm-flex right"></div>
    </div>
    <div class="container data-container">
      <div class="row about-row">
        <div class="col-sm-6 data-left">
          <img src="./img/about.jpg" alt="">
        </div>
        <div class="col-sm-6 data-right">
          <h1 class="about-title about-text-color-alt"><?= $updateContent['aboutUsTitle'] ?></h1>
          <p class="about-text about-text-color-alt"><?= $updateContent['aboutUs'] ?></p>
          <div class="about-button banner-btn-color"><a href="shop.php"><?= $updateContent['buttonName'] ?></a></div>
        </div>
      </div>
    </div>
  </div>

</div>
<?php $sections['aboutSection'] = ob_get_clean(); ?>