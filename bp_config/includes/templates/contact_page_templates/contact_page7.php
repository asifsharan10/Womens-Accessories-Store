<div class="contact-page7 d-flex flex-column align-items-center">
    <div class="contact-img">
        <div class="contact-main">
            <h1 class="contact-title">Contact Us</h1>
            <p class="contact-para">Got a question? Have some feedback to share? We'd love to hear from you!</p>
            <div class="">
                <div class="contact-head contact-head-2">
                    <i class="fas fa-tty"></i>
                    <div class="d-flex contact-head-icon">
                        <p class="d-flex align-items-center contact-mini-heading"><b>Contact Info</b></p>
                    </div>
                    <p><?= $generalConfig['brand_name'] ?></p>
                    <p><?= $generalConfig['corp_name'] ?></p>
                    <p><a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a></p>
                    <p><?= $generalConfig['phone_number'] ?></p>
                    <p><?= $generalConfig['address'] ?></p>
                </div>
                <div class="contact-head contact-head-1">
                    <i class="fas fa-hourglass-half"></i>
                    <div class="d-flex contact-head-icon">
                        <p class="d-flex align-items-center contact-mini-heading"><b>Customer Service Hours</b></p>
                    </div>
                    <p>Our support staff are ready to assist you <?= $generalConfig['customer_service_hours'] ?>.</p>
                </div>

                <div class="contact-head contact-head-3">
                    <i class="fas fa-backward"></i>
                    <div class="d-flex contact-head-icon">
                        <p class="d-flex align-items-center contact-mini-heading"><b>Returns</b></p>
                    </div>
                    <p><?= $generalConfig['fulfillment'] ?></p>
                    <p><?= $generalConfig['return_address'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>