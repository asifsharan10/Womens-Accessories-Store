<div class="contact-page4 d-flex justify-content-center">
    <div class="container row section4">
        <div class="left col-lg-6">
            <div>
                <h1 class="contact-title">Contact Us</h1>
                <p>Got a question? Have some feedback to share? We'd love to hear from you!</p>
            </div>
            <div class="contact-border"></div>
            <div class="contact-head contact-head-2">
                <div class="d-flex contact-head-icon">
                    <i class="fas fa-phone-volume"></i>
                    <p class="d-flex align-items-center contact-mini-heading"><b>Contact Info</b></p>
                </div>
                <p><?= $generalConfig['brand_name'] ?></p>
                <p><?= $generalConfig['corp_name'] ?></p>
                <p><a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a></p>
                <p><?= $generalConfig['phone_number'] ?></p>
                <p><?= $generalConfig['address'] ?></p>
            </div>
        </div>
        <div class="right col-lg-6 row d-flex flex-column justify-content-center align-items-center contact-contain">
            <div class="contact-img">
                <img src="img/contact.jpg">
            </div>
            <div class="contact-head contact-head-1">
                <div class="d-flex contact-head-icon">
                    <i class="fas fa-user-clock"></i>
                    <p class="d-flex align-items-center contact-mini-heading"><b>Customer Service Hours</b></p>
                </div>
                <p>Our support staff are ready to assist you <?= $generalConfig['customer_service_hours'] ?>.</p>
            </div>

            <div class="contact-head contact-head-3">
                <div class="d-flex contact-head-icon">
                    <i class="fas fa-exchange-alt"></i>
                    <p class="d-flex align-items-center contact-mini-heading"><b>Returns</b></p>
                </div>
                <p><?= $generalConfig['fulfillment'] ?></p>
                <p><?= $generalConfig['return_address'] ?></p>
            </div>
        </div>
    </div>
</div>