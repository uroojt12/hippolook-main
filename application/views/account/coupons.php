<!doctype html>
<html>

<head>
    <title>My Coupons — <?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common dash>


        <section id="coupon">
            <div class="contain">
                <h2 class="heading">My Coupons</h2>
                <div class="blk">
                    <div class="_header">
                        <h4>Available Coupons</h4>
                        <div class="bTn"><a href="sdfdsf" class="webBtn smBtn roundBtn">Get Coupons</a></div>
                    </div>
                    <div class="flexRow flex">
                        <div class="col">
                            <div class="couponBlk">
                                <div class="lhs">
                                    <strong>$8.0</strong>
                                    <small>Get $8 off for orders above $49</small>
                                </div>
                                <div class="rhs">
                                    <span>Shop</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="couponBlk">
                                <div class="lhs">
                                    <strong>$15.0</strong>
                                    <small>Get $15 off for orders above $149</small>
                                </div>
                                <div class="rhs">
                                    <span>Shop</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="couponBlk">
                                <div class="lhs">
                                    <strong>$19.0</strong>
                                    <small>Get $19 off for orders above $169</small>
                                </div>
                                <div class="rhs">
                                    <span>Shop</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- coupon -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>