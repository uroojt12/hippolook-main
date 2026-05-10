<!doctype html>
<html>

<head>
    <title><?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Why choose us — ' ?><?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common choose>


        <section id="sBanner" style="background-image: url('<?= SITE_IMAGES . 'images/' . $site_content['image1'] ?>')">
            <div class="contain-fluid">
                <div class="content">
                    <h1><?= $site_content['page_title'] ?></h1>
                </div>
            </div>
        </section>
        <!-- sBanner -->


        <section id="business">
            <div class="contain">
                <div class="flexRow flex">
                    <div class="col col1">
                        <div class="image"><img src="<?= SITE_IMAGES . 'images/' . $site_content['image2'] ?>" alt=""></div>
                    </div>
                    <div class="col col2">
                        <div class="content ckEditor">
                            <h1 class="heading"><?= $site_content['first_heading'] ?></h1>
                            <?= $site_content['first_detail'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- business -->


        <section id="choose">
            <div class="contain">
                <div class="content text-center">
                    <h1 class="heading"><?= $site_content['second_heading'] ?></h1>
                </div>
                <div class="flexRow flex ckEditor">
                    <?php for($i = 1; $i <= 4; $i++): ?>
                        <div class="col">
                            <div class="inner">
                                <div class="icon"><img src="<?= SITE_IMAGES.'images/'.$site_content['second_image'.$i]?>" alt=""></div>
                                <div class="txt">
                                    <h4><?= $site_content['second_heading'.$i]?></h4>
                                    <p><?= $site_content['second_text'.$i]?></p>
                                </div>
                            </div>
                        </div>
                    <?php endfor?>
                </div>
            </div>
        </section>
        <!-- choose -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>