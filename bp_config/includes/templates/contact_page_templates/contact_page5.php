<div class="contact-page5 d-flex flex-column align-items-center">
    <!-- <div class="contact-img">
        <img src="img/contact.jpg">
    </div> -->
    <div class="container row section5 pt-5 pb-5">
        <div class="">
            <div>
                <h1 class="contact-title text-center">Contact Us</h1>
                <p class="text-center">Got a question? Have some feedback to share? We'd love to hear from you!</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 contact-head contact-head-2">
                <div class="d-flex contact-head-icon">
                    <p class="d-flex align-items-center contact-mini-heading"><b>Contact Info</b></p>
                </div>
                <p><?= $generalConfig['brand_name'] ?></p>
                <p><?= $generalConfig['corp_name'] ?></p>
                <p><a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a></p>
                <p><?= $generalConfig['phone_number'] ?></p>
                <p><?= $generalConfig['address'] ?></p>
            </div>
            <div class="col-lg-4 contact-head contact-head-1">
                <div class="d-flex contact-head-icon">
                    <p class="d-flex align-items-center contact-mini-heading"><b>Customer Service Hours</b></p>
                </div>
                <p>Our support staff are ready to assist you <?= $generalConfig['customer_service_hours'] ?>.</p>
            </div>

            <div class="col-lg-4 contact-head contact-head-3">
                <div class="d-flex contact-head-icon">
                    <p class="d-flex align-items-center contact-mini-heading"><b>Returns</b></p>
                </div>
                <p><?= $generalConfig['fulfillment'] ?></p>
                <p><?= $generalConfig['return_address'] ?></p>
            </div>
        </div>
    </div>
</div>