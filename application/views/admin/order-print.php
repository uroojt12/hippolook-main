<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Invoice - <?= $adminsite_setting->site_name?></title>
    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="<?= base_url('adminassets/css/bootstrap.css'); ?>">
    <!-- <link rel="stylesheet" href="<?= base_url('adminassets/css/custom.css'); ?>"> -->
    
    <link type="image/png" rel="icon" href="<?= SITE_IMAGES . '/images/' . $adminsite_setting->site_icon ?>">
</head>
<body>
    <h2 class="text-center">Order Invoice</h2>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Order Number</th>
                        <td colspan="3"><?= num_size($row->id); ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>
                            <a href="<?= site_url(ADMIN . '/members/manage/' . $row->mem_id); ?>" target="_blank"><b><?= $row->mem_name; ?></b></a>
                        </td>
                        <th>Date</th>
                        <td><?= format_date($row->date, 'M d, Y h:i:s a'); ?></td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <h3><i class="fa fa-shopping-cart"></i> Order Products</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">#</th>
                        <th>Product</th>
                        <th width="70" class="text-center">Quantity</th>
                        <!-- <th width="100" class="text-right">Total</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $gtotal = 0 ?>
                    <?php foreach ($row->products as $key => $pro) : ?>
                        <?php
                        $total = floatval($pro->qty * $pro->price);
                        $gtotal += $total;
                        ?>
                        <tr>
                            <td class="text-center"><?= $key + 1 ?></td>
                            <td>
                                <img src="<?= get_image_src($pro->image, 150); ?>" alt="" width="40px">
                                <a href="<?= site_url(ADMIN . '/products/manage/' . $pro->p_id); ?>" target="_blank"><b><?= $pro->title; ?></b></a>
                                <p><!-- Color: <?= $pro->color ?> • Size: <?= $pro->size ?> •  -->Shape: <?= $pro->shape ?> <!-- • Material: <?= $pro->material ?> --></p>
                                
                                <?php switch ($pro->glasses) : case 'Non Prescription':?>
                                    <ul class="list">
                                        <li>
                                            <span>Glasses:</span>
                                            <em><?= $pro->glasses?></em>
                                        </li>
                                    </ul>
                                    <?php break; case 'Frame Only':?>
                                        <ul class="list">
                                            <li>
                                                <span>Glasses:</span>
                                                <em><?= $pro->glasses?></em>
                                            </li>
                                            <li>
                                                <span>Lens Type:</span>
                                                <em><?= $pro->lens_type?> <!-- (<?= format_amount($pro->lens_type_price)?>) --></em>
                                             </li>
                                        </ul>
                                    <?php break; case 'Prescription Lens':?>
                                        <ul class="list">
                                            <li>
                                                <span>Glasses:</span>
                                                <em><?= $pro->glasses?></em>
                                            </li>
                                            <li>
                                                <span>Lens Type:</span>
                                                <em><?= $pro->lens_type?> <!-- (<?= format_amount($pro->lens_type_price)?>) --></em>
                                            </li>
                                            <li>
                                                <span>Classic Lenses:</span>
                                                <em><?= $pro->classic_lenses?> <!-- (<?= format_amount($pro->classic_lenses_price)?>) --></em>
                                            </li>
                                        </ul>
                                        <h4>Prescription</h4>
                                        <table class="table table-bordered">
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
                                                    <td><?= $pro->od_left_sph?></td>
                                                    <td><?= $pro->od_left_cyl?></td>
                                                    <td><?= $pro->od_left_axis?></td>
                                                    <td><?= $pro->od_left_pd?></td>
                                                </tr>
                                                <tr>
                                                    <td>OS (Right)</td>
                                                    <td><?= $pro->os_right_sph?></td>
                                                    <td><?= $pro->os_right_cyl?></td>
                                                    <td><?= $pro->os_right_axis?></td>
                                                    <td><?= $pro->os_right_pd?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php if (!empty($pro->prescription_file)): ?>
                                            <div><a href="<?= SITE_VPATH.'attachments/'.$pro->prescription_file?>" target="_blank"><i class="fa fa-paperclip"></i> <?= $pro->prescription_file_name?></a></div>
                                        <?php endif ?>
                                    <?php break; case 'Polarized Lens':?>
                                        <ul class="list">
                                            <li>
                                                <span>Glasses:</span>
                                                <em><?= $pro->glasses?></em>
                                            </li>
                                            <li>
                                                <span>Lens Color:</span>
                                                <em><?= $pro->lens_color?></em>
                                            </li>
                                            <li>
                                                <span>Lens Type:</span>
                                                <em><?= $pro->lens_type?> <!-- (<?= format_amount($pro->lens_type_price)?>) --></em>
                                            </li>
                                            <li>
                                                <span>Classic Lenses:</span>
                                                <em><?= $pro->classic_lenses?> <!-- (<?= format_amount($pro->classic_lenses_price)?>) --></em>
                                            </li>
                                        </ul>
                                        <?php if ($pro->logic_lens_type == 'second'): ?>
                                            <h4>Prescription</h4>
                                            <table class="table table-bordered">
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
                                                        <td><?= $pro->od_left_sph?></td>
                                                        <td><?= $pro->od_left_cyl?></td>
                                                        <td><?= $pro->od_left_axis?></td>
                                                        <td><?= $pro->od_left_pd?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>OS (Right)</td>
                                                        <td><?= $pro->os_right_sph?></td>
                                                        <td><?= $pro->os_right_cyl?></td>
                                                        <td><?= $pro->os_right_axis?></td>
                                                        <td><?= $pro->os_right_pd?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php if (!empty($pro->prescription_file)): ?>
                                                <div><a href="<?= SITE_VPATH.'attachments/'. $pro->prescription_file?>" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg')?>"/><?= $pro->prescription_file_name?></a></div>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php break; case 'Transition Lens':?>
                                        <ul class="list">
                                            <li>
                                                <span>Glasses:</span>
                                                <em><?= $pro->glasses?></em>
                                            </li>
                                            <li>
                                                <span>Lens Type:</span>
                                                <em><?= $pro->lens_type?> <!-- (<?= format_amount($pro->lens_type_price)?>) --></em>
                                            </li>
                                            <li>
                                                <span>Lens Property:</span>
                                                <em><?= $pro->lens_property?> <!-- (<?= format_amount($pro->lens_property_price)?>) --></em>
                                            </li>
                                            <li>
                                                <span>Classic Lenses:</span>
                                                <em><?= $pro->classic_lenses?> <!-- (<?= format_amount($pro->classic_lenses_price)?>) --></em>
                                            </li>
                                        </ul>
                                        <?php if ($pro->logic_lens_type == 'second'): ?>
                                            <h4>Prescription</h4>
                                            <table class="table table-bordered">
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
                                                        <td><?= $pro->od_left_sph?></td>
                                                        <td><?= $pro->od_left_cyl?></td>
                                                        <td><?= $pro->od_left_axis?></td>
                                                        <td><?= $pro->od_left_pd?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>OS (Right)</td>
                                                        <td><?= $pro->os_right_sph?></td>
                                                        <td><?= $pro->os_right_cyl?></td>
                                                        <td><?= $pro->os_right_axis?></td>
                                                        <td><?= $pro->os_right_pd?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php if (!empty($pro->prescription_file)): ?>
                                                <div><a href="<?= SITE_VPATH.'attachments/'. $pro->prescription_file?>" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg')?>"/><?= $pro->prescription_file_name?></a></div>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php break; case 'Progressive Lens':?>
                                        <ul class="list">
                                            <li>
                                                <span>Glasses:</span>
                                                <em><?= $pro->glasses?></em>
                                            </li>
                                            <li>
                                                <span>Lens Type:</span>
                                                <em><?= $pro->lens_type?> <!-- (<?= format_amount($pro->lens_type_price)?>) --></em>
                                            </li>
                                            <li>
                                                <span>Lens Property:</span>
                                                <em><?= $pro->lens_property?> <!-- (<?= format_amount($pro->lens_property_price)?>) --></em>
                                            </li>
                                            <li>
                                                <span>Classic Lenses:</span>
                                                <em><?= $pro->classic_lenses?> <!-- (<?= format_amount($pro->classic_lenses_price)?>) --></em>
                                            </li>
                                        </ul>
                                        <h4>Prescription</h4>
                                        <table class="table table-bordered">
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
                                                    <td><?= $pro->od_left_sph?></td>
                                                    <td><?= $pro->od_left_cyl?></td>
                                                    <td><?= $pro->od_left_axis?></td>
                                                    <td><?= $pro->od_left_pd?></td>
                                                    <td><?= $pro->od_left_add?></td>
                                                </tr>
                                                <tr>
                                                    <td>OS (Right)</td>
                                                    <td><?= $pro->os_right_sph?></td>
                                                    <td><?= $pro->os_right_cyl?></td>
                                                    <td><?= $pro->os_right_axis?></td>
                                                    <td><?= $pro->os_right_pd?></td>
                                                    <td><?= $pro->os_right_add?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php if (!empty($pro->prescription_file)): ?>
                                            <div><a href="<?= SITE_VPATH.'attachments/'. $pro->prescription_file?>" target="_blank"><img src="<?= base_url('assets/images/icon-clip.svg')?>"/><?= $pro->prescription_file_name?></a></div>
                                        <?php endif ?>
                                    <?php break;?>
                                <?php endswitch; ?>
                            </td>
                            <td class="text-center"><?= $pro->qty ?></td>
                            <!-- <td class="text-right"><?= format_amount($pro->total) ?></td> -->
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <!-- <tfoot>
                    <tr>
                        <th colspan="3" class="text-right bold">Grand Total</th>
                        <td class="text-right"><b><?= format_amount($row->product_total) ?></b></td>
                    </tr>
                    <?php if (!empty($row->discount_code)) : ?>
                        <tr>
                            <th colspan="3" class="text-right bold">Discount code (<?= $row->discount_code ?>)</th>
                            <td class="text-right"><b><?= format_amount($row->discount_amount) ?></b></td>
                        </tr>
                    <?php endif ?>
                    <?php if (!empty($row->delivery_cost)) : ?>
                        <tr>
                            <th colspan="3" class="text-right bold">Delivery Cost</th>
                            <td class="text-right"><b><?= format_amount($row->delivery_cost) ?></b></td>
                        </tr>
                    <?php endif ?>
                    <?php if (!empty($row->tax)) : ?>
                        <tr>
                            <th colspan="3" class="text-right bold">Tax (<?= $row->tax ?>%)</th>
                            <td class="text-right"><b><?= format_amount($row->tax_amount) ?></b></td>
                        </tr>
                    <?php endif ?>
                    <tr>
                        <th colspan="3" class="text-right bold">Total</th>
                        <td class="text-right"><b><?= format_amount($row->product_total - $row->discount_amount + $row->tax_amount + $row->delivery_cost) ?></b></td>
                    </tr>
                </tfoot> -->
            </table>

            <!-- <hr>
            <h3><i class="fa fa-truck"></i> Shipping Detail</h3>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Contact Email</th>
                        <td><?= $row->contact_email ?></td>
                        <th>Phone Number</th>
                        <td><?= $row->ship_phone ?></td>
                    </tr>
                    <tr>
                        <th width="15%">First Name</th>
                        <td width="35%"><?= $row->ship_fname ?></td>
                        <th width="15%">Last Name</th>
                        <td width="35%"><?= $row->ship_lname ?></td>
                    </tr>
                    <tr>
                        <th>Company</th>
                        <td><?= $row->ship_country ?></td>
                        <th>Address</th>
                        <td><?= $row->ship_address ?></td>
                    </tr>
                    <tr>
                        <th>House Number</th>
                        <td><?= $row->ship_house_number ?></td>
                        <th>Zip Code</th>
                        <td><?= $row->ship_zip ?></td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td><?= $row->ship_country ?></td>
                        <th>City</th>
                        <td><?= $row->ship_city ?></td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <h3><i class="fa fa-money"></i> Billing Detail</h3>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th width="15%">First Name</th>
                        <td width="35%"><?= $row->ship_fname ?></td>
                        <th width="15%">Last Name</th>
                        <td width="35%"><?= $row->ship_lname ?></td>
                    </tr>
                    <tr>
                        <th>Company</th>
                        <td><?= $row->ship_country ?></td>
                        <th>Address</th>
                        <td><?= $row->ship_address ?></td>
                    </tr>
                    <tr>
                        <th>House Number</th>
                        <td><?= $row->ship_house_number ?></td>
                        <th>Zip Code</th>
                        <td><?= $row->ship_zip ?></td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td><?= $row->ship_country ?></td>
                        <th>City</th>
                        <td><?= $row->ship_city ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td><?= $row->ship_phone ?></td>
                    </tr>
                </tbody>
            </table> -->
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    (function($) {
        $(function() {

        })
    }(jQuery))
</script>