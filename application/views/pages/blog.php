<!doctype html>
<html>

<head>
    <title><?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Blog Articles — ' ?><?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common blog>


        <section id="sBanner" style="background-image: url('<?= SITE_IMAGES . 'images/' . $site_content['image1'] ?>')">
            <div class="contain-fluid">
                <div class="content">
                    <h1><?= $site_content['page_title'] ?></h1>
                </div>
            </div>
        </section>
        <!-- sBanner -->


        <section id="blog">
            <div class="contain">
                <div class="flexRow flex">
                    <div class="col col1">
                        <?php if (count($rows) < 1) : ?>
                            <p>No Blog article</p>
                        <?php endif ?>
                        <div class="flexRow flex">
                            <?php foreach ($rows as $key => $blog) : ?>
                                <div class="col">
                                    <div class="newsBlk">
                                        <div class="image"><a href="<?= site_url('blog-detail/' . $blog->id) ?>"><img src="<?= get_site_image_src("blog", $blog->image, '825p_'); ?>" alt=""></a></div>
                                        <div class="txt">
                                            <small class="date"><?= format_date($blog->date) ?></small>
                                            <h4><a href="<?= site_url('blog-detail/' . $blog->id) ?>"><?= $blog->title ?></a></h4>
                                            <p><?= short_text($blog->detail, 230) ?></p>
                                            <a href="<?= site_url('blog-detail/' . $blog->id) ?>" class="learnBtn">Learn more <i class="fi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
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