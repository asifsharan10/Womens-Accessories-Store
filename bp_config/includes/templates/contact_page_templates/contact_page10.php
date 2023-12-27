<div class="contact-page10">
    <div class="container row contact-heading">
        <div class="col-lg-4 d-flex flex-column justify-content-center">
            <p class="brand-name"><?= $generalConfig['brand_name'] ?></p>
        </div>
        <div class="col-lg-4">
            <h1 class="text-center">Contact Us</h1>
            <p class="text-center">Got a question? Have some feedback to share? We'd love to hear from you!</p>
        </div>
        <div class="col-lg-4 d-flex flex-column justify-content-center">
            <p class="corp-name text-end"><?= $generalConfig['corp_name'] ?></p>
        </div>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="row contact-contain justify-content-between">
            <div class="contact-head contact-head-1">
                <div class="d-flex justify-content-center align-items-center mb-4 icon-contain">
                    <p class="contact-mini-title"><b>Customer Service Hours</b></p>
                </div>
                <div>
                    <p>Our support staff are ready to assist you <?= $generalConfig['customer_service_hours'] ?>.</p>
                </div>
            </div>
            <div class="contact-head contact-head-2">
                <div class="d-flex justify-content-center align-items-center mb-4 icon-contain">
                    <p class="contact-mini-title"><b>Contact Info</b></p>
                </div>
                <div>
                    <p><a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a></p>
                    <p><?= $generalConfig['phone_number'] ?></p>
                    <p><?= $generalConfig['address'] ?></p>
                </div>
            </div>
            <div class="contact-head contact-head-3">
                <div class="d-flex justify-content-center align-items-center mb-4 icon-contain">
                    <p class="contact-mini-title"><b>Returns</b></p>
                </div>
                <div>
                    <p><?= $generalConfig['fulfillment'] ?></p>
                    <p><?= $generalConfig['return_address'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>