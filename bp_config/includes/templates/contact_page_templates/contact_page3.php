<div class="contact-page3">
    <div class="row contact-contain">
        <div class="col-lg-4 contact-heading">
            <h1>Contact Us</h1>
            <p>Got a question? Have some feedback to share? We'd love to hear from you!</p>
            <p><?= $generalConfig['brand_name'] ?></p>
            <p><?= $generalConfig['corp_name'] ?></p>
        </div>
        <div class="col-lg-3 contact-head contact-head-1">
            <div class="contact-head-icon">
                <p class="d-flex align-items-center contact-mini-heading"><b>Customer Service Hours</b></p>
            </div>
            <p>Our support staff are ready to assist you <?= $generalConfig['customer_service_hours'] ?>.</p>
        </div>
        <div class="col-lg-3 contact-head contact-head-2">
            <div class="contact-head-icon">
                <p class="d-flex align-items-center contact-mini-heading"><b>Contact Info</b></p>
            </div>
            <p><a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a></p>
            <p><?= $generalConfig['phone_number'] ?></p>
            <p><?= $generalConfig['address'] ?></p>
        </div>
        <div class="col-lg-2 contact-head contact-head-3">
            <div class="contact-head-icon">
                <p class="d-flex align-items-center contact-mini-heading"><b>Returns</b></p>
            </div>
            <p><?= $generalConfig['fulfillment'] ?></p>
            <p><?= $generalConfig['return_address'] ?></p>
        </div>
    </div>
</div>