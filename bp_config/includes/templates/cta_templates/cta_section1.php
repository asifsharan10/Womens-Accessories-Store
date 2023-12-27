<!-- Contact Section Ends -->
<?php ob_start(); ?>
<section class="cta-section1 p-0 my50">
    <div class="container">
        <div class="outer-wrapper cta-overlay">
            <div class="heading-wrapper">
                <h4 class="cta-text"><?= $updateContent['shopTitle'] ?></h4>
                <h4 class="cta-text-alt">ALL NEW ITEMS YOU CAN GET AT GREAT VALUE</h4>
                <h6>Online Purchases Only</h6>
            </div>
            <div class="button-wrapper ms-auto">
                <a href="shop.php" class=""><?= $updateContent['buttonName'] ?></a>
            </div>
        </div>
    </div>
</section>
<?php $sections['ctaSection'] = ob_get_clean(); ?>
<!-- Contact Section Starts -->