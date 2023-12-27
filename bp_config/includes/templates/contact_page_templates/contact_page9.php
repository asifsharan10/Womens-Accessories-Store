<div class="contact-page9">
    <div class="container row contact-heading">
        <div class="col-lg-9">
            <h1>Contact Us</h1>
            <p>Got a question? Have some feedback to share? We'd love to hear from you!</p>
        </div>
        <div class="col-lg-3 d-flex flex-column justify-content-center">
            <p><?= $generalConfig['brand_name'] ?></p>
            <p><?= $generalConfig['corp_name'] ?></p>
        </div>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="row d-flex justify-content-center contact-contain">
            <div class="contact-head contact-head-1">
                <div class="icon-contain">
                    <i class="far fa-clock"></i>
                </div>
                <div>
                    <p class="contact-mini-title"><b>Customer Service Hours</b></p>
                    <p>Our support staff are ready to assist you <?= $generalConfig['customer_service_hours'] ?>.</p>
                </div>
            </div>
            <div class="contact-head contact-head-2">
                <div class="icon-contain">
                    <i class="fas fa-phone"></i>
                </div>
                <div>
                    <p class="contact-mini-title"><b>Contact Info</b></p>
                    <p><a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a></p>
                    <p><?= $generalConfig['phone_number'] ?></p>
                    <p><?= $generalConfig['address'] ?></p>
                </div>
            </div>
            <div class="contact-head contact-head-3">
                <div class="icon-contain">
                    <i class="fas fa-history"></i>
                </div>
                <div>
                    <p class="contact-mini-title"><b>Returns</b></p>
                    <p><?= $generalConfig['fulfillment'] ?></p>
                    <p><?= $generalConfig['return_address'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>