<!doctype html>
<html>

<head>
    <title><?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Educational Videos — ' ?><?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common videos>


        <section id="sBanner" style="background-image: url('<?= SITE_IMAGES . 'images/' . $site_content['image1'] ?>')">
            <div class="contain-fluid">
                <div class="content">
                    <h1><?= $site_content['page_title'] ?></h1>
                </div>
            </div>
        </section>
        <!-- sBanner -->


        <section id="videos">
            <div class="contain">
                <h2 class="heading"><?= $site_content['heading'] ?></h2>
                <div class="flexRow flex">
                    <?php foreach ($educational_videos as $key => $video): ?>
                        <div class="col">
                            <div class="blk">
                                <?php if ($video->video_type == 'youtube') : ?>
                                    <div class="vidBlk popBtn" data-popup="video" data-store="<?= $video->video_code?>" style="background-image: url('<?= SITE_IMAGES.'educational/thumb_'.$video->image ?>')"></div>                                    
                                <?php else : ?>
                                    <div class="vidBlk popBtn" data-popup="video" data-video="<?= SITE_IMAGES . 'educational/' . $video->video_file ?>" style="background-image: url('<?= SITE_IMAGES.'educational/thumb_'.$video->image ?>')"></div>
                                <?php endif ?>
                                <h4><?= $video->title?></h4>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="popup" data-popup="video">
                <div class="tableDv">
                    <div class="tableCell">
                        <div class="crosBtn"></div>
                        <div class="contain">
                            <div id="vidBlk" class="vidBlk inside">
                                <!-- <iframe src="https://www.youtube.com/embed/G3k0qlLag74"></iframe> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- videos -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>