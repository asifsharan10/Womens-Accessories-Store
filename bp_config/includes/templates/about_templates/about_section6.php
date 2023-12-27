<?php ob_start(); ?>
<div class="about_section about_section6 position-relative p-0 my50">
  <div class="container-fluid">
      <div class="row h-100 height-auto justify-content-center align-items-center">
         <div class="col-12 col-md-6 left-col h-100">.
         </div>
         <div class="col-12 col-md-6 h-100 d-flex flex-column justify-content-center">
            <div class="about-data">
               <h2><?= $updateContent['aboutUsTitle'] ?></h2>
               <p class="about-text-color-alt"><?= $updateContent['aboutUs'] ?></p>
               <a href="#products" class="btn btn-primary mt-3 arrow position-relative banner-btn-color">
                  <?= $updateContent['buttonName'] ?>
                  <img src="./img/shape1.png" alt="">
                  <img src="./img/shape2.png" alt="">
               </a>
            </div>
         </div>
         
      </div>
  </div>
</div>
<?php $sections['aboutSection'] = ob_get_clean(); ?>