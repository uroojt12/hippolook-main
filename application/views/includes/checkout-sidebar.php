<div class="col col2">
    <!-- <button type="button" id="smryBtn" class="webBtn icoBtn simpleBtn blockBtn">
        <img src="<?= base_url('assets/images/icon-cart.svg') ?>" alt="">
        <em data-show="Show " data-hide="Hide ">Order Summary</em>
        <strong><?= format_amount($cart_total + $total_tax) ?></strong>
    </button> -->
    <div class="aside">
        <?php if ($page == 'cart' && $this->uri->segment(2) != '') : ?>
            <?php foreach ($cart_items as $key => $cart_item) : ?>
                <div class="cartBlk">
                    <div class="image">
                        <a href="<?= site_url("product-detail/{$cart_item->p_id}/" . url_title($cart_item->title, '-', TRUE)) ?>">
                            <img src="<?= get_image_src($cart_item->image) ?>" alt="">
                        </a>
                    </div>
                    <div class="txt">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Frame: <?= $cart_item->title ?></td>
                                    <td><?= format_amount($cart_item->price) ?></td>
                                </tr>
                                <tr>
                                    <td>Shape: <?= $cart_item->shape ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Qty: <?= $cart_item->qty ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php switch ($cart_item->glasses):
                                            case 'Non Prescription': ?>
                                                <ul class="list">
                                                    <li>
                                                        <span>Glasses:</span>
                                                        <em><?= $cart_item->glasses ?></em>
                                                    </li>
                                                </ul>
                                            <?php break;
                                            case 'Frame Only': ?>
                                                <ul class="list">
                                                    <li>
                                                        <span>Glasses:</span>
                                                        <em><?= $cart_item->glasses ?></em>
                                                    </li>
                                                    <li>
                                                        <span>Lens Type:</span>
                                                        <em><?= $cart_item->lens_type ?> (<?= format_amount($cart_item->lens_type_price) ?>)</em>
                                                    </li>
                                                </ul>
                                            <?php break;
                                            case 'Prescription Lens': ?>
                                                <ul class="list">
                                                    <li>
                                                        <span>Glasses:</span>
                                                        <em><?= $cart_item->glasses ?></em>
                                                    </li>
                                                    <li>
                                                        <span>Lens Type:</span>
                                                        <em><?= $cart_item->lens_type ?> (<?= format_amount($cart_item->lens_type_price) ?>)</em>
                                                    </li>
                                                    <li>
                                                        <span>Classic Lenses:</span>
                                                        <em><?= $cart_item->classic_lenses ?> (<?= format_amount($cart_item->classic_lenses_price) ?>)</em>
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
                                                            <td><?= $cart_item->od_left_sph ?></td>
                                                            <td><?= $cart_item->od_left_cyl ?></td>
                                                            <td><?= $cart_item->od_left_axis ?></td>
                                                            <td><?= $cart_item->od_left_pd ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>OS (Right)</td>
                                                            <td><?= $cart_item->os_right_sph ?></td>
                                                            <td><?= $cart_item->os_right_cyl ?></td>
                                                            <td><?= $cart_item->os_right_axis ?></td>
                                                            <td><?= $cart_item->os_right_pd ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <?php if (!empty($cart_item->prescription_file)) : ?>
                                                    <div class="bTn txtGrp"><a href="<?= SITE_VPATH . 'attachments/' . $cart_item->prescription_file ?>" class="webBtn labelBtn icoBtn uploadImg" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg') ?>" /><?= $cart_item->prescription_file_name ?></a></div>
                                                <?php endif ?>
                                            <?php break;
                                            case 'Polarized Lens': ?>
                                                <ul class="list">
                                                    <li>
                                                        <span>Glasses:</span>
                                                        <em><?= $cart_item->glasses ?></em>
                                                    </li>
                                                    <li>
                                                        <span>Lens Color:</span>
                                                        <em><?= $cart_item->lens_color ?></em>
                                                    </li>
                                                    <li>
                                                        <span>Lens Type:</span>
                                                        <em><?= $cart_item->lens_type ?> (<?= format_amount($cart_item->lens_type_price) ?>)</em>
                                                    </li>
                                                    <li>
                                                        <span>Classic Lenses:</span>
                                                        <em><?= $cart_item->classic_lenses ?> (<?= format_amount($cart_item->classic_lenses_price) ?>)</em>
                                                    </li>
                                                </ul>
                                                <?php if ($cart_item->logic_lens_type == 'second') : ?>
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
                                                                <td><?= $cart_item->od_left_sph ?></td>
                                                                <td><?= $cart_item->od_left_cyl ?></td>
                                                                <td><?= $cart_item->od_left_axis ?></td>
                                                                <td><?= $cart_item->od_left_pd ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>OS (Right)</td>
                                                                <td><?= $cart_item->os_right_sph ?></td>
                                                                <td><?= $cart_item->os_right_cyl ?></td>
                                                                <td><?= $cart_item->os_right_axis ?></td>
                                                                <td><?= $cart_item->os_right_pd ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <?php if (!empty($cart_item->prescription_file)) : ?>
                                                        <div class="bTn txtGrp"><a href="<?= SITE_VPATH . 'attachments/' . $cart_item->prescription_file ?>" class="webBtn labelBtn icoBtn uploadImg" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg') ?>" /><?= $cart_item->prescription_file_name ?></a></div>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            <?php break;
                                            case 'Transition Lens': ?>
                                                <ul class="list">
                                                    <li>
                                                        <span>Glasses:</span>
                                                        <em><?= $cart_item->glasses ?></em>
                                                    </li>
                                                    <li>
                                                        <span>Lens Type:</span>
                                                        <em><?= $cart_item->lens_type ?> (<?= format_amount($cart_item->lens_type_price) ?>)</em>
                                                    </li>
                                                    <li>
                                                        <span>Lens Property:</span>
                                                        <em><?= $cart_item->lens_property ?> (<?= format_amount($cart_item->lens_property_price) ?>)</em>
                                                    </li>
                                                    <li>
                                                        <span>Classic Lenses:</span>
                                                        <em><?= $cart_item->classic_lenses ?> (<?= format_amount($cart_item->classic_lenses_price) ?>)</em>
                                                    </li>
                                                </ul>
                                                <?php if ($cart_item->logic_lens_type == 'second') : ?>
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
                                                                <td><?= $cart_item->od_left_sph ?></td>
                                                                <td><?= $cart_item->od_left_cyl ?></td>
                                                                <td><?= $cart_item->od_left_axis ?></td>
                                                                <td><?= $cart_item->od_left_pd ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>OS (Right)</td>
                                                                <td><?= $cart_item->os_right_sph ?></td>
                                                                <td><?= $cart_item->os_right_cyl ?></td>
                                                                <td><?= $cart_item->os_right_axis ?></td>
                                                                <td><?= $cart_item->os_right_pd ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <?php if (!empty($cart_item->prescription_file)) : ?>
                                                        <div class="bTn txtGrp"><a href="<?= SITE_VPATH . 'attachments/' . $cart_item->prescription_file ?>" class="webBtn labelBtn icoBtn uploadImg" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg') ?>" /><?= $cart_item->prescription_file_name ?></a></div>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            <?php break;
                                            case 'Progressive Lens': ?>
                                                <ul class="list">
                                                    <li>
                                                        <span>Glasses:</span>
                                                        <em><?= $cart_item->glasses ?></em>
                                                    </li>
                                                    <li>
                                                        <span>Lens Type:</span>
                                                        <em><?= $cart_item->lens_type ?> (<?= format_amount($cart_item->lens_type_price) ?>)</em>
                                                    </li>
                                                    <li>
                                                        <span>Lens Property:</span>
                                                        <em><?= $cart_item->lens_property ?> (<?= format_amount($cart_item->lens_property_price) ?>)</em>
                                                    </li>
                                                    <li>
                                                        <span>Classic Lenses:</span>
                                                        <em><?= $cart_item->classic_lenses ?> (<?= format_amount($cart_item->classic_lenses_price) ?>)</em>
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
                                                            <td><?= $cart_item->od_left_sph ?></td>
                                                            <td><?= $cart_item->od_left_cyl ?></td>
                                                            <td><?= $cart_item->od_left_axis ?></td>
                                                            <td><?= $cart_item->od_left_pd ?></td>
                                                            <td><?= $cart_item->od_left_add ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>OS (Right)</td>
                                                            <td><?= $cart_item->os_right_sph ?></td>
                                                            <td><?= $cart_item->os_right_cyl ?></td>
                                                            <td><?= $cart_item->os_right_axis ?></td>
                                                            <td><?= $cart_item->os_right_pd ?></td>
                                                            <td><?= $cart_item->os_right_add ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <?php if (!empty($cart_item->prescription_file)) : ?>
                                                    <div class="bTn txtGrp"><a href="<?= SITE_VPATH . 'attachments/' . $cart_item->prescription_file ?>" class="webBtn labelBtn icoBtn uploadImg" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg') ?>" /><?= $cart_item->prescription_file_name ?></a></div>
                                                <?php endif ?>
                                                <?php break; ?>
                                        <?php endswitch; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Subtotal</td>
                                    <td><?= format_amount($cart_item->total) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>

        <div class="shopTbl">
            <h4>Invoice <small>(<?= count($cart_items) ?> <?= count($cart_items) > 1 ? "items" : "item" ?>)</small></h4>
            <form action="<?= site_url('redeem-promocode') ?>" method="post" autocomplete="off" class="frmAjax" id="frmPromo">
                <div class="flexGrp">
                    <div class="txtGrp">
                        <label for="promocode">Discount coupon</label>
                        <input type="text" name="promocode" id="promocode" class="txtBox" value="<?= !empty($this->session->promocode) ? $this->session->promocode : '' ?>" required="">
                    </div>
                    <button type="submit" class="webBtn" id="redeem" <?= !empty($this->session->promocode) ? ' disabled' : '' ?>><?= !empty($this->session->promocode) ? 'Applied' : 'Apply <i class="spinner hidden"></i>' ?></button>
                </div>
                <div class="alertMsg" style="display:none"></div>
            </form>
            <table>
                <tbody>
                    <tr>
                        <td>Total Production</td>
                        <td><?= format_amount($cart_total) ?></td>
                    </tr>
                    <?php if (!empty($this->session->discount_amount)) : ?>
                        <?php $cart_total -= $this->session->discount_amount ?>
                        <tr>
                            <td>Discount Amount</td>
                            <td><?= format_amount($this->session->discount_amount) ?></td>
                        </tr>
                    <?php endif ?>
                    <?php if ($page == 'cart' && !in_array($this->uri->segment(2), ['', 'information'])) : ?>
                        <?php $cart_total += $this->session->delivery_cost ?>
                        <tr>
                            <td>Delivery Cost</td>
                            <td>
                                <!-- <?php if (!isset($this->session->delivery_cost)): ?>
                                    Calculated at later stage
                                <?php endif ?> -->
                                <?= !empty($this->session->delivery_cost) ? format_amount($this->session->delivery_cost) : 'Free' ?>
                                
                            </td>
                        </tr>
                    <?php endif ?>
                    <?php if (!empty($site_settings->site_tex_percentage)) : ?>
                        <?php $total_tax = round(($cart_total * $site_settings->site_tex_percentage) / 100, 2) ?>
                        <tr>
                            <td>Tax <?= $site_settings->site_tex_percentage ?>%</td>
                            <td><?= format_amount($total_tax) ?></td>
                        </tr>
                    <?php endif ?>
                    <tr>
                        <td>TOTAL</td>
                        <td><?= format_amount($cart_total + $total_tax) ?></td>
                    </tr>
                </tbody>
            </table>
            <?php if ($page == 'cart' && $this->uri->segment(2) == '') : ?>
                <div class="bTn formBtn text-center">
                    <a href="<?= site_url('cart/information') ?>" class="webBtn lgBtn blockBtn">Check out</a>
                    <a href="<?= site_url('store') ?>" class="webBtn blankBtn blockBtn"><i class="fi-arrow-left"></i> Continue Shopping</a>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(function() {
        $(document).on('click', '#checkout #smryBtn', function() {
            $(this).toggleClass('change');
            $('#checkout .aside').slideToggle();
        });
        $(document).on('change', '#promocode', function() {
            $('.dscntAmnt').remove();
            $('#redeem').attr("disabled", false).removeClass('disabled').html('Redeem <i class="spinner hidden"></i>');
        });
    })
</script>