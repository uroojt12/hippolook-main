<!doctype html>
<html>

<head>
    <title><?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Terms & Conditions — ' ?><?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common terms>

        <section id="sBanner" style="background-image: url('<?= SITE_IMAGES . 'images/' . $site_content['image1'] ?>')">
            <div class="contain-fluid">
                <div class="content">
                    <h1><?= $site_content['page_title'] ?></h1>
                </div>
            </div>
        </section>
        <!-- sBanner -->


        <section id="terms">
            <div class="contain">
                <h2 class="heading"><?= $site_content['page_title'] ?></h2>
                <div class="outer ckEditor">
                    <?= $content_row->full_code ?>
                </div>
            </div>
        </section>
        <!-- terms -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>