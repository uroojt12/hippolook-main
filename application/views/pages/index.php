<!doctype html>
<html>

    <head>
        <title>
            <?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Home — ' ?><?= $site_settings->site_name ?>
        </title>
        <?php $this->load->view('includes/site-master'); ?>
    </head>

    <body id="home-page">
        <?php $this->load->view('includes/header'); ?>
        <main index>

            <section id="banner">
                <div class="contain-fluid">
                    <div class="flexRow flex">
                        <div class="col col1">
                            <div class="inner">
                                <a href="<?= makeExternalUrl($site_content['first_link1']) ?>" class="image"><img
                                        src="<?= SITE_IMAGES . 'images/' . $site_content['first_image1'] ?>" alt=""></a>
                            </div>
                            <!--						--><?php
//						echo SITE_IMAGES . 'images/' . $site_content['first_image1'];
//						?>


                        </div>
                        <div class="col col2">
                            <div class="inner">
                                <a href="<?= makeExternalUrl($site_content['first_link2']) ?>" class="image"><img
                                        src="<?= SITE_IMAGES . 'images/' . $site_content['first_image2'] ?>" alt=""></a>
                            </div>
                            <div class="inner">
                                <a href="<?= makeExternalUrl($site_content['first_link3']) ?>" class="image"><img
                                        src="<?= SITE_IMAGES . 'images/' . $site_content['first_image3'] ?>" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="flexRow flex">
                    <?php foreach ($banners as $key => $banner) : ?>
                        <div class="col">
                            <div class="inner">
                                <div class="image"><img src="<?= get_site_image_src("banners", $banner->image); ?>" alt=""></div>
                                <div class="txt">
                                    <?php if (!empty($banner->detail)) : ?>
                                        <?= $banner->detail ?>
                                    <?php endif ?>
                                    <?php if (!empty($banner->url_link)) : ?>
                                        <div class="bTn"><a href="<?= makeExternalUrl($banner->url_link) ?>" class="webBtn"><?= $banner->url_text ?></a></div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div> -->
                </div>
            </section>
            <!-- banner -->



            <section id="buy">
                <div class="contain-fluid text-center">
                    <div class="content">
                        <h1 class="heading"><?= $site_content['second_heading'] ?></h1>
                        <p><?= $site_content['second_short_desc'] ?></p>
                    </div>
                    <div id="owl-buy" class="owl-carousel owl-theme">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <div class="inner">
                            <div class="ico"><img
                                    src="<?= SITE_IMAGES . 'images/' . $site_content['second_image' . $i] ?>" alt="">
                            </div>
                            <h5><?= $site_content['second_heading' . $i] ?></h5>
                            <a href="<?= makeExternalUrl($site_content['second_link' . $i]) ?>"></a>
                        </div>
                        <?php endfor ?>
                    </div>
                </div>
            </section>
            <!-- buy -->
            <section class="sec_shop">
                <div class="flex">
                    <div class="cols">
                        <div class="image">
                            <img src="<?= base_url('assets/images/new_section/sop-1.webp') ?>" alt="">
                            <div class="content">
                                <h5>Collection</h5>
                                <h2>Cubitts x Niwaki.</h2>
                                <div class="cta">
                                    <a href="" class="webBtn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cols">
                        <div class="image">
                            <img src="<?= base_url('assets/images/new_section/sop-2.webp') ?>" alt="">
                            <div class="content">
                                <h5>premium</h5>
                                <h2>Pocket-sized artwork.</h2>
                                <div class="cta">
                                    <a href="" class="webBtn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cols">
                        <div class="image">
                            <img src="<?= base_url('assets/images/new_section/sop-3.webp') ?>" alt="">
                            <div class="content">
                                <h5>LIMITED TO 100 PIECES</h5>
                                <h2>Reading Glasses.</h2>
                                <div class="cta">
                                    <a href="" class="webBtn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ==== shop==== -->

            <section id="new">
                <div class="contain-fluid text-center">
                    <div class="content">
                        <h1 class="heading"><?= $site_content['third_heading'] ?></h1>
                    </div>
                    <div id="owl-items" class="owl-carousel owl-theme owl-items">
                        US <?php foreach ($new_products as $key => $row) : ?>
                        <div class="itmBlk">
                            <div class="image">
                                <a
                                    href="<?= site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)) ?>">
                                    <img src="<?= get_image_src($row->image, 350) ?>" alt="">
                                </a>
                            </div>
                            <div class="hello">hello</div>
                            <div class="txt">
                                <h6><a
                                        href="<?= site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)) ?>"><?= $row->title ?></a>
                                </h6>
                                <div class="rating">
                                    <div class="rateYo" data-rateyo-rating="<?= get_avg_rating($row->id)?>"
                                        data-rateyo-read-only="true"></div>
                                    <em><?= count_reviews($row->id)?></em>
                                </div>
                                <div class="btmBlk">
                                    <div class="price">
                                        <?= format_amount($row->price) ?>
                                        <?php if (!empty($row->old_price)) : ?>
                                        <del><?= format_amount($row->old_price) ?></del>
                                        <?php endif ?>
                                    </div>
                                    <!-- <a href="javascript:void(0)" class="likeBtn liked"></a> -->
                                    <?= favorite_btn($row->id, 'product') ?>
                                </div>Us
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </section>
            <!-- new -->


            <section id="poster">
                <div class="contain-fluid">
                    <div class="flexRow flex">
                        <?php for ($i = 1; $i <= 2; $i++) : ?>
                        <div class="col">
                            <div class="image">
                                <a href="<?= makeExternalUrl($site_content['fourth_link' . $i]) ?>">
                                    <img src="<?= SITE_IMAGES . 'images/' . $site_content['fourth_image' . $i] ?>"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <?php endfor ?>
                    </div>
                </div>
            </section>
            <!-- poster -->


            <section id="premium">
                <div class="contain-fluid text-center">
                    <div class="content">
                        <h1 class="heading"><?= $site_content['fifth_heading'] ?></h1>
                    </div>
                    <div id="owl-items" class="owl-carousel owl-theme owl-items">
                        <?php foreach ($premium_products as $key => $row) : ?>
                        <div class="itmBlk">
                            <div class="image">
                                <a
                                    href="<?= site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)) ?>">
                                    <img src="<?= get_image_src($row->image, 350) ?>" alt="">
                                </a>
                            </div>
                            <div class="txt">
                                <h6><a
                                        href="<?= site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)) ?>"><?= $row->title ?></a>
                                </h6>
                                <div class="rating">
                                    <div class="rateYo" data-rateyo-rating="<?= get_avg_rating($row->id)?>"
                                        data-rateyo-read-only="true"></div>
                                    <em><?= count_reviews($row->id)?></em>
                                </div>
                                <div class="btmBlk">
                                    <div class="price">
                                        <?= format_amount($row->price) ?>
                                        <?php if (!empty($row->old_price)) : ?>
                                        <del><?= format_amount($row->old_price) ?></del>
                                        <?php endif ?>
                                    </div>
                                    <?= favorite_btn($row->id, 'product') ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </section>
            <!-- premium -->


            <section id="seller">
                <div class="contain-fluid">
                    <div class="flexRow flex">
                        <div class="col col1">
                            <div class="content">
                                <h6><?= $site_content['sixth_small_heading'] ?></h6>
                                <h1 class="heading"><?= $site_content['sixth_heading'] ?></h1>
                                <p><?= $site_content['sixth_detail'] ?></p>
                                <ul class="icoLst flex">
                                    <li><img src="<?= base_url('assets/images/icon-truck.svg') ?>" alt=""><span>Free
                                            Shipping</span></li>
                                    <li><img src="<?= base_url('assets/images/icon-verified.svg') ?>"
                                            alt=""><span>Verified Dealer</span></li>
                                    <li><img src="<?= base_url('assets/images/icon-customize.svg') ?>"
                                            alt=""><span>Customize Designs</span></li>
                                </ul>
                                <div class="bTn"><a href="<?= makeExternalUrl($site_content['sixth_button_link']) ?>"
                                        class="webBtn longBtn"><?= $site_content['sixth_button_text'] ?></a></div>
                            </div>
                        </div>
                        <div class="col col2">
                            <div id="owl-seller" class="owl-carousel owl-theme">
                                <?php foreach ($best_products as $key => $row) : ?>
                                <div class="itmBlk">
                                    <div class="image">
                                        <a
                                            href="<?= site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)) ?>">
                                            <img src="<?= get_image_src($row->image, 350) ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="txt">
                                        <h6><a
                                                href="<?= site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)) ?>"><?= $row->title ?></a>
                                        </h6>
                                        <div class="rating">
                                            <div class="rateYo" data-rateyo-rating="<?= get_avg_rating($row->id)?>"
                                                data-rateyo-read-only="true"></div>
                                            <em><?= count_reviews($row->id)?></em>
                                        </div>
                                        <div class="btmBlk">
                                            <div class="price">
                                                <?= format_amount($row->price) ?>
                                                <?php if (!empty($row->old_price)) : ?>
                                                <del><?= format_amount($row->old_price) ?></del>
                                                <?php endif ?>
                                            </div>
                                            <?= favorite_btn($row->id, 'product') ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- seller -->


            <section id="poster">
                <div class="contain-fluid">
                    <div class="flexRow flex">
                        <?php for ($i = 1; $i <= 2; $i++) : ?>
                        <div class="col">
                            <div class="image">
                                <a href="<?= makeExternalUrl($site_content['seventh_link' . $i]) ?>">
                                    <img src="<?= SITE_IMAGES . 'images/' . $site_content['seventh_image' . $i] ?>"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <?php endfor ?>
                    </div>
                </div>
            </section>
            <!-- poster -->
            <section id="sec_video">
                <div class="flexDv">
                    <div class="contain-fluid">
                        <div class="content text-center">
                            <h2>Discover Eyewear That Matches Your Style and Vision</h2>
                            <p>From classic frames to bold, fashion-forward designs — we have eyewear for every face and
                                every personality. Feel confident, look sharp, and see clearly.</p>
                            <a href="" class="webBtn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <video loop="" muted="" autoplay="" playsinline="">
                    <source src="<?= base_url('assets/images/new_section/vid.mp4') ?>" type="video/mp4">
                </video>
            </section>
            <!-- ===== video_section ==== -->
            <section id="flash">
                <div class="contain-fluid text-center">
                    <div class="content">
                        <h1 class="heading"><?= $site_content['eight_heading'] ?></h1>
                    </div>
                    <div id="owl-items" class="owl-carousel owl-theme owl-items">
                        <?php foreach ($flash_products as $key => $row) : ?>
                        <div class="itmBlk">
                            <div class="image">
                                <a
                                    href="<?= site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)) ?>">
                                    <img src="<?= get_image_src($row->image, 350) ?>" alt="">
                                </a>
                            </div>
                            <div class="txt">
                                <h6><a
                                        href="<?= site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)) ?>"><?= $row->title ?></a>
                                </h6>
                                <div class="rating">
                                    <div class="rateYo" data-rateyo-rating="<?= get_avg_rating($row->id)?>"
                                        data-rateyo-read-only="true"></div>
                                    <em><?= count_reviews($row->id)?></em>
                                </div>
                                <div class="btmBlk">
                                    <div class="price">
                                        <?= format_amount($row->price) ?>
                                        <?php if (!empty($row->old_price)) : ?>
                                        <del><?= format_amount($row->old_price) ?></del>
                                        <?php endif ?>
                                    </div>
                                    <?= favorite_btn($row->id, 'product') ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </section>
            <!-- flash -->


            <!-- <section id="wall">
            <div class="contain-fluid text-center">
                <h1 class="heading">Memory Wall</h1>
                <div class="flexRow flex">
                    <div class="col">
                        <div class="inner">
                            <div class="image"><img src="<?= base_url('assets/images/people/1.jpg') ?>" alt=""></div>
                            <div class="txt">
                                <h5>@thescienceofsuave</h5>
                                <div class="bTn"><a href="<?= site_url('store') ?>" class="webBtn blockBtn">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner">
                            <div class="image"><img src="<?= base_url('assets/images/people/2.jpg') ?>" alt=""></div>
                            <div class="txt">
                                <h5>@thescienceofsuave</h5>
                                <div class="bTn"><a href="<?= site_url('store') ?>" class="webBtn blockBtn">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner">
                            <div class="image"><img src="<?= base_url('assets/images/people/3.jpg') ?>" alt=""></div>
                            <div class="txt">
                                <h5>@thescienceofsuave</h5>
                                <div class="bTn"><a href="<?= site_url('store') ?>" class="webBtn blockBtn">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner">
                            <div class="image"><img src="<?= base_url('assets/images/people/4.jpg') ?>" alt=""></div>
                            <div class="txt">
                                <h5>@thescienceofsuave</h5>
                                <div class="bTn"><a href="<?= site_url('store') ?>" class="webBtn blockBtn">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner">
                            <div class="image"><img src="<?= base_url('assets/images/people/5.jpg') ?>" alt=""></div>
                            <div class="txt">
                                <h5>@thescienceofsuave</h5>
                                <div class="bTn"><a href="<?= site_url('store') ?>" class="webBtn blockBtn">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
            <!-- wall -->


            <section id="poster">
                <div class="contain-fluid">
                    <div class="flexRow flex">
                        <div class="col long">
                            <div class="image long">
                                <a href="<?= makeExternalUrl($site_content['last_link']) ?>">
                                    <img src="<?= SITE_IMAGES . 'images/' . $site_content['image1'] ?>" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- poster -->



        </main>

        <?php $this->load->view('includes/footer'); ?>

    </body>

</html>