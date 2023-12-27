<div class="contact-page2">
    <div class="contact-heading">
        <p class="text-center"><?= $generalConfig['corp_name'] ?></p>
        <h1 class="text-center">Contact Us</h1>
        <p class="text-center">Got a question? Have some feedback to share? We'd love to hear from you!</p>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="row d-flex justify-content-center contact-contain">
            <div class="contact-head contact-head-1">
                <i class="fas fa-clock"></i>
                <p class="contact-mini-title"><b>Customer Service Hours</b></p>
                <p>Our support staff are ready to assist you <?= $generalConfig['customer_service_hours'] ?>.</p>
            </div>
            <div class="contact-head contact-head-2">
                <i class="fas fa-phone"></i>
                <p class="contact-mini-title"><b>Contact Info</b></p>
                <p><?= $generalConfig['brand_name'] ?></p>
                <p><a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a></p>
                <p><?= $generalConfig['phone_number'] ?></p>
                <p><?= $generalConfig['address'] ?></p>
            </div>
            <div class="contact-head contact-head-3">
                <i class="fas fa-undo"></i>
                <p class="contact-mini-title"><b>Returns</b></p>
                <p><?= $generalConfig['fulfillment'] ?></p>
                <p><?= $generalConfig['return_address'] ?></p>
            </div>
        </div>
    </div>
</div>