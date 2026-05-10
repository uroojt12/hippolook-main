<!doctype html>
<html>

<head>
    <title>Payment — <?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
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
                    <li><a>Shipping</a></li>
                    <li class="active"><a>Payment</a></li>
                </ul>
                <div class="flexRow flex">
                    <div class="col col1">
                        <form action="" method="post" autocomplete="off" class="" id="frmPayment">
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
                                                    <!-- <p class="small"><?= $this->session->shipping_data['ship_address'] ?>, <?= $this->session->shipping_data['ship_house_number'] ?>, <?= $this->session->shipping_data['ship_zip'] ?>, <?= $this->session->shipping_data['ship_city'] ?>, <?= $this->session->shipping_data['ship_country'] ?></p> -->
                                                    <p class="small"><?= $this->session->shipping_data['ship_address'] ?>, <?= $this->session->shipping_data['ship_house_number'] ?>, <?= $this->session->shipping_data['ship_zip'] ?>, <?= $this->session->shipping_data['ship_city'] ?>, <?= $this->session->shipping_data['ship_country'] ?></p>
                                                </td>
                                                <td class="nowrap" right><a href="<?= site_url('cart/information') ?>">Change</a></td>
                                            </tr>
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
                            </div>

                            <div class="blk">
                                <h4>Payment</h4>
                                <p>All transactions are secure and encrypted.</p>
                                <div class="tblBlk">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="lblBtn">
                                                        <input type="radio" name="payment" id="credit" class="tglBlk" value="credit-card" checked>
                                                        <label for="credit">Credit card</label>
                                                    </div>
                                                    <div class="insideBlk active">
                                                        <div class="row formRow">
                                                            <noscript>
                                                                <div>
                                                                    <h4>JavaScript is not enabled!</h4>
                                                                    <p>This payment form requires your browser to have JavaScript enabled. Please activate JavaScript and reload this page. Check <a href="http://enable-javascript.com" target="_blank">enable-javascript.com</a> for more information.</p>
                                                                </div>
                                                            </noscript>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                                                <div class="txtGrp">
                                                                    <label for="cardnumber">Card Number</label>
                                                                    <input type="text" id="cardnumber" class="txtBox frmfield" value="" placeholder="" required="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                                                <div class="txtGrp">
                                                                    <label for="card_holder_name">Card Holder</label>
                                                                    <input type="text" id="card_holder_name" class="txtBox" placeholder="" value="" required="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4">
                                                                <div class="txtGrp">
                                                                    <label for="exp_month" class="move">Month</label>
                                                                    <select class="txtBox" id="exp_month" required="">
                                                                        <option value="">Select</option>
                                                                        <?php for ($i = 1; $i <= 12; $i++) : ?>
                                                                            <option value="<?= sprintf('%02d', $i); ?>" <?= (sprintf('%02d', $i) == $mem_data->mem_card_exp_month ? 'selected' : '') ?>><?= sprintf('%02d', $i); ?></option>
                                                                        <?php endfor ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4">
                                                                <div class="txtGrp">
                                                                    <label for="" class="move">Year</label>
                                                                    <select id="exp_year" class="txtBox" required="">
                                                                        <option value="">Select</option>
                                                                        <?php for ($i = date('Y'); $i <= date('Y') + 10; $i++) : ?>
                                                                            <option value="<?= $i ?>" <?= ($i == $mem_data->mem_card_exp_year ? ' selected' : '') ?>><?= $i ?></option>
                                                                        <?php endfor ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4">
                                                                <div class="txtGrp">
                                                                    <label for="cvc">CVC?</label>
                                                                    <input type="text" id="cvc" class="txtBox" placeholder="" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="lblBtn">
                                                        <input type="radio" name="payment" id="paypal" class="tglBlk" value="paypal">
                                                        <label for="paypal">Paypal</label>
                                                    </div>
                                                    <div class="insideBlk">
                                                        <div class="txtGrp">
                                                            <p>Use your paypal to process payment</p>
                                                            <!-- <label for="paypal_email">PayPal Address</label>
                                                            <input type="email" name="paypal_email" id="paypal_email" class="txtBox" value="" required=""> -->
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="blk">
                                <h4>Billing Address</h4>
                                <p>Select address that matches your card or payment method</p>
                                <div class="tblBlk">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="lblBtn">
                                                        <input type="radio" name="billing_option" id="billing_option_same" class="tglBlk" value="same" checked>
                                                        <label for="billing_option_same">Same as shipping address</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="lblBtn">
                                                        <input type="radio" name="billing_option" id="billing_option_different" class="tglBlk" value="different">
                                                        <label for="billing_option_different">Use a different billing address</label>
                                                    </div>
                                                    <div class="insideBlk">
                                                        <div class="formRow row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                                                <div class="txtGrp">
                                                                    <label for="billing_fname">First Name</label>
                                                                    <input type="text" name="billing_fname" id="billing_fname" value="" class="txtBox">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                                                <div class="txtGrp">
                                                                    <label for="billing_lname">Last Name</label>
                                                                    <input type="text" name="billing_lname" id="billing_lname" value="" class="txtBox">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                                                <div class="txtGrp">
                                                                    <label for="billing_phone">Phone Number</label>
                                                                    <input type="text" name="billing_phone" id="billing_phone" value="" class="txtBox">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                                                <div class="txtGrp">
                                                                    <label for="billing_company">Company</label>
                                                                    <input type="text" name="billing_company" id="billing_company" value="" class="txtBox">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                                                <div class="txtGrp">
                                                                    <label for="billing_address">Address</label>
                                                                    <input type="text" name="billing_address" id="billing_address" value="" class="txtBox">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                                                <div class="txtGrp">
                                                                    <label for="billing_house_number">House Number</label>
                                                                    <input type="text" name="billing_house_number" id="billing_house_number" value="" class="txtBox">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                                                <div class="txtGrp">
                                                                    <label for="billing_zip">Postal Code</label>
                                                                    <input type="text" name="billing_zip" id="billing_zip" value="" class="txtBox">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                                                <div class="txtGrp">
                                                                    <label for="billing_city">City</label>
                                                                    <input type="text" name="billing_city" id="billing_city" value="" class="txtBox">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                                                <div class="txtGrp">
                                                                    <label for="billing_country">County/Region</label>
                                                                    <input type="text" name="billing_country" id="billing_country" value="" class="txtBox">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="blk">
                                <h4>Remember me</h4>
                                <div class="tblBlk">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="lblBtn">
                                                        <input type="checkbox" name="remember" id="remember" value="1">
                                                        <label for="remember">Save my information for a faster checkout</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="bTn formBtn btnBlk">
                                    <a href="<?= site_url('cart/shipping') ?>"><i class="fi-chevron-left fi-2x"></i> Back to shipping</a>
                                    <button type="submit" class="webBtn" id="submit_button">Complete Order <i class="spinner hidden"></i></button>
                                </div>
                            </div>
                            <div class="alertMsg" id="alertMsg"></div>
                        </form>
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
        $(function(){
            $(document).on('change', '#checkout .tblBlk .lblBtn > input.tglBlk', function(){
                let checked = this.checked;
                if(checked == true) {
                    $(this).parents('tbody:first').find('.insideBlk').slideUp();
                    $(this).parents('td:first').find('.insideBlk').slideDown();
                }
                else
                    $(this).parents('td:first').find('.insideBlk').slideUp();
            });
            $(document).on('submit', '#frmPayment', function (e) {
                e.preventDefault();
                needToConfirm = true;
                $("#alertMsg").html('');
                if ($('input[name="payment"]:checked').val()== 'paypal'){
                    submit_form();
                } else if($('input[name="payment"]:checked').val()== 'credit-card'){
                    // createToken returns immediately - the supplied callback submits the form if there are no errors
                    $(this).find('#submit_button').attr("disabled", true).find("i.spinner").removeClass("hidden");
                    Stripe.card.createToken({
                        number: $('#cardnumber').val(),
                        cvc: $('#cvc').val(),
                        exp_month: $('#exp_month').val(),
                        exp_year: $('#exp_year').val(),
                        name: $('#card_holder_name').val()
                    }, stripeResponseHandler);
                    return false; // submit from callback
                }
            });

            Stripe.setPublishableKey('<?= API_PUBLIC_KEY; ?>');
            let $nonce = null;
            function stripeResponseHandler(status, response) {
                let form$ = $("#frmPayment");
                let sbtn = form$.find("button[type='submit']");
                let frmIcon = form$.find("button[type='submit'] i.spinner");
                if (response.error) {
                    needToConfirm = false;
                    sbtn.attr("disabled", false);
                    frmIcon.addClass("hidden");

                    $("#alertMsg").html('<div class="alert alert-danger alert-sm"><strong>Error:</strong> ' + response.error.message + '</div>');
                    $("#alertMsg").focus();
                } else {
                    $nonce = response['id'];

                    submit_form();

                    /*let frmData = new FormData(form$[0]);
                    let frmMsg = form$.find("div.alertMsg:first");
                    frmData.append('nonce', nonce);
                    $.ajax({
                        url: form$.attr('action'),
                        data : frmData,
                        dataType: 'JSON',
                        method: 'POST',
                        processData: false,
                        contentType: false,
                        success: function (rs) {
                            $('html, body').animate({ scrollTop: frmMsg.offset().top-300}, 'slow');
                            frmMsg.html(rs.msg).slideDown(500);
                            if (rs.status == 1) {
                                setTimeout(function () {
                                    frmIcon.addClass("hidden");
                                    form$[0].reset();
                                    window.location.href = rs.redirect_url;
                                }, 3000);
                            } else {
                                setTimeout(function () {
                                    frmIcon.addClass("hidden");
                                    sbtn.attr("disabled", false);
                                }, 3000);
                            }
                        },
                        error: function (rs) {
                            // console.log(rs);
                            alert('Network error has occurred please try again!');
                        },
                        complete: function (rs) {
                            needToConfirm = false;
                        }
                    });*/
                }
            }


            function submit_form() {
                let form$ = $("#frmPayment");
                let sbtn = form$.find("button[type='submit']");
                let frmIcon = form$.find("button[type='submit'] i.spinner");

                let frmData = new FormData(form$[0]);
                let frmMsg = form$.find("div.alertMsg:first");
                if (!empty($nonce))
                    frmData.append('nonce', $nonce);
                $.ajax({
                    url: form$.attr('action'),
                    data : frmData,
                    dataType: 'JSON',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    success: function (rs) {
                        $('html, body').animate({ scrollTop: frmMsg.offset().top-300}, 'slow');
                        frmMsg.html(rs.msg).slideDown(500);
                        if (rs.status == 1) {
                            setTimeout(function () {
                                frmIcon.addClass("hidden");
                                form$[0].reset();
                                window.location.href = rs.redirect_url;
                            }, 3000);
                        } else {
                            setTimeout(function () {
                                frmIcon.addClass("hidden");
                                sbtn.attr("disabled", false);
                            }, 3000);
                        }
                    },
                    error: function (rs) {
                        // console.log(rs);
                        alert('Network error has occurred please try again!');
                    },
                    complete: function (rs) {
                        needToConfirm = false;
                    }
                });
            }

            $('#frmPayment').validate({ 
                rules: {
                    shipment: "required",
                    payment: "required",
                    card_holder_name: {
                        required: true,
                    },
                    cardnumber: {
                        required: true,
                        maxlength: 19
                    },
                    exp_month: {
                        required: true,
                    },
                    exp_year: {
                        required: true,
                    },
                    cvc: {
                        required: true,
                        maxlength: 4
                    },
                    billing_fname: {
                        required: true,
                    },
                    billing_lname: {
                        required: true,
                    },
                    billing_address: {
                        required: true,
                    },
                    billing_zip: {
                        required: true,
                    },
                    billing_house_number: {
                        required: true,
                    },
                    billing_city: {
                        required: true,
                    },
                    billing_country: {
                        required: true,
                    },
                    billing_phone: {
                        required: true,
                    }
                },errorPlacement: function(){
                    return false;
                }
            });
        });
    </script>
    </main>
    <!-- Main Js -->
    <script type="text/javascript" src="<?= base_url('assets/js/custom-validation.js?v-' . $site_settings->site_version) ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/main.js?v-' . $site_settings->site_version) ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/custom.js?v-' . $site_settings->site_version) ?>"></script>
</body>

</html>