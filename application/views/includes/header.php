<header class="ease">
    <div class="contain-fluid">
        <div class="logo ease">
            <a href="<?= site_url() ?>"><img src="<?= SITE_IMAGES . '/images/' . $site_settings->site_logo . '?v-' . $site_settings->site_version ?>" alt="<?= $site_settings->site_name ?>"></a>
<!--			--><?php //echo SITE_IMAGES . '/images/' . $site_settings->site_logo; ?>

		</div>
        <div class="toggle"><span></span></div>
        <nav class="ease">
            <div id="layer">
                <div class="info">
                    <strong><?= $site_settings->site_off_heading ?></strong>
                    <div class="infoIn"><?= $site_settings->site_off_detail ?></div>
                </div>
                <ul class="lst flex">
                    <li><a href="<?= site_url('blog') ?>">Blog</a></li>
                    <li><a href="<?= site_url('faq') ?>">FAQ's</a></li>
                    <li><a href="<?= site_url('contact') ?>">Help Center</a></li>
                    <!-- <li><a class="popBtn" data-popup="track-order">Track Order</a></li> -->
                </ul>
            </div>
            <div id="strip">
                <form action="<?= site_url('store') ?>" method="get" class="srchBar">
                    <input type="text" name="q" id="q" class="txtBox" value="<?= $query['q']?>" placeholder="Search here">
                    <button type="submit"><img src="<?= base_url('assets/images/icon-search.svg') ?>" alt=""></button>
                </form>
                <ul id="nav" nav_list>
                    <?php foreach ($cats as $key => $cat) : ?>
                        <li class="<?php if ($page == "store" && $this->uri->segment(2) == $cat->slug) {
                                        echo 'active';
                                    } ?>">
                            <a href="<?= site_url('store/' . $cat->slug) ?>"><?= $cat->name ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
                <ul id="iconBtn" nav_list>
                    <li id="srchBtn">
                        <button type="button" class="iconBtn">
                            <img src="<?= base_url('assets/images/icon-search.svg') ?>" alt="">
                        </button>
                    </li>
                    <li id="logBtn" class="drop">
                        <button type="button" class="iconBtn">
                            <img src="<?= base_url('assets/images/icon-user.svg') ?>" alt="">
                        </button>
                        <small>My Account</small>
                        <?php if ($mem_data) : ?>
                            <a href="javascript:void(0)"><?= format_name($mem_data->mem_fname, $mem_data->mem_lname) ?></a>
                            <div class="sub sm">
                                <ul class="list">
                                    <li><a href="<?= site_url('account') ?>">Dashboard <small>See and Manage Data</small></a></li>
                                    <li><a href="<?= site_url('information') ?>">My Information <small>Personal Information Settings</small></a></li>
                                    <li><a href="<?= site_url('purchase') ?>">My Purchase <small>Purchased Items Details</small></a></li>
                                    <li><a href="<?= site_url('wishlist') ?>">My Wishlist <small>My Favorites Items</small></a></li>
                                    <!-- <li><a href="<?= site_url('coupons') ?>">My Coupons <small>Discount Coupons Codes</small></a></li> -->
                                    <li><a href="<?= site_url('signout') ?>">Sign out</a></li>
                                </ul>
                                <!-- <ul class="list">
                                    <li><a href="<?= site_url('my-information') ?>">Change details </a></li>
                                    <li><a href="<?= site_url('my-information') ?>">Change address </a></li>
                                    <li><a href="<?= site_url('purchase') ?>">View your orders</a></li>
                                </ul> -->
                            </div>
                        <?php else : ?>
                            <a href="javascript:void(0)">Sign in</a>
                            <div class="sub">
                                <p>Sign up for free and enjoy all our benefits. With your information you can Sign in and Sign out in our webshop.</p>
                                <div class="bTn">
                                    <a href="<?= site_url('signup') ?>" class="webBtn blockBtn">Sign up</a>
                                </div>
                                <hr>
                                <p>Sign in your Hippolook account here</p>
                                <div class="bTn">
                                    <a href="<?= site_url('signin') ?>" class="webBtn blockBtn">Sign in</a>
                                </div>
                            </div>
                        <?php endif ?>
                    </li>
                    <li id="likeBtn">
                        <a href="<?= site_url('wishlist') ?>" class="iconBtn">
                            <img src="<?= base_url('assets/images/icon-heart-o.svg') ?>" alt="">
                            <em class="miniLbl red"><?= $total_favorites?></em>
                        </a>
                    </li>
                    <li id="cartBtn" class="drop">
                        <button type="button" class="iconBtn">
                            <img src="<?= base_url('assets/images/icon-cart.svg') ?>" alt="">
                            <em class="miniLbl green"><?= count($cart_items) ?></em>
                        </button>
                        <div class="sub">
                            <?php foreach ($cart_items as $key => $cart_item) : ?>
                                <div class="cartBlk sm">
                                    <div class="image">
                                        <a href="<?= site_url("product-detail/{$cart_item->p_id}/" . url_title($cart_item->title, '-', TRUE)) ?>">
                                            <img src="<?= get_image_src($cart_item->image) ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="txt">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td><strong>Frame:</strong> <?= $cart_item->title ?></td>
                                                    <!-- <td><strong><?= $cart_item->title ?></strong></td> -->
                                                </tr>
                                                <tr>
                                                    <td><strong>Shape:</strong> <?= $cart_item->shape ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Qty:</strong> <?= $cart_item->qty ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Subtotal: <?= format_amount($cart_item->total) ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <a class="closeBtn" href="<?= site_url('cart/remove-item/' . doEncode('c-' . $cart_item->id)) ?>"></a> -->
                                </div>
                            <?php endforeach ?>
                            <div class="shopTbl">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>TOTAL</td>
                                            <td><?= format_amount($cart_total) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="bTn formBtn">
                                    <a href="<?= site_url('cart') ?>" class="webBtn blockBtn">View Cart</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="clearfix"></div>
    </div>
    <!-- <div class="popup small-popup" data-popup="track-order">
        <div class="tableDv">
            <div class="tableCell">
                <div class="contain">
                    <div class="_inner">
                        <div class="crosBtn"></div>
                        <h4>Track Order</h4>
                        <form action="" method="post">
                            <div class="txtGrp">
                                <label for="">Tracking No</label>
                                <input type="text" name="" id="" class="txtBox">
                            </div>
                            <div class="txtGrp">
                                <label for="">Comments</label>
                                <textarea type="text" name="" id="" class="txtBox"></textarea>
                            </div>
                            <div class="bTn">
                                <button type="submit" class="webBtn blockBtn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</header>
<!-- header -->


<div class="upperlay"></div>
<!-- <div id="pageloader">
    <span class="loader"></span>
</div> -->
<div class="pBar hidden"><span id="myBar" style="width:0%"></span></div>


<script type="text/javascript">
    $(function() {
        // header fix
        offSet = $('body').offset().top;
        offSet = offSet + 5;
        $(window).scroll(function() {
            scrollPos = $(window).scrollTop();
            if (scrollPos >= offSet) {
                $('header').addClass('fix');
            } else {
                $('header').removeClass('fix');
            }
        });
    });
</script>
