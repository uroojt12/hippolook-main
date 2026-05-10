<!doctype html>
<html>

<head>
    <title><?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Contact us — ' ?><?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
    <!-- <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">var recaptcha=true;</script> -->
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common contact>


        <section id="sBanner" style="background-image: url('<?= SITE_IMAGES . 'images/' . $site_content['image1'] ?>')">
            <div class="contain-fluid">
                <div class="content">
                    <h1><?= $site_content['page_title'] ?></h1>
                </div>
            </div>
        </section>
        <!-- sBanner -->


        <section id="contact">
            <div class="contain">
                <div class="content text-center">
                    <h2 class="heading"><?= $site_content['heading'] ?></h2>
                </div>
                <ul class="infoLst flex text-center">
                    <?php if ($site_settings->site_address != '') : ?>
                        <li>
                            <div class="inner">
                                <div class="icon"><img src="<?= base_url('assets/images/icon-map-marker.svg') ?>" alt=""></div>
                                <h5>Visit the office</h5>
                                <span><?= nl2br($site_settings->site_address) ?></span>
                            </div>
                        </li>
                    <?php endif ?>
                    <?php if ($site_settings->site_phone != '') : ?>
                        <li>
                            <div class="inner">
                                <div class="icon"><img src="<?= base_url('assets/images/icon-phone.svg') ?>" alt=""></div>
                                <h5>Phone Number</h5>
                                <a href="tel:<?= $site_settings->site_phone ?>"><?= $site_settings->site_phone ?></a>
                            </div>
                        </li>
                    <?php endif ?>
                    <?php if ($site_settings->site_email != '') : ?>
                        <li>
                            <div class="inner">
                                <div class="icon"><img src="<?= base_url('assets/images/icon-envelope-fill.svg') ?>" alt=""></div>
                                <h5>Email Address</h5>
                                <a href="mailto:<?= $site_settings->site_email ?>"><?= $site_settings->site_email ?></a>
                            </div>
                        </li>
                    <?php endif ?>
                </ul>
                <form action="" method="post" autocomplete="off" class="frmAjax" id="frmContact">
                    <h3 class="heading text-center"><?= $site_content['second_heading'] ?></h3>
                    <div class="row formRow">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                            <div class="txtGrp">
                                <label for="name">Name</label>
                                <input class="txtBox" id="name" name="name" type="text" autofocus>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                            <div class="txtGrp">
                                <label for="iphone">Phone</label>
                                <input class="txtBox" id="iphone" name="phone" type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                            <div class="txtGrp">
                                <label for="subject">Subject</label>
                                <input class="txtBox" id="subject" name="subject" type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                            <div class="txtGrp">
                                <label for="email">Email Address</label>
                                <input class="txtBox" id="email" name="email" type="email">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                            <div class="txtGrp">
                                <label for="comment">Comments</label>
                                <textarea class="txtBox" id="comment" name="msg"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- <div id="recaptcha" class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>" data-size="invisible" data-callback="onSubmit"></div> -->
                    <div class="bTn formBtn text-center">
                        <button type="submit" class="webBtn">Submit <i class="fi-arrow-right"></i> <i class="spinner hidden"></i></button>
                    </div>
                    <div class="alertMsg" style="display:none"></div>
                </form>
            </div>
        </section>
        <!-- contact -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>