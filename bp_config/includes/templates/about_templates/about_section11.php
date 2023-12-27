<!-- About Section Start -->
<?php ob_start(); ?>

<div class="about_section11 about_section-color p-0 my50">
   <div class="container-fluid">
      <div class="row">
         <div class="col text-center">
            <div class="about-wrapper about-data">
               <div class="about-slogan">
                  <h6><?= $updateContent['slogan'] ?></h6>
               </div>
               <div class="about-heading">
                  <h2 class="about-text-color-alt"><?= $updateContent['aboutUsTitle'] ?></h2>
               </div>
               <div class="about-text">
                  <p class="about-text-color-alt"><?= $updateContent['aboutUs'] ?></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $sections['aboutSection'] = ob_get_clean(); ?>
<!-- About Section Ends -->