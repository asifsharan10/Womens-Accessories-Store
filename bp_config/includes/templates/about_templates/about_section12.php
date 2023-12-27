<!-- About Section Start -->
<?php ob_start(); ?>

<div class="about_section12 container-fluid images p-0 my50">
   <div class="images-wrapper d-flex flex-column flex-md-row ">
      <div class="left-img w-100 w-md-50">
         <img src="img/about1.jpg" class="img-fluid" alt="" />
      </div>
      <div class="right-img w-100 w-md-50">
         <img src="img/about2.jpg" class="img-fluid" alt="" />
      </div>
   </div>
</div>

<?php $sections['aboutSection'] = ob_get_clean(); ?>
<!-- About Section Ends -->