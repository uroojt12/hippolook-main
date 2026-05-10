<!doctype html>
<html>

<head>
    <title>My Purchase — <?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common dash>

        <section id="order">
            <div class="contain">
                <h2 class="heading">My Purchase</h2>
                <?php if (count($orders) < 1) : ?>
                    <p>No order exists</p>
                <?php endif ?>
                <?php foreach ($orders as $key => $order) : ?>
                    <div class="inside">
                        <div class="orderBlk">
                            <ul class="lst">
                                <li>
                                    <div class="icoBlk">
                                        <!-- <div class="ico"><img src="<?= get_image_src($order->mem_image, '350', true) ?>" alt=""></div> -->
                                        <?= num_size($order->id) ?></small>
                                    </div>
                                </li>
                                <li class="date"><?= format_date($order->date, 'd M Y') ?></li>
                                <li><?= get_order_status($order->status) ?></li>
                                <li class="price"><?= format_amount($order->product_total - $order->discount_amount + $order->tax_amount + $order->delivery_cost) ?></li>
                            </ul>
                            <a href="<?= site_url("purchase-detail/{$order->id}") ?>"></a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>
        <!-- order -->

    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>