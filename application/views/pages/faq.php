<!doctype html>
<html>

<head>
    <title><?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Frequently Asked Questions — ' ?><?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common faq>


        <section id="sBanner" style="background-image: url('<?= SITE_IMAGES . 'images/' . $site_content['image1'] ?>')">
            <div class="contain-fluid">
                <div class="content">
                    <h1><?= $site_content['page_title'] ?></h1>
                </div>
            </div>
        </section>
        <!-- sBanner -->


        <section id="faq">
            <div class="contain-fluid">
                <h1 class="heading text-center"><?= $site_content['heading'] ?></h1>
                <div class="faqBox">
                    <div class="faqLst">
                        <?php foreach ($faqs as $key => $faq) : ?>
                            <div class="faqBlk">
                                <h5><?= $faq->question ?></h5>
                                <div class="txt">
                                    <?= $faq->answer ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>