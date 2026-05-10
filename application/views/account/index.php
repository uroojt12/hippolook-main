<!doctype html>
<html>

<head>
    <title>My Account — <?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common dash>


        <section id="dash">
            <div class="contain">
                <?= showMsg() ?>
                <div class="topBlk">
                    <div class="blk icoBlk">
                        <h3> <span class="regular">Welcome,</span> Dear, <?= format_name($mem_data->mem_fname, $mem_data->mem_lname) ?>! <span class="regular">Nice to see you again.</span></h3>
                        <div class="bTn formBtn">
                            <a href="<?= site_url('information') ?>" class="webBtn smBtn simpleBtn">Edit Info</a>
                        </div>
                    </div>
                    <div class="blk cardBlk">
                        <ul class="blkLst text-center">
                            <li>
                                <a href="<?= site_url('purchase') ?>">
                                    <strong><?= $total_purchase?></strong>
                                    <span>Purchase</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="<?= site_url('coupons') ?>">
                                    <strong>0</strong>
                                    <span>Coupons</span>
                                </a>
                            </li> -->
                            <li>
                                <a href="<?= site_url('wishlist') ?>">
                                    <strong><?= $total_favorites?></strong>
                                    <span>Favorites</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flexRow flex">
                    <div class="col">
                        <div class="inner">
                            <div class="icon"><img src="<?= base_url('assets/images/icon-pencil.svg') ?>" alt=""></div>
                            <div class="txt">
                                <h4>Personal Info</h4>
                                <p>Manage personal info</p>
                            </div>
                            <a href="<?= site_url('information') ?>"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner">
                            <div class="icon"><img src="<?= base_url('assets/images/icon-cart.svg') ?>" alt=""></div>
                            <div class="txt">
                                <h4>My Purchase</h4>
                                <p>View order details</p>
                            </div>
                            <a href="<?= site_url('purchase') ?>"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner">
                            <div class="icon"><img src="<?= base_url('assets/images/icon-heart-alt.svg') ?>" alt=""></div>
                            <div class="txt">
                                <h4>Wishlist</h4>
                                <p>View favorite items</p>
                            </div>
                            <a href="<?= site_url('wishlist') ?>"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner">
                            <div class="icon"><img src="<?= base_url('assets/images/icon-map-marker.svg') ?>" alt=""></div>
                            <div class="txt">
                                <h4>Shipping Address</h4>
                                <p>Manage shipping address</p>
                            </div>
                            <a href="<?= site_url('shipping-address') ?>"></a>
                        </div>
                    </div>
                    <!-- <div class="col">
                        <div class="inner">
                            <div class="icon"><img src="<?= base_url('assets/images/icon-coupon.svg') ?>" alt=""></div>
                            <div class="txt">
                                <h4>Coupons</h4>
                                <p>0 available</p>
                            </div>
                            <a href="<?= site_url('coupons') ?>"></a>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- dash -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>