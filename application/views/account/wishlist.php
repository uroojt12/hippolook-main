<!doctype html>
<html>

<head>
    <title>My Wishlist — <?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common dash>


        <section id="wishlist">
            <div class="contain">
                <h2 class="heading">My Wishlist</h2>
                <?php if (count($rows) < 1) : ?>
                    <p>Nothing in wishlist</p>
                <?php endif ?>
                <div class="flexRow flex">
                    <?php foreach ($rows as $key => $row) : ?>
                        <div class="col">
                            <div class="itmBlk">
                                <div class="image">
                                    <a href="<?= site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)) ?>">
                                        <img src="<?= get_image_src($row->image, '350', true) ?>" alt="">
                                    </a>
                                </div>
                                <div class="txt">
                                    <h6><a href="<?= site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)) ?>"><?= $row->title ?></a></h6>
                                    <div class="rating">
                                        <div class="rateYo" data-rateyo-rating="<?= get_avg_rating($row->id)?>" data-rateyo-read-only="true"></div>
                                        <em><?= count_reviews($row->id)?></em>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="price"><?= format_amount($row->price) ?>
                                            <!-- <del>$30.95</del> -->
                                        </div>
                                        <?= favorite_btn($row->id, 'product') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
        <!-- wishlist -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>