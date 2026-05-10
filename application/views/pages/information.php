<!doctype html>
<html>

<head>
    <title>Information — <?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <main common checkout>


        <section id="checkout">
            <div class="contain-fluid">
                <div class="logo">
                    <a href="<?= site_url() ?>"><img src="<?= SITE_IMAGES . '/images/' . $site_settings->site_logo . '?v-' . $site_settings->site_version ?>" alt="<?= $site_settings->site_name ?>"></a>
                </div>
                <ul class="crumLst flex">
                    <li><a href="<?= site_url('cart') ?>">Cart</a></li>
                    <li class="active"><a>Information</a></li>
                    <li><a>Shipping</a></li>
                    <li><a>Payment</a></li>
                </ul>
                <div class="flexRow flex">
                    <div class="col col1">
                        <div class="blk">
                            <form action="" method="post" autocomplete="off" class="frmAjax" id="frmInfo">
                                <h4>Contact information</h4>
                                <?php if ($mem_data) : ?>
                                    <div class="txtGrp">
                                        <label for="email">E-mail*</label>
                                        <input type="text" name="email" id="email" class="txtBox" value="<?= empty($this->session->shipping_data['contact_email']) ? $mem_data->mem_email : $this->session->shipping_data['contact_email'] ?>">
                                    </div>
                                <?php else : ?>
                                    <p>Already have an account? <a href="javascript:void(0)" class="popBtn" data-popup="login">Sign in here</a></p>
                                    <div class="formRow row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                            <div class="txtGrp">
                                                <label for="fname">First Name</label>
                                                <input type="text" name="fname" id="fname" class="txtBox" autofocus required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                            <div class="txtGrp">
                                                <label for="lname">Last Name</label>
                                                <input type="text" name="lname" id="lname" class="txtBox">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                            <div class="txtGrp">
                                                <label for="email">Email Address</label>
                                                <input type="email" name="email" id="email" class="txtBox">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                            <div class="txtGrp">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" id="password" class="txtBox">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                            <div class="txtGrp">
                                                <div class="lblBtn">
                                                    <input type="checkbox" name="notified" id="notified">
                                                    <label for="notified">Keep me up to date on news and exclusive offers</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>

                                <div class="br"></div>
                                <h4>Shipping address</h4>
                                <div class="formRow row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                        <div class="txtGrp">
                                            <label for="ship_fname">First Name</label>
                                            <input type="text" name="ship_fname" id="ship_fname" value="<?= empty($this->session->shipping_data['ship_fname']) ? $mem_data->ship_fname : $this->session->shipping_data['ship_fname'] ?>" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                        <div class="txtGrp">
                                            <label for="ship_lname">Last Name</label>
                                            <input type="text" name="ship_lname" id="ship_lname" value="<?= empty($this->session->shipping_data['ship_lname']) ? $mem_data->ship_lname : $this->session->shipping_data['ship_lname'] ?>" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                        <div class="txtGrp">
                                            <label for="ship_phone">Phone Number</label>
                                            <input type="text" name="ship_phone" id="ship_phone" value="<?= empty($this->session->shipping_data['ship_phone']) ? $mem_data->ship_phone : $this->session->shipping_data['ship_phone'] ?>" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                        <div class="txtGrp">
                                            <label for="ship_company">Company</label>
                                            <input type="text" name="ship_company" id="ship_company" value="<?= empty($this->session->shipping_data['ship_company']) ? $mem_data->ship_company : $this->session->shipping_data['ship_company'] ?>" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                        <div class="txtGrp">
                                            <label for="ship_address">Address</label>
                                            <input type="text" name="ship_address" id="ship_address" value="<?= empty($this->session->shipping_data['ship_address']) ? $mem_data->ship_address : $this->session->shipping_data['ship_address'] ?>" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                        <div class="txtGrp">
                                            <label for="ship_house_number">House Number</label>
                                            <input type="text" name="ship_house_number" id="ship_house_number" value="<?= empty($this->session->shipping_data['ship_house_number']) ? $mem_data->ship_house_number : $this->session->shipping_data['ship_house_number'] ?>" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                        <div class="txtGrp">
                                            <label for="ship_zip">Postal Code</label>
                                            <input type="text" name="ship_zip" id="ship_zip" value="<?= empty($this->session->shipping_data['ship_zip']) ? $mem_data->ship_zip : $this->session->shipping_data['ship_zip'] ?>" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                        <div class="txtGrp">
                                            <label for="ship_city">City</label>
                                            <input type="text" name="ship_city" id="ship_city" value="<?= empty($this->session->shipping_data['ship_city']) ? $mem_data->ship_city : $this->session->shipping_data['ship_city'] ?>" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                        <div class="txtGrp">
                                            <label for="ship_country" class="move">County</label>
                                            <select name="ship_country" id="ship_country" class="txtBox">
                                                <option>Select</option>
                                                <?= get_countries_options('name', (empty($this->session->shipping_data['ship_country']) ? $mem_data->ship_country : $this->session->shipping_data['ship_country']))?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="bTn formBtn btnBlk">
                                    <a href="<?= site_url('cart') ?>"><i class="fi-chevron-left fi-2x"></i> Back to cart</a>
                                    <button type="submit" class="webBtn">Continue Shipping <i class="spinner hidden"></i></button>
                                </div>
                                <div class="alertMsg" style="display:none"></div>
                            </form>
                        </div>

                        <div class="popup small-popup" data-popup="login">
                            <div class="tableDv">
                                <div class="tableCell">
                                    <div class="contain">
                                        <div class="_inner">
                                            <div class="crosBtn"></div>
                                            <h4>Sign in</h4>
                                            <p>Sign in your <?= $site_settings->site_name ?> Account here.</p>
                                            <form action="<?= site_url('signin')?>" method="post" autocomplete="off" class="frmAjax" id="frmLogin">
                                                <input type="hidden" name="type" value="login">
                                                <div class="txtGrp">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" name="email" id="email" class="txtBox" autofocus>
                                                </div>
                                                <div class="txtGrp">
                                                    <label for="email">Password</label>
                                                    <input type="password" name="password" id="password" class="txtBox">
                                                </div>
                                                <div class="bTn">
                                                    <button type="submit" class="webBtn blockBtn">Sign in <i class="spinner hidden"></i></button>
                                                </div>
                                                <div class="alertMsg" style="display:none"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('includes/checkout-sidebar'); ?>
                </div>
                <hr>
                <ul class="policyLst flex">
                    <li><a href="<?= site_url('shipping-handling') ?>">Shipping & Handling</a></li>
                    <li><a href="<?= site_url('return-policy') ?>">Return Policy</a></li>
                    <li><a href="<?= site_url('cookies-policy') ?>">Cookies</a></li>
                    <li><a href="<?= site_url('disclaimers') ?>">Disclaimers</a></li>
                    <li><a href="<?= site_url('terms-and-conditions') ?>">Terms & Conditions</a></li>
                    <li><a href="<?= site_url('privacy-policy') ?>">Privacy Policy</a></li>
                </ul>
            </div>
        </section>
        <!-- checkout -->


        <script type="text/javascript">
            $(function() {
                /*$(document).on('change', '.size', function(e) {
                    let price = $(this).find('option:selected').data('price');
                    $(this).parents('ul.lst:first').find('.price > span').text(formatter.format(price));
                });*/
            });
        </script>
    </main>
    <!-- Main Js -->
    <script type="text/javascript" src="<?= base_url('assets/js/custom-validation.js?v-' . $site_settings->site_version) ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/main.js?v-' . $site_settings->site_version) ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/custom.js?v-' . $site_settings->site_version) ?>"></script>
</body>

</html>