<?php ob_start(); ?>
<div class="about_section4 p-0 my50">
  <div class="about_section">
    <div class="aboutWrapper">
      <div class="about_section-block">
        <div class="row about-images">
          <div class="col-sm-12 col-md-6 mb-5"><img src="img/about1.jpg" class="img-fluid" alt="" /></div>
          <div class="col-sm-12 col-md-6"><img src="img/about2.jpg" class="img-fluid" alt="" /></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $sections['aboutSection'] = ob_get_clean(); ?>