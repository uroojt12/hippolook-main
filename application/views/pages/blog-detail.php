<!doctype html>
<html>

<head>
    <title><?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' - ' : 'Blog Detail — ' ?><?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common blog>


        <section id="sBanner" style="background-image: url('<?= SITE_IMAGES . 'images/' . $site_content['image1'] ?>')">
            <div class="contain-fluid">
                <div class="content">
                    <h1><?= $row->title ?></h1>
                </div>
            </div>
        </section>
        <!-- sBanner -->


        <section id="blog">
            <div class="contain">
                <div class="flexRow flex">
                    <div class="col col1">
                        <div class="newsBlk blogDetail ckEditor">
                            <div class="image"><img src="<?= get_site_image_src("blog", $row->image); ?>" alt=""></div>
                            <div class="txt">
                                <small class="date"><?= format_date($row->date) ?></small>
                                <h4><?= $row->title ?></h4>
                                <?= $row->detail ?>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('includes/blog-right'); ?>
                </div>
            </div>
        </section>
        <!-- blog -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>