<footer>
    <div class="contain-fluid">
        <div class="flexRow flex">
            <div class="col">
                <h5>Discover</h5>
                <ul class="lst">
                    <?php foreach ($cats as $key => $cat) : ?>
                        <li><a href="<?= site_url('store/' . $cat->slug) ?>"><?= $cat->name ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="col">
                <h5>My Account</h5>
                <ul class="lst">
                    <?php if ($mem_data) : ?>
                        <li><a href="<?= site_url('signout') ?>">Sign out</a></li>
                        <li><a href="<?= site_url('information') ?>">Profile Settings</a></li>
                        <li><a href="<?= site_url('purchase') ?>">My Purchase</a></li>
                        <li><a href="<?= site_url('wishlist') ?>">My Wishlist</a></li>
                    <?php else : ?>
                        <li><a href="<?= site_url('signin') ?>">Sign in</a></li>
                    <?php endif ?>
                </ul>
            </div>
            <div class="col">
                <h5>About us</h5>
                <ul class="lst">
                    <li><a href="<?= site_url('about') ?>">About us</a></li>
                    <li><a href="<?= site_url('contact') ?>">Contact us</a></li>
                    <li><a href="<?= site_url('why-choose') ?>">Why Choose us</a></li>
                    <li><a href="<?= site_url('faq') ?>">FAQ's</a></li>
                    <li><a href="<?= site_url('blog') ?>">Blog Articles</a></li>
                    <li><a href="<?= site_url('educational-videos') ?>">Educational Videos</a></li>
                </ul>
            </div>
            <div class="col">
                <h5>Policies</h5>
                <ul class="lst">
                    <li><a href="<?= site_url('shipping-handling') ?>">Shipping & Handling</a></li>
                    <li><a href="<?= site_url('cookies') ?>">Cookies</a></li>
                    <li><a href="<?= site_url('return-policy') ?>">Return Policy</a></li>
                    <li><a href="<?= site_url('customer-service') ?>">Customer Service</a></li>
                    <li><a href="<?= site_url('disclaimer') ?>">Disclaimers</a></li>
                    <li><a href="<?= site_url('payment-policy') ?>">Payment Policy</a></li>
                </ul>
            </div>
            <div class="col">
                <h5>Join our mailing list</h5>
                <form action="<?= site_url('newsletter') ?>" method="post" autocomplete="off" class="frmAjax">
                    <div class="alertMsg" style="display:none"></div>
                    <label for="email">Stay up to date with the latest news and deals!</label>
                    <div class="txtGrp relative">
                        <label for="subsemail">@ your email address</label>
                        <input type="email" name="subsemail" id="subsemail" class="txtBox" required="">
                        <button type="submit" class="webBtn labelBtn">
                            <i class="fi-arrow-right fi-2x"></i>
                            <i class="spinner hidden"></i>
                        </button>
                    </div>
                </form>
                <h5>Follow us</h5>
                <ul class="social flex">
                    <?php if ($site_settings->site_instagram != '') : ?>
<!--                        <li><a href="--><?php //= makeExternalUrl($site_settings->site_instagram) ?><!--"><img src="--><?php //= base_url('assets/images/social-instagram.svg') ?><!--" alt=""></a></li>-->
                        <li><a href="https://www.instagram.com/mawkoptics/?hl=en" target="_blank"><img src="<?= base_url('assets/images/social-instagram.svg') ?>" alt=""></a></li>
                    <?php endif ?>
                    <?php if ($site_settings->site_youtube != '') : ?>
                        <li><a href="<?= makeExternalUrl($site_settings->site_youtube) ?>"><img src="<?= base_url('assets/images/social-youtube.svg') ?>" alt=""></a></li>
                    <?php endif ?>
                    <?php if ($site_settings->site_facebook != '') : ?>
<!--                        <li><a href="--><?php //= makeExternalUrl($site_settings->site_facebook) ?><!--"><img src="--><?php //= base_url('assets/images/social-facebook.svg') ?><!--" alt=""></a></li>-->
                        <li><a href="https://www.facebook.com/mawkoptics/" target="_blank"><img src="<?= base_url('assets/images/social-facebook.svg') ?>" alt=""></a></li>
                    <?php endif ?>
                    <?php if ($site_settings->site_snapchat != '') : ?>
                        <li><a href="<?= makeExternalUrl($site_settings->site_snapchat) ?>"><img src="<?= base_url('assets/images/social-snapchat.svg') ?>" alt=""></a></li>
                    <?php endif ?>
                    <?php if ($site_settings->site_twitter != '') : ?>
                        <li><a href="<?= makeExternalUrl($site_settings->site_twitter) ?>"><img src="<?= base_url('assets/images/social-twitter.svg') ?>" alt=""></a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright relative">
        <div class="contain-fluid">
            <div class="inner">
                <p>Copyright © <?= date('Y') ?> <a href="<?= site_url() ?>"><?= $site_settings->site_name ?></a>. All rights reserved.</p>
                <ul class="smLst flex">
                    <li><a href="<?= site_url('privacy-policy') ?>">Privacy Policy</a></li>
                    <li><a href="<?= site_url('terms-and-conditions') ?>">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- footer -->


<!-- Main Js -->
<script type="text/javascript" src="<?= base_url('assets/js/custom-validation.js?v-' . $site_settings->site_version) ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/main.js?v-' . $site_settings->site_version) ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom.js?v-' . $site_settings->site_version) ?>"></script>
