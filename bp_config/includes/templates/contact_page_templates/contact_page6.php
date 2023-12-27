<div class="contact-page6 d-flex justify-content-center">
    <div class="container row section6">
        <div class="left col-lg-6">
            <div>
                <p class="text-center">Got a question? Have some feedback to share? We'd love to hear from you!</p>
                <h1 class="contact-title text-center">Contact Us</h1>
            </div>
            <div class="contact-img">
                <img src="img/contact.jpg">
            </div>
        </div>
        <div class="right col-lg-6 row contact-contain">
            <div class="contact-head contact-head-1">
                <div class="d-flex contact-head-icon">
                    <p class="d-flex align-items-center contact-mini-heading"><b>Customer Service Hours</b></p>
                </div>
                <p>Our support staff are ready to assist you <?= $generalConfig['customer_service_hours'] ?>.</p>
            </div>
            <div class="contact-head contact-head-2">
                <div class="d-flex contact-head-icon">
                    <p class="d-flex align-items-center contact-mini-heading"><b>Contact Info</b></p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <p><a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a></p>
                        <p><?= $generalConfig['phone_number'] ?></p>
                        <p><?= $generalConfig['address'] ?></p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $generalConfig['brand_name'] ?></p>
                        <p><?= $generalConfig['corp_name'] ?></p>
                    </div>
                </div>
            </div>
            <div class="contact-head contact-head-3">
                <div class="d-flex contact-head-icon">
                    <p class="d-flex align-items-center contact-mini-heading"><b>Returns</b></p>
                </div>
                <p><?= $generalConfig['fulfillment'] ?></p>
                <p><?= $generalConfig['return_address'] ?></p>
            </div>
        </div>
    </div>
</div>