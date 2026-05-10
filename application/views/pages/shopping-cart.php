<!doctype html>
<html>

<head>
    <title>Shopping cart — <?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common cart>


        <section id="cart">
            <div class="contain-fluid">
                <?= showMsg() ?>
                <h1 class="heading">Shopping Cart</h1>
                <div class="flexRow flex">
                    <div class="col col1">
                        <?php if (count($cart_items) < 1) : ?>
                            <div class="cartBlk">
                                <div class="txt">
                                    <p>No product in cart</p>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php foreach ($cart_items as $key => $row) : ?>
                            <div class="cartBlk">
                                <div class="image">
                                    <a href="<?= site_url("product-detail/{$row->p_id}/" . url_title($row->title, '-', TRUE)) ?>">
                                        <img src="<?= get_image_src($row->image, 400) ?>" alt="">
                                    </a>
                                </div>
                                <div class="txt">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="semi">Frame: <?= $row->title ?></td>
                                                <td><?= format_amount($row->price) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Shape: <?= $row->shape ?></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Qty: <?= $row->qty ?>
                                                    <!-- <select name="" id="">
                                                        <option value="">1</option>
                                                        <option value="">2</option>
                                                        <option value="">3</option>
                                                        <option value="">4</option>
                                                        <option value="">5</option>
                                                    </select> -->
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <?php switch ($row->glasses):
                                                        case 'Non Prescription': ?>
                                                            <ul class="list">
                                                                <li>
                                                                    <span>Glasses:</span>
                                                                    <em><?= $row->glasses ?></em>
                                                                </li>
                                                            </ul>
                                                        <?php break;
                                                        case 'Frame Only': ?>
                                                            <ul class="list">
                                                                <li>
                                                                    <span>Glasses:</span>
                                                                    <em><?= $row->glasses ?></em>
                                                                </li>
                                                                <li>
                                                                    <span>Lens Type:</span>
                                                                    <em><?= $row->lens_type ?> (<?= format_amount($row->lens_type_price) ?>)</em>
                                                                </li>
                                                            </ul>
                                                        <?php break;
                                                        case 'Prescription Lens': ?>
                                                            <ul class="list">
                                                                <li>
                                                                    <span>Glasses:</span>
                                                                    <em><?= $row->glasses ?></em>
                                                                </li>
                                                                <li>
                                                                    <span>Lens Type:</span>
                                                                    <em><?= $row->lens_type ?> (<?= format_amount($row->lens_type_price) ?>)</em>
                                                                </li>
                                                                <li>
                                                                    <span>Classic Lenses:</span>
                                                                    <em><?= $row->classic_lenses ?> (<?= format_amount($row->classic_lenses_price) ?>)</em>
                                                                </li>
                                                            </ul>
                                                            <h6>Prescription</h6>
                                                            <table class="RxTbl">
                                                                <tbody>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td>SPH Sphere</td>
                                                                        <td>CYL Cylinder</td>
                                                                        <td>AXIS</td>
                                                                        <td>PD</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OD (Left)</td>
                                                                        <td><?= $row->od_left_sph ?></td>
                                                                        <td><?= $row->od_left_cyl ?></td>
                                                                        <td><?= $row->od_left_axis ?></td>
                                                                        <td><?= $row->od_left_pd ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OS (Right)</td>
                                                                        <td><?= $row->os_right_sph ?></td>
                                                                        <td><?= $row->os_right_cyl ?></td>
                                                                        <td><?= $row->os_right_axis ?></td>
                                                                        <td><?= $row->os_right_pd ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <?php if (!empty($row->prescription_file)) : ?>
                                                                <div class="bTn txtGrp"><a href="<?= SITE_VPATH . 'attachments/' . $row->prescription_file ?>" class="webBtn labelBtn icoBtn uploadImg" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg') ?>" /><?= $row->prescription_file_name ?></a></div>
                                                            <?php endif ?>
                                                        <?php break;
                                                        case 'Polarized Lens': ?>
                                                            <ul class="list">
                                                                <li>
                                                                    <span>Glasses:</span>
                                                                    <em><?= $row->glasses ?></em>
                                                                </li>
                                                                <li>
                                                                    <span>Lens Color:</span>
                                                                    <em><?= $row->lens_color ?></em>
                                                                </li>
                                                                <li>
                                                                    <span>Lens Type:</span>
                                                                    <em><?= $row->lens_type ?> (<?= format_amount($row->lens_type_price) ?>)</em>
                                                                </li>
                                                                <li>
                                                                    <span>Classic Lenses:</span>
                                                                    <em><?= $row->classic_lenses ?> (<?= format_amount($row->classic_lenses_price) ?>)</em>
                                                                </li>
                                                            </ul>
                                                            <?php if ($row->logic_lens_type == 'second') : ?>
                                                                <h6>Prescription</h6>
                                                                <table class="RxTbl">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td>SPH Sphere</td>
                                                                            <td>CYL Cylinder</td>
                                                                            <td>AXIS</td>
                                                                            <td>PD</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>OD (Left)</td>
                                                                            <td><?= $row->od_left_sph ?></td>
                                                                            <td><?= $row->od_left_cyl ?></td>
                                                                            <td><?= $row->od_left_axis ?></td>
                                                                            <td><?= $row->od_left_pd ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>OS (Right)</td>
                                                                            <td><?= $row->os_right_sph ?></td>
                                                                            <td><?= $row->os_right_cyl ?></td>
                                                                            <td><?= $row->os_right_axis ?></td>
                                                                            <td><?= $row->os_right_pd ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php if (!empty($row->prescription_file)) : ?>
                                                                    <div class="bTn txtGrp"><a href="<?= SITE_VPATH . 'attachments/' . $row->prescription_file ?>" class="webBtn labelBtn icoBtn uploadImg" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg') ?>" /><?= $row->prescription_file_name ?></a></div>
                                                                <?php endif ?>
                                                            <?php endif ?>
                                                        <?php break;
                                                        case 'Transition Lens': ?>
                                                            <ul class="list">
                                                                <li>
                                                                    <span>Glasses:</span>
                                                                    <em><?= $row->glasses ?></em>
                                                                </li>
                                                                <li>
                                                                    <span>Lens Type:</span>
                                                                    <em><?= $row->lens_type ?> (<?= format_amount($row->lens_type_price) ?>)</em>
                                                                </li>
                                                                <li>
                                                                    <span>Lens Property:</span>
                                                                    <em><?= $row->lens_property ?> (<?= format_amount($row->lens_property_price) ?>)</em>
                                                                </li>
                                                                <li>
                                                                    <span>Classic Lenses:</span>
                                                                    <em><?= $row->classic_lenses ?> (<?= format_amount($row->classic_lenses_price) ?>)</em>
                                                                </li>
                                                            </ul>
                                                            <?php if ($row->logic_lens_type == 'second') : ?>
                                                                <h6>Prescription</h6>
                                                                <table class="RxTbl">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td>SPH Sphere</td>
                                                                            <td>CYL Cylinder</td>
                                                                            <td>AXIS</td>
                                                                            <td>PD</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>OD (Left)</td>
                                                                            <td><?= $row->od_left_sph ?></td>
                                                                            <td><?= $row->od_left_cyl ?></td>
                                                                            <td><?= $row->od_left_axis ?></td>
                                                                            <td><?= $row->od_left_pd ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>OS (Right)</td>
                                                                            <td><?= $row->os_right_sph ?></td>
                                                                            <td><?= $row->os_right_cyl ?></td>
                                                                            <td><?= $row->os_right_axis ?></td>
                                                                            <td><?= $row->os_right_pd ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php if (!empty($row->prescription_file)) : ?>
                                                                    <div class="bTn txtGrp"><a href="<?= SITE_VPATH . 'attachments/' . $row->prescription_file ?>" class="webBtn labelBtn icoBtn uploadImg" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg') ?>" /><?= $row->prescription_file_name ?></a></div>
                                                                <?php endif ?>
                                                            <?php endif ?>
                                                        <?php break;
                                                        case 'Progressive Lens': ?>
                                                            <ul class="list">
                                                                <li>
                                                                    <span>Glasses:</span>
                                                                    <em><?= $row->glasses ?></em>
                                                                </li>
                                                                <li>
                                                                    <span>Lens Type:</span>
                                                                    <em><?= $row->lens_type ?> (<?= format_amount($row->lens_type_price) ?>)</em>
                                                                </li>
                                                                <li>
                                                                    <span>Lens Property:</span>
                                                                    <em><?= $row->lens_property ?> (<?= format_amount($row->lens_property_price) ?>)</em>
                                                                </li>
                                                                <li>
                                                                    <span>Classic Lenses:</span>
                                                                    <em><?= $row->classic_lenses ?> (<?= format_amount($row->classic_lenses_price) ?>)</em>
                                                                </li>
                                                            </ul>
                                                            <h6>Prescription</h6>
                                                            <table class="RxTbl">
                                                                <tbody>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td>SPH Sphere</td>
                                                                        <td>CYL Cylinder</td>
                                                                        <td>AXIS</td>
                                                                        <td>PD</td>
                                                                        <td>ADD</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OD (Left)</td>
                                                                        <td><?= $row->od_left_sph ?></td>
                                                                        <td><?= $row->od_left_cyl ?></td>
                                                                        <td><?= $row->od_left_axis ?></td>
                                                                        <td><?= $row->od_left_pd ?></td>
                                                                        <td><?= $row->od_left_add ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OS (Right)</td>
                                                                        <td><?= $row->os_right_sph ?></td>
                                                                        <td><?= $row->os_right_cyl ?></td>
                                                                        <td><?= $row->os_right_axis ?></td>
                                                                        <td><?= $row->os_right_pd ?></td>
                                                                        <td><?= $row->os_right_add ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <?php if (!empty($row->prescription_file)) : ?>
                                                                <div class="bTn txtGrp"><a href="<?= SITE_VPATH . 'attachments/' . $row->prescription_file ?>" class="webBtn labelBtn icoBtn uploadImg" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg') ?>" /><?= $row->prescription_file_name ?></a></div>
                                                            <?php endif ?>
                                                            <?php break; ?>
                                                    <?php endswitch; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Subtotal</td>
                                                <td><?= format_amount($row->total) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <ul class="btnLst">
                                        <li><?= favorite_btn($row->p_id, 'product') ?></li>
                                        <li><a href="<?= site_url('cart/remove-item/' . doEncode('c-' . $row->id)) ?>" onclick="return confirm('Delete?')"><img src="<?= base_url('assets/images/icon-trash.svg') ?>" alt=""> Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <?php $this->load->view('includes/checkout-sidebar') ?>
                </div>
            </div>
        </section>
        <!-- cart -->


        <section id="similar">
            <div class="contain-fluid">
                <h1 class="heading text-center">Similar Products</h1>
                <div id="owl-items" class="owl-carousel owl-theme owl-items">
                    <?php foreach ($related_products as $key => $rp) : ?>
                        <div class="itmBlk">
                            <div class="image">
                                <a href="<?= site_url("product-detail/{$rp->id}/" . url_title($rp->title, '-', TRUE)) ?>">
                                    <img src="<?= get_image_src($rp->image, 400) ?>" alt="">
                                </a>
                            </div>
                            <div class="txt">
                                <h6><a href="<?= site_url("product-detail/{$rp->id}/" . url_title($rp->title, '-', TRUE)) ?>"><?= $rp->title ?></a></h6>
                                <div class="rating">
                                    <div class="rateYo" data-rateyo-rating="<?= get_avg_rating($rp->id) ?>" data-rateyo-read-only="true"></div>
                                    <em><?= count_reviews($rp->id) ?></em>
                                </div>
                                <div class="btmBlk">
                                    <div class="price">
                                        <?= format_amount($rp->price) ?>
                                        <?php if (!empty($rp->old_price)) : ?>
                                            <del><?= format_amount($rp->old_price) ?></del>
                                        <?php endif ?>
                                    </div>
                                    <?= favorite_btn($rp->id, 'product') ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
        <!-- similar -->


        <script type="text/javascript">
            $(function() {
                $(document).on('change', '.size', function(e) {
                    let price = $(this).find('option:selected').data('price');
                    $(this).parents('ul.lst:first').find('.price > span').text(formatter.format(price));
                });
                /*$(document).on('click', 'a.resetAll', function(e) {
                    e.preventDefault();
                    $('.fltrBx input[type="checkbox"], .fltrBx input[type="radio"]').prop('checked', false);
                    searchFunction();
                });*/
            });
        </script>
    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>