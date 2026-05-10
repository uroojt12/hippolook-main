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
                    <li><a>Information</a></li>
                    <li class="active"><a>Shipping</a></li>
                    <li><a>Payment</a></li>
                </ul>
                <div class="flexRow flex">
                    <div class="col col1">
                        <div class="blk">
                            <div class="tblBlk">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Contact
                                                <p class="small"><?= $this->session->shipping_data['contact_email'] ?></p>
                                            </td>
                                            <td class="nowrap" right><a href="<?= site_url('cart/information') ?>">Change</a></td>
                                        </tr>
                                        <tr>
                                            <td>Shipping to
                                                <p class="small"><?= $this->session->shipping_data['ship_address'] ?>, <?= $this->session->shipping_data['ship_house_number'] ?>, <?= $this->session->shipping_data['ship_zip'] ?>, <?= $this->session->shipping_data['ship_city'] ?>, <?= $this->session->shipping_data['ship_country'] ?></p>
                                            </td>
                                            <td class="nowrap" right><a href="<?= site_url('cart/information') ?>">Change</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="blk">
                            <form action="" method="post" autocomplete="off" class="frmAjax" id="frmShiping">
                                <h4>Shipping Method</h4>
                                <div class="br"></div>
                                <div class="tblBlk">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="lblBtn">
                                                        <input type="radio" name="shipment" id="standard" value="Free" <?= !empty($this->session->shipping_data['shipment']) ? ' checked' : ' checked' ?>>
                                                        <label for="standard">Standard Shipping</label>
                                                    </div>
                                                </td>
                                                <td class="nowrap" right><?= format_amount($this->session->delivery_cost)?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="bTn formBtn btnBlk">
                                    <a href="<?= site_url('cart/information') ?>"><i class="fi-chevron-left fi-2x"></i> Back to information</a>
                                    <button type="submit" class="webBtn">Continue Payment <i class="spinner hidden"></i></button>
                                </div>
                                <div class="alertMsg" style="display:none"></div>
                            </form>
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