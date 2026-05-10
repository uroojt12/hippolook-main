<!doctype html>
<html>

<head>
    <title>Purchase Detail — <?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common dash>

        <section id="order">
            <div class="contain">
                <h2 class="heading">Purchase Detail <?= get_order_status($row->status) ?></h2>
                <div class="blk">
                    <div class="flexRow flex">
                        <div class="col col1">
                            <h5 class="color">Shipping information</h5>
                            <ul class="list">
                                <li>
                                    <span>Contact Email:</span>
                                    <em><?= $row->contact_email ?></em>
                                </li>
                                <li>
                                    <span>Phone Number:</span>
                                    <em><?= $row->ship_phone ?></em>
                                </li>
                                <li>
                                    <span>Name:</span>
                                    <em><?= $row->ship_fname . ' ' . $row->ship_fname ?></em>
                                </li>
                                <?php if (!empty($row->ship_company)) : ?>
                                    <li>
                                        <span>Company:</span>
                                        <em><?= $row->ship_company ?></em>
                                    </li>
                                <?php endif ?>
                                <li>
                                    <span>Address:</span>
                                    <em><?= $row->ship_address ?></em>
                                </li>
                                <li>
                                    <span>House Number:</span>
                                    <em><?= $row->ship_house_number ?></em>
                                </li>
                                <li>
                                    <span>Country:</span>
                                    <em><?= $row->ship_country ?></em>
                                </li>
                                <li>
                                    <span>City/State:</span>
                                    <em><?= $row->ship_city ?></em>
                                </li>
                                <li>
                                    <span>Zip Code:</span>
                                    <em><?= $row->ship_zip ?></em>
                                </li>
                            </ul>
                        </div>
                        <div class="col col2">
                            <h5 class="color">Billing information</h5>
                            <ul class="list">
                                <li>
                                    <span>Name:</span>
                                    <em><?= $row->ship_fname . ' ' . $row->ship_fname ?></em>
                                </li>
                                <?php if (!empty($row->ship_company)) : ?>
                                    <li>
                                        <span>Company:</span>
                                        <em><?= $row->ship_company ?></em>
                                    </li>
                                <?php endif ?>
                                <li>
                                    <span>Address:</span>
                                    <em><?= $row->ship_address ?></em>
                                </li>
                                <li>
                                    <span>House Number:</span>
                                    <em><?= $row->ship_house_number ?></em>
                                </li>
                                <li>
                                    <span>Country:</span>
                                    <em><?= $row->ship_country ?></em>
                                </li>
                                <li>
                                    <span>City/State:</span>
                                    <em><?= $row->ship_city ?></em>
                                </li>
                                <li>
                                    <span>Zip Code:</span>
                                    <em><?= $row->ship_zip ?></em>
                                </li>
                                <li>
                                    <span>Phone Number:</span>
                                    <em><?= $row->ship_phone ?></em>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="blk" id="ordTbl">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">Product</th>
                                <th width="120">Quantity</th>
                                <th width="100">Price</th>
                                <th width="100">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($row->products as $key => $pro) : ?>
                                <tr>
                                    <td data-title="Product">
                                        <div class="pro_cart">
                                            <div class="ico"><img src="<?= get_image_src($pro->image, 150); ?>" alt=""></div>
                                            <div class="pro_name">
                                                <h5><a href="<?= site_url("product-detail/{$pro->p_id}/" . url_title($pro->title, '-', TRUE)) ?>"><?= $pro->title ?></a></h5>
                                                <p>
                                                    <!-- Color: <em><?= $pro->color ?></em> • Size: <em><?= $pro->size ?></em> •  -->Shape: <em><?= $pro->shape ?></em><!--  • Material: <em><?= $pro->material ?></em> -->
                                                </p>
                                                <?php switch ($pro->glasses):
                                                    case 'Non Prescription': ?>
                                                        <ul class="list">
                                                            <li>
                                                                <span>Glasses:</span>
                                                                <em><?= $pro->glasses ?></em>
                                                            </li>
                                                        </ul>
                                                    <?php break;
                                                    case 'Frame Only': ?>
                                                        <ul class="list">
                                                            <li>
                                                                <span>Glasses:</span>
                                                                <em><?= $pro->glasses ?></em>
                                                            </li>
                                                            <li>
                                                                <span>Lens Type:</span>
                                                                <em><?= $pro->lens_type ?> (<?= format_amount($pro->lens_type_price) ?>)</em>
                                                            </li>
                                                        </ul>
                                                    <?php break;
                                                    case 'Prescription Lens': ?>
                                                        <ul class="list">
                                                            <li>
                                                                <span>Glasses:</span>
                                                                <em><?= $pro->glasses ?></em>
                                                            </li>
                                                            <li>
                                                                <span>Lens Type:</span>
                                                                <em><?= $pro->lens_type ?> (<?= format_amount($pro->lens_type_price) ?>)</em>
                                                            </li>
                                                            <li>
                                                                <span>Classic Lenses:</span>
                                                                <em><?= $pro->classic_lenses ?> (<?= format_amount($pro->classic_lenses_price) ?>)</em>
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
                                                                    <td><?= $pro->od_left_sph ?></td>
                                                                    <td><?= $pro->od_left_cyl ?></td>
                                                                    <td><?= $pro->od_left_axis ?></td>
                                                                    <td><?= $pro->od_left_pd ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>OS (Right)</td>
                                                                    <td><?= $pro->os_right_sph ?></td>
                                                                    <td><?= $pro->os_right_cyl ?></td>
                                                                    <td><?= $pro->os_right_axis ?></td>
                                                                    <td><?= $pro->os_right_pd ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <?php if (!empty($pro->prescription_file)) : ?>
                                                            <div class="bTn txtGrp"><a href="<?= SITE_VPATH . 'attachments/' . $pro->prescription_file ?>" class="webBtn labelBtn icoBtn uploadImg" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg') ?>" /><?= $pro->prescription_file_name ?></a></div>
                                                        <?php endif ?>
                                                    <?php break;
                                                    case 'Polarized Lens': ?>
                                                        <ul class="list">
                                                            <li>
                                                                <span>Glasses:</span>
                                                                <em><?= $pro->glasses ?></em>
                                                            </li>
                                                            <li>
                                                                <span>Lens Color:</span>
                                                                <em><?= $pro->lens_color ?></em>
                                                            </li>
                                                            <li>
                                                                <span>Lens Type:</span>
                                                                <em><?= $pro->lens_type ?> (<?= format_amount($pro->lens_type_price) ?>)</em>
                                                            </li>
                                                            <li>
                                                                <span>Classic Lenses:</span>
                                                                <em><?= $pro->classic_lenses ?> (<?= format_amount($pro->classic_lenses_price) ?>)</em>
                                                            </li>
                                                        </ul>
                                                        <?php if ($pro->logic_lens_type == 'second') : ?>
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
                                                                        <td><?= $pro->od_left_sph ?></td>
                                                                        <td><?= $pro->od_left_cyl ?></td>
                                                                        <td><?= $pro->od_left_axis ?></td>
                                                                        <td><?= $pro->od_left_pd ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OS (Right)</td>
                                                                        <td><?= $pro->os_right_sph ?></td>
                                                                        <td><?= $pro->os_right_cyl ?></td>
                                                                        <td><?= $pro->os_right_axis ?></td>
                                                                        <td><?= $pro->os_right_pd ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <?php if (!empty($pro->prescription_file)) : ?>
                                                                <div class="bTn txtGrp"><a href="<?= SITE_VPATH . 'attachments/' . $pro->prescription_file ?>" class="webBtn labelBtn icoBtn uploadImg" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg') ?>" /><?= $pro->prescription_file_name ?></a></div>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    <?php break;
                                                    case 'Transition Lens': ?>
                                                        <ul class="list">
                                                            <li>
                                                                <span>Glasses:</span>
                                                                <em><?= $pro->glasses ?></em>
                                                            </li>
                                                            <li>
                                                                <span>Lens Type:</span>
                                                                <em><?= $pro->lens_type ?> (<?= format_amount($pro->lens_type_price) ?>)</em>
                                                            </li>
                                                            <li>
                                                                <span>Lens Property:</span>
                                                                <em><?= $pro->lens_property ?> (<?= format_amount($pro->lens_property_price) ?>)</em>
                                                            </li>
                                                            <li>
                                                                <span>Classic Lenses:</span>
                                                                <em><?= $pro->classic_lenses ?> (<?= format_amount($pro->classic_lenses_price) ?>)</em>
                                                            </li>
                                                        </ul>
                                                        <?php if ($pro->logic_lens_type == 'second') : ?>
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
                                                                        <td><?= $pro->od_left_sph ?></td>
                                                                        <td><?= $pro->od_left_cyl ?></td>
                                                                        <td><?= $pro->od_left_axis ?></td>
                                                                        <td><?= $pro->od_left_pd ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OS (Right)</td>
                                                                        <td><?= $pro->os_right_sph ?></td>
                                                                        <td><?= $pro->os_right_cyl ?></td>
                                                                        <td><?= $pro->os_right_axis ?></td>
                                                                        <td><?= $pro->os_right_pd ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <?php if (!empty($pro->prescription_file)) : ?>
                                                                <div class="bTn txtGrp"><a href="<?= SITE_VPATH . 'attachments/' . $pro->prescription_file ?>" class="webBtn labelBtn icoBtn uploadImg" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg') ?>" /><?= $pro->prescription_file_name ?></a></div>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    <?php break;
                                                    case 'Progressive Lens': ?>
                                                        <ul class="list">
                                                            <li>
                                                                <span>Glasses:</span>
                                                                <em><?= $pro->glasses ?></em>
                                                            </li>
                                                            <li>
                                                                <span>Lens Type:</span>
                                                                <em><?= $pro->lens_type ?> (<?= format_amount($pro->lens_type_price) ?>)</em>
                                                            </li>
                                                            <li>
                                                                <span>Lens Property:</span>
                                                                <em><?= $pro->lens_property ?> (<?= format_amount($pro->lens_property_price) ?>)</em>
                                                            </li>
                                                            <li>
                                                                <span>Classic Lenses:</span>
                                                                <em><?= $pro->classic_lenses ?> (<?= format_amount($pro->classic_lenses_price) ?>)</em>
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
                                                                    <td><?= $pro->od_left_sph ?></td>
                                                                    <td><?= $pro->od_left_cyl ?></td>
                                                                    <td><?= $pro->od_left_axis ?></td>
                                                                    <td><?= $pro->od_left_pd ?></td>
                                                                    <td><?= $pro->od_left_add ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>OS (Right)</td>
                                                                    <td><?= $pro->os_right_sph ?></td>
                                                                    <td><?= $pro->os_right_cyl ?></td>
                                                                    <td><?= $pro->os_right_axis ?></td>
                                                                    <td><?= $pro->os_right_pd ?></td>
                                                                    <td><?= $pro->os_right_add ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <?php if (!empty($pro->prescription_file)) : ?>
                                                            <div class="bTn txtGrp"><a href="<?= SITE_VPATH . 'attachments/' . $pro->prescription_file ?>" class="webBtn labelBtn icoBtn uploadImg" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg') ?>" /><?= $pro->prescription_file_name ?></a></div>
                                                        <?php endif ?>
                                                        <?php break; ?>
                                                <?php endswitch; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <?php if (empty($pro->review) && $row->status == 2): ?>
                                        <td data-title="Review"><button type="button" class="webBtn smBtn leave-review" data-store="<?= doEncode("od-".$pro->id)?>">Leave Review</button></td>
                                    <?php else: ?>
                                        <td data-title="Review"><button type="button" class="colorBtn smBtn" disabled>Leave Review</button></td>
                                    <?php endif ?>
                                    <td data-title="Quantity"><?= $pro->qty ?></td>
                                    <td data-title="Price">
                                        <div class="price"><?= format_amount($pro->price) ?></div>
                                    </td>
                                    <td data-title="Total">
                                        <div class="price"><?= format_amount($pro->total) ?></div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot class="semi">
                            <tr>
                                <th colspan="4">Grand Total</th>
                                <td class="text-right"><span class="price"><?= format_amount($row->product_total) ?></span></td>
                            </tr>
                            <?php if (!empty($row->discount_code)) : ?>
                                <tr>
                                    <th colspan="4">Discount code (<?= $row->discount_code ?>)</th>
                                    <td class="text-right"><span class="price"><?= format_amount($row->discount_amount) ?></span></td>
                                </tr>
                            <?php endif ?>
                            <?php if (!empty($row->delivery_cost)) : ?>
                                <tr>
                                    <th colspan="4">Delivery Cost</th>
                                    <td class="text-right"><span class="price"><?= format_amount($row->delivery_cost) ?></span></td>
                                </tr>
                            <?php endif ?>
                            <?php if (!empty($row->tax)) : ?>
                                <tr>
                                    <th colspan="4">Tax (<?= $row->tax ?>%)</th>
                                    <td class="text-right"><span class="price"><?= format_amount($row->tax_amount) ?></span></td>
                                </tr>
                            <?php endif ?>
                            <tr>
                                <th colspan="4">Total</th>
                                <td class="text-right"><span class="price"><?= format_amount($row->product_total - $row->discount_amount + $row->delivery_cost + $row->tax_amount) ?></span></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <?php if ($row->status == 2): ?>
                <?php $this->load->view('includes/leave-review')?>
            <?php endif ?>
        </section>
        <!-- order -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
    <?php if ($row->status == 2): ?>
        <script type="text/javascript">
            $(function() {
                $(document).on("click", ".leave-review", function(e) {
                    e.preventDefault();
                    let store = $(this).data("store");
                    let $popUp = $('.popup[data-popup="leave-review"]');
                    $popUp.find('input[name="store"]').val(store);
                    $("body").addClass("flow");
                    $popUp.fadeIn().find('textarea').focus();
                });
            });
        </script>
    <?php endif ?>
</body>

</html>