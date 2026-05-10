<!doctype html>
<html>

    <head>
        <title>
            <?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Product Detail — ' ?><?= $site_settings->site_name ?>
        </title>
        <?php $this->load->view('includes/site-master'); ?>
    </head>

    <body id="home-page">
        <?php $this->load->view('includes/header'); ?>
        <main common detail>


            <section id="detail">
                <div class="contain-fluid">
                    <?php if (!empty($this->session->error_msg)) : ?>
                    <?= $this->session->error_msg ?>
                    <?= $this->session->unset_userdata('error_msg') ?>
                    <?php endif ?>
                    <?= showMsg() ?>
                    <div class="flexRow flex">
                        <div class="col col1">
                            <div id="owl-product" class="owl-carousel owl-theme">
                                <div class="image" data-hash="item0">
                                    <img src="<?= get_image_src($row->image) ?>" alt="">
                                </div>
                                <?php foreach ($row->images as $key => $img) : ?>
                                <div class="image" data-hash="item<?= $key + 1 ?>">
                                    <img src="<?= get_image_src($img->image) ?>" alt="">
                                </div>
                                <?php endforeach ?>
                            </div>
                            <div id="owl-thumbnail" class="owl-carousel owl-theme">
                                <a href="#item0"><img src="<?= get_image_src($row->image, 150) ?>" alt=""></a>
                                <?php foreach ($row->images as $key => $img) : ?>
                                <a href="#item<?= $key + 1 ?>"><img src="<?= get_image_src($img->image, 150) ?>"
                                        alt=""></a>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="col col2">
                            <div class="content">
                                <h2 class="heading"><?= $row->title ?></h2>
                                <div class="txtGrp wishBtn">
                                    <?= favorite_btn($row->id, 'product') ?>
                                </div>
                                <div class="txtGrp priceBlk relative">
                                    <div class="price">
                                        <?= format_amount($row->price) ?>
                                        <?php if (!empty($row->old_price)) : ?>
                                        <del><?= format_amount($row->old_price) ?></del>
                                        <?php endif ?>
                                    </div>
                                    <!-- <div class="webBtn smBtn">20% OFF</div>
                                <div class="coupon">
                                    <i class="fi-percent fi-2x"></i>
                                    $5 OFF On First Order
                                    <a href="?" class="webBtn labelBtn">GET</a>
                                </div> -->
                                </div>
                                <div class="txtGrp">
                                    <?php if ($row->stock > 0) : ?>
                                    <?php if ($row->stock < 5) : ?>
                                    <h6>Available Stock: <em class="green-color">left <?= $row->stock ?> only</em></h6>
                                    <?php endif; ?>
                                    <?php else : ?>
                                    <h6><em class="red-color">Out of Stock</em></h6>
                                    <?php endif ?>
                                </div>
                                <div class="txtGrp">
                                    <h6>Size: <span><?= $row->size ?></span></h6>

                                    <h6>Shape: <span><?= $row->shape ?></span></h6>
                                    <p><a href="javascript:void(0)" class="popBtn" data-popup="design-guide">Design
                                            Guide</a></p>
                                </div>
                                <!-- <div class="txtGrp">
                            </div>
                            <div class="txtGrp">
                                <h6>Material: <span><?= $row->material ?></span></h6>
                            </div> -->
                                <div class="txtGrp">
                                    <!-- <h6>Color: <span><?= $row->color ?></span></h6>
                                <ul class="colorLst flex">
                                    <li>
                                        <div><img src="<?= base_url('assets/images/store/1.jpg') ?>" alt=""></div>
                                    </li>
                                    <li class="active">
                                        <div><img src="<?= base_url('assets/images/store/2.jpg') ?>" alt=""></div>
                                    </li>
                                    <li>
                                        <div><img src="<?= base_url('assets/images/store/3.jpg') ?>" alt=""></div>
                                    </li>
                                    <li>
                                        <div><img src="<?= base_url('assets/images/store/4.jpg') ?>" alt=""></div>
                                    </li>
                                </ul> -->
                                </div>
                                <?php if ($row->stock > 0) : ?>
                                <div class="bTn btnLst">
                                    <button class="webBtn lgBtn funBtn">Select</button>
                                    <!-- <button class="webBtn lgBtn lenseBtn">Select Lenses</button>
                                    <button class="webBtn lgBtn blankBtn borderBtn frameBtn">Frame only</button> -->
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="flexRow flex">
                    <div class="col col1">
                        <ul class="dots"></ul>
                        <div id="products">
                            <div class="image" data-id="0"><img src="<?= get_image_src($row->image) ?>" alt=""></div>
                            <?php foreach ($row->images as $key => $img) : ?>
                                <div class="image" data-id="<?= $key + 1 ?>"><img src="<?= get_image_src($img->image) ?>" alt=""></div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col col2">
                        <div class="content">
                            <h4><?= $row->title ?></h4>
                            <h5 class="price" id="defaultCost"><?= format_amount($row->default_price) ?></h5>
                            <?= $row->detail ?>
                            <?php if (!empty($row->availability)) : ?>
                                <form action="<?= site_url('cart/add-item/' . $row->id) ?>" method="post" class="bTn" id="frmCart">
                                    <select name="size" id="size" class="txtBox" required="">
                                        <option value="" disabled="" selected="">Size</option>
                                        <?php foreach ($row->sizes as $key => $size) : ?>
                                            <option value="<?= $size->size ?>" data-price="<?= $size->price ?>"><?= $size->size ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <select name="color" id="color" class="txtBox" required="">
                                        <option value="" disabled="" selected="">Color</option>
                                        <?php foreach ($row->colors as $key => $color) : ?>
                                            <option value="<?= $color->color ?>"><?= $color->color ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <button href="submit" class="webBtn">Add to cart</button>
                                </form>
                            <?php else : ?>
                                <div class="color"><b>Out of Stock</b></div>
                            <?php endif ?>
                            <hr>
                            <h6>Secued payment <i class="fi-arrow-up"></i></h6>
                            <div class="ckEditor">
                                <?= $site_content['secure_payment'] ?>
                            </div>
                            <hr>
                            <h6>Return and shipping <i class="fi-arrow-up"></i></h6>
                            <div class="ckEditor">
                                <?= $site_content['return_shipping'] ?>
                            </div>
                        </div>
                    </div>
                </div> -->
                </div>
                <div class="popup big-popup" data-popup="design-guide">
                    <div class="tableDv">
                        <div class="tableCell">
                            <div class="contain">
                                <div class="_inner">
                                    <div class="crosBtn"></div>
                                    <h3>Our Frame Sizes</h3>
                                    <div class="text-center">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Size Frame</td>
                                                    <td>Width(mm)</td>
                                                </tr>
                                                <tr>
                                                    <td>Narrow</td>
                                                    <td>≦128mm</td>
                                                </tr>
                                                <tr>
                                                    <td>Medium</td>
                                                    <td>129mm - 138mm</td>
                                                </tr>
                                                <tr>
                                                    <td>Wide</td>
                                                    <td>≥139mm</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p class="small">We suggest you measure your frame dimensions to make sure your
                                            new glasses correctly fit your face.</p>
                                    </div>
                                    <hr>
                                    <div class="mainRow flex">
                                        <div class="col">
                                            <div class="inner">
                                                <!-- <div class="size">135.00mm</div> -->
                                                <div class="txt">
                                                    <img src="<?= base_url('assets/images/frame/1.jpg') ?>" alt="">
                                                    <h6>Frame Width</h6>
                                                    <p>Frame Width is the measurement horizontally across the back of
                                                        the frame.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="inner">
                                                <!-- <div class="size">53.00mm</div> -->
                                                <div class="txt">
                                                    <img src="<?= base_url('assets/images/frame/2.jpg') ?>" alt="">
                                                    <h6>Lens Width</h6>
                                                    <p>Lens Width is the width of each lens at its widest point.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="inner">
                                                <!-- <div class="size">40.00mm</div> -->
                                                <div class="txt">
                                                    <img src="<?= base_url('assets/images/frame/3.jpg') ?>" alt="">
                                                    <h6>Lens Height</h6>
                                                    <p>Lens Height is the vertical distance of the lens at its tallest
                                                        point. If you want to order progressive, the lens height of the
                                                        frame should be at least 33mm.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="inner">
                                                <!-- <div class="size">18.00mm</div> -->
                                                <div class="txt">
                                                    <img src="<?= base_url('assets/images/frame/4.jpg') ?>" alt="">
                                                    <h6>Bridge Width</h6>
                                                    <p>Bridge Width is the shortest distance (in millimeters) between
                                                        your two lenses.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="inner">
                                                <!-- <div class="size">147.00mm</div> -->
                                                <div class="txt">
                                                    <img src="<?= base_url('assets/images/frame/5.jpg') ?>" alt="">
                                                    <h6>Temple Length</h6>
                                                    <p>Temple Length is the length of the temple to its temple tip,
                                                        including the bend that sits on your ear.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="small text-center">Due to the different measurements methods, the
                                        measurements printed on the inside of the temple arm may vary from those showing
                                        on our website.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($row->stock > 0) : ?>
                <div id="function">
                    <div class="crosBtn"></div>
                    <div class="inside">
                        <div class="contain text-center">
                            <form action="<?= site_url('cart/add-item/' . $row->id) ?>" method="post" id="frmCart">
                                <fieldset>
                                    <h1 class="heading">Choose Glasses</h1>
                                    <div class="mainRow flex">
                                        <?php if (!empty($row->sunglasses)) : ?>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="glasses" id="glasses_nonPrescription"
                                                    value="Non Prescription" data-price="0">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $sixth_content['main_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $glasses[5]->title ?></h5>
                                                        <p><?= $sixth_content['overview'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php else : ?>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="glasses" id="glasses_frame" value="Frame Only"
                                                    class="nextBtn" data-option="frame">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $first_content['main_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $glasses[0]->title ?></h5>
                                                        <p><?= $first_content['overview'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif ?>
                                        <?php if (empty($row->frame_only)) : ?>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="glasses" id="glasses_prescription"
                                                    value="Prescription Lens" class="nextBtn"
                                                    data-option="prescription">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $second_content['main_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $glasses[1]->title ?></h5>
                                                        <p><?= $second_content['overview'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="glasses" id="glasses_polarized"
                                                    value="Polarized Lens" class="nextBtn" data-option="polarized">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $third_content['main_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $glasses[2]->title ?></h5>
                                                        <p><?= $third_content['overview'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="glasses" id="glasses_transition"
                                                    value="Transition Lens" class="nextBtn" data-option="transition">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fourth_content['main_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $glasses[3]->title ?></h5>
                                                        <p><?= $fourth_content['overview'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="glasses" id="glasses_progressive"
                                                    value="Progressive Lens" class="nextBtn" data-option="progressive">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fifth_content['main_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $glasses[4]->title ?></h5>
                                                        <p><?= $fifth_content['overview'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="submit" class="webBtn lgBtn hidden"
                                                disabled="">Add to cart</button></div>
                                    </div>
                                </fieldset>

                                <fieldset data-option="frame">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Lens Type</h1>
                                    <div class="mainRow flex">
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="frame_lens_type" id="frame_lens_type_clear"
                                                    value="<?= $first_content['type_first_title'] ?>"
                                                    data-price="<?= $glasses[0]->type_first_price ?>">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $first_content['type_first_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $first_content['type_first_title'] ?></h5>
                                                        <p><?= $first_content['type_first_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[0]->type_first_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="frame_lens_type"
                                                    id="frame_lens_type_blueLight"
                                                    value="<?= $first_content['type_second_title'] ?>"
                                                    data-price="<?= $glasses[0]->type_second_price ?>">
                                                <div class="inner active">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $first_content['type_second_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $first_content['type_second_title'] ?></h5>
                                                        <p><?= $first_content['type_second_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[0]->type_second_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="submit" class="webBtn lgBtn hidden"
                                                disabled="">Add to cart</button></div>
                                    </div>
                                </fieldset>

                                <?php if (empty($row->frame_only)) : ?>
                                <fieldset data-option="prescription">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Enter your prescription</h1>
                                    <div class="inBlk">
                                        <table>
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
                                                    <td>
                                                        <select name="prescription_od_left_sph"
                                                            id="prescription_od_left_sph" class="txtBox scrollbar">
                                                            <option value="-20.00">-20.00</option>
                                                            <?php foreach (range(-19, 11) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+12.00">+12.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="prescription_od_left_cyl"
                                                            id="prescription_od_left_cyl" class="txtBox scrollbar">
                                                            <option value="-6.00">-6.00</option>
                                                            <?php foreach (range(-5, 5) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+6.00">+6.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="prescription_od_left_axis"
                                                            id="prescription_od_left_axis" class="txtBox scrollbar">
                                                            <option value="None" selected="">None</option>
                                                            <?php foreach (range(1, 180) as $value) : ?>
                                                            <option value="<?= $value ?>"><?= $value ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="prescription_od_left_pd"
                                                            id="prescription_od_left_pd" class="txtBox scrollbar">
                                                            <option value="0.00" selected="">0.00</option>
                                                            <?php foreach (range(26, 39) as $value) : ?>
                                                            <option value="<?= $value ?>.0"><?= $value ?>.0</option>
                                                            <option value="<?= $value ?>.5"><?= $value ?>.5</option>
                                                            <?php endforeach ?>
                                                            <option value="40.0">40.0</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>OS (Right)</td>
                                                    <td>
                                                        <select name="prescription_os_right_sph"
                                                            id="prescription_os_right_sph" class="txtBox scrollbar">
                                                            <option value="-20.00">-20.00</option>
                                                            <?php foreach (range(-19, 11) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+12.00">+12.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="prescription_os_right_cyl"
                                                            id="prescription_os_right_cyl" class="txtBox scrollbar">
                                                            <option value="-6.00">-6.00</option>
                                                            <?php foreach (range(-5, 5) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+6.00">+6.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="prescription_os_right_axis"
                                                            id="prescription_os_right_axis" class="txtBox scrollbar">
                                                            <option value="None" selected="">None</option>
                                                            <?php foreach (range(1, 180) as $value) : ?>
                                                            <option value="<?= $value ?>"><?= $value ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="prescription_os_right_pd"
                                                            id="prescription_os_right_pd" class="txtBox scrollbar">
                                                            <option value="0.00" selected="">0.00</option>
                                                            <?php foreach (range(26, 39) as $value) : ?>
                                                            <option value="<?= $value ?>.0"><?= $value ?>.0</option>
                                                            <option value="<?= $value ?>.5"><?= $value ?>.5</option>
                                                            <?php endforeach ?>
                                                            <option value="40.0">40.0</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="or bTn formBtn medium">OR</div>
                                        <div class="bTn formBtn tex-center">
                                            <button type="button" class="webBtn uploadImg" data-upload=""
                                                data-text="Upload Prescription"></button>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="button" class="webBtn lgBtn nextBtn"
                                                data-step="1">Submit Prescription</button></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="prescription">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Does this match your prescription?</h1>
                                    <div class="inBlk">
                                        <table>
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
                                                    <td id="prescription_od_left_sph1">0.00</td>
                                                    <td id="prescription_od_left_cyl1">0.00</td>
                                                    <td id="prescription_od_left_axis1">0.00</td>
                                                    <td id="prescription_od_left_pd1">0.00</td>
                                                </tr>
                                                <tr>
                                                    <td>OS (Right)</td>
                                                    <td id="prescription_os_right_sph1">0.00</td>
                                                    <td id="prescription_os_right_cyl1">0.00</td>
                                                    <td id="prescription_os_right_axis1">0.00</td>
                                                    <td id="prescription_os_right_pd1">0.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="button"
                                                class="webBtn lgBtn nextBtn">Confirm</button></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="prescription">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Lens Type</h1>
                                    <div class="mainRow flex">
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="prescription_lens_type"
                                                    id="prescription_lens_type_classic"
                                                    value="<?= $second_content['type_first_title'] ?>"
                                                    data-price="<?= $glasses[1]->type_first_price ?>" class="nextBtn"
                                                    data-option="prescription">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $second_content['type_first_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $second_content['type_first_title'] ?></h5>
                                                        <p><?= $second_content['type_first_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[1]->type_first_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="prescription_lens_type"
                                                    id="prescription_lens_type_blueLight"
                                                    value="<?= $second_content['type_second_title'] ?>"
                                                    data-price="<?= $glasses[1]->type_first_price ?>" class="nextBtn"
                                                    data-option="prescription">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $second_content['type_second_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $second_content['type_second_title'] ?></h5>
                                                        <p><?= $second_content['type_second_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[1]->type_second_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="prescription">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Classic Lenses</h1>
                                    <div class="mainRow flex">
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="prescription_classic_lenses"
                                                    id="prescription_classic_lensesStandard"
                                                    value="<?= $second_content['classic_first_title'] ?>"
                                                    data-price="<?= $glasses[1]->classic_first_price ?>">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $second_content['classic_first_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $second_content['classic_first_title'] ?></h5>
                                                        <p><?= $second_content['classic_first_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[1]->classic_first_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="prescription_classic_lenses"
                                                    id="prescription_classic_lensesRecommend"
                                                    value="<?= $second_content['classic_second_title'] ?>"
                                                    data-price="<?= $glasses[1]->classic_second_price ?>">
                                                <div class="inner active">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $second_content['classic_second_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $second_content['classic_second_title'] ?></h5>
                                                        <p><?= $second_content['classic_second_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[1]->classic_second_price) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="prescription_classic_lenses"
                                                    id="prescription_classic_lensesAdvanced"
                                                    value="<?= $second_content['classic_third_title'] ?>"
                                                    data-price="<?= $glasses[1]->classic_third_price ?>">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $second_content['classic_third_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $second_content['classic_third_title'] ?></h5>
                                                        <p><?= $second_content['classic_third_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[1]->classic_third_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="submit" class="webBtn lgBtn hidden"
                                                disabled="">Add to cart</button></div>
                                    </div>
                                </fieldset>

                                <fieldset data-option="polarized">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Choose colors</h1>
                                    <ul class="colorRow flex">
                                        <?php foreach ($colors as $key => $color) : ?>
                                        <li>
                                            <div class="radioBtn">
                                                <input type="radio" name="polarized_color"
                                                    id="polarized_color<?= $key ?>" value="<?= $color->title ?>"
                                                    class="nextBtn" data-option="polarized">
                                                <div class="ico"><img
                                                        src="<?= get_site_image_src("colors", $color->image); ?>"
                                                        alt="<?= $color->title ?>"></div>
                                                <em><?= $color->title ?></em>
                                            </div>
                                        </li>
                                        <?php endforeach ?>
                                    </ul>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="polarized">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Lens Type</h1>
                                    <div class="mainRow flex">
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="polarized_lens_type"
                                                    id="polarized_lens_type_Normal"
                                                    value="<?= $third_content['type_first_title'] ?>"
                                                    data-price="<?= $glasses[2]->type_first_price ?>" class="nextBtn"
                                                    data-option="polarized" data-step="2">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $third_content['type_first_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $third_content['type_first_title'] ?></h5>
                                                        <p><?= $third_content['type_first_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[2]->type_first_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="polarized_lens_type"
                                                    id="polarized_lens_type_Prescription"
                                                    value="<?= $third_content['type_second_title'] ?>"
                                                    data-price="<?= $glasses[2]->type_second_price ?>" class="nextBtn"
                                                    data-option="polarized">
                                                <div class="inner nextBtn">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $third_content['type_second_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $third_content['type_second_title'] ?></h5>
                                                        <p><?= $third_content['type_second_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[2]->type_second_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="polarized">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Enter your prescription</h1>
                                    <div class="inBlk">
                                        <table>
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
                                                    <td>
                                                        <select name="polarized_od_left_sph" id="polarized_od_left_sph"
                                                            class="txtBox scrollbar">
                                                            <option value="-20.00">-20.00</option>
                                                            <?php foreach (range(-19, 11) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+12.00">+12.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="polarized_od_left_cyl" id="polarized_od_left_cyl"
                                                            class="txtBox scrollbar">
                                                            <option value="-6.00">-6.00</option>
                                                            <?php foreach (range(-5, 5) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+6.00">+6.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="polarized_od_left_axis"
                                                            id="polarized_od_left_axis" class="txtBox scrollbar">
                                                            <option value="None" selected="">None</option>
                                                            <?php foreach (range(1, 180) as $value) : ?>
                                                            <option value="<?= $value ?>"><?= $value ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="polarized_od_left_pd" id="polarized_od_left_pd"
                                                            class="txtBox scrollbar">
                                                            <option value="0.00" selected="">0.00</option>
                                                            <?php foreach (range(26, 39) as $value) : ?>
                                                            <option value="<?= $value ?>.0"><?= $value ?>.0</option>
                                                            <option value="<?= $value ?>.5"><?= $value ?>.5</option>
                                                            <?php endforeach ?>
                                                            <option value="40.0">40.0</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>OS (Right)</td>
                                                    <td>
                                                        <select name="polarized_os_right_sph"
                                                            id="polarized_os_right_sph" class="txtBox scrollbar">
                                                            <option value="-20.00">-20.00</option>
                                                            <?php foreach (range(-19, 11) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+12.00">+12.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="polarized_os_right_cyl"
                                                            id="polarized_os_right_cyl" class="txtBox scrollbar">
                                                            <option value="-6.00">-6.00</option>
                                                            <?php foreach (range(-5, 5) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+6.00">+6.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="polarized_os_right_axis"
                                                            id="polarized_os_right_axis" class="txtBox scrollbar">
                                                            <option value="None" selected="">None</option>
                                                            <?php foreach (range(1, 180) as $value) : ?>
                                                            <option value="<?= $value ?>"><?= $value ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="polarized_os_right_pd" id="polarized_os_right_pd"
                                                            class="txtBox scrollbar">
                                                            <option value="0.00" selected="">0.00</option>
                                                            <?php foreach (range(26, 39) as $value) : ?>
                                                            <option value="<?= $value ?>.0"><?= $value ?>.0</option>
                                                            <option value="<?= $value ?>.5"><?= $value ?>.5</option>
                                                            <?php endforeach ?>
                                                            <option value="40.0">40.0</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="or bTn formBtn medium">OR</div>
                                        <div class="bTn formBtn tex-center">
                                            <button type="button" class="webBtn uploadImg" data-upload=""
                                                data-text="Upload Prescription"></button>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="button" class="webBtn lgBtn nextBtn"
                                                data-step="3">Submit Prescription</button></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="polarized">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Does this match your prescription?</h1>
                                    <div class="inBlk">
                                        <table>
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
                                                    <td id="polarized_od_left_sph1">0.00</td>
                                                    <td id="polarized_od_left_cyl1">0.00</td>
                                                    <td id="polarized_od_left_axis1">0.00</td>
                                                    <td id="polarized_od_left_pd1">0.00</td>
                                                </tr>
                                                <tr>
                                                    <td>OS (Right)</td>
                                                    <td id="polarized_os_right_sph1">0.00</td>
                                                    <td id="polarized_os_right_cyl1">0.00</td>
                                                    <td id="polarized_os_right_axis1">0.00</td>
                                                    <td id="polarized_os_right_pd1">0.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="button"
                                                class="webBtn lgBtn nextBtn">Confirm</button></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="polarized">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Classic Lenses</h1>
                                    <div class="mainRow flex">
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="polarized_classic_lenses"
                                                    id="polarized_classic_lensesStandard"
                                                    value="<?= $third_content['classic_first_title'] ?>"
                                                    data-price="<?= $glasses[2]->classic_first_price ?>">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $third_content['classic_first_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $third_content['classic_first_title'] ?></h5>
                                                        <p><?= $third_content['classic_first_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[2]->classic_first_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="polarized_classic_lenses"
                                                    id="polarized_classic_lensesRecommend"
                                                    value="<?= $third_content['classic_second_title'] ?>"
                                                    data-price="<?= $glasses[2]->classic_second_price ?>">
                                                <div class="inner active">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $third_content['classic_second_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $third_content['classic_second_title'] ?></h5>
                                                        <p><?= $third_content['classic_second_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[2]->classic_second_price) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="polarized_classic_lenses"
                                                    id="polarized_classic_lensesAdvanced"
                                                    value="<?= $third_content['classic_third_title'] ?>"
                                                    data-price="<?= $glasses[2]->classic_third_price ?>">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $third_content['classic_third_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $third_content['classic_third_title'] ?></h5>
                                                        <p><?= $third_content['classic_third_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[2]->classic_third_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="submit" class="webBtn lgBtn hidden"
                                                disabled="">Add to cart</button></div>
                                    </div>
                                </fieldset>

                                <fieldset data-option="transition">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Lens Type</h1>
                                    <div class="mainRow flex">
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="transition_lens_type"
                                                    id="transition_lens_type_clear"
                                                    value="<?= $fourth_content['type_first_title'] ?>"
                                                    data-price="<?= $glasses[3]->type_first_price ?>" class="nextBtn"
                                                    data-option="transition">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fourth_content['type_first_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fourth_content['type_first_title'] ?></h5>
                                                        <p><?= $fourth_content['type_first_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[3]->type_first_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="transition_lens_type"
                                                    id="transition_lens_type_Prescription"
                                                    value="<?= $fourth_content['type_second_title'] ?>"
                                                    data-price="<?= $glasses[3]->type_second_price ?>" class="nextBtn"
                                                    data-option="transition">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fourth_content['type_second_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fourth_content['type_second_title'] ?></h5>
                                                        <p><?= $fourth_content['type_second_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[3]->type_second_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="transition">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Enter your prescription</h1>
                                    <div class="inBlk">
                                        <table>
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
                                                    <td>
                                                        <select name="transition_od_left_sph"
                                                            id="transition_od_left_sph" class="txtBox scrollbar">
                                                            <option value="-10.00">-10.00</option>
                                                            <?php foreach (range(-9, 5) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+6.00">+6.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="transition_od_left_cyl"
                                                            id="transition_od_left_cyl" class="txtBox scrollbar">
                                                            <option value="-4.00">-4.00</option>
                                                            <?php foreach (range(-3, 3) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+4.00">+4.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="transition_od_left_axis"
                                                            id="transition_od_left_axis" class="txtBox scrollbar">
                                                            <option value="None" selected="">None</option>
                                                            <?php foreach (range(1, 180) as $value) : ?>
                                                            <option value="<?= $value ?>"><?= $value ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="transition_od_left_pd" id="transition_od_left_pd"
                                                            class="txtBox scrollbar">
                                                            <option value="0.00" selected="">0.00</option>
                                                            <?php foreach (range(26, 39) as $value) : ?>
                                                            <option value="<?= $value ?>.0"><?= $value ?>.0</option>
                                                            <option value="<?= $value ?>.5"><?= $value ?>.5</option>
                                                            <?php endforeach ?>
                                                            <option value="40.0">40.0</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>OS (Right)</td>
                                                    <td>
                                                        <select name="transition_os_right_sph"
                                                            id="transition_os_right_sph" class="txtBox scrollbar">
                                                            <option value="-10.00">-10.00</option>
                                                            <?php foreach (range(-9, 5) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+6.00">+6.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="transition_os_right_cyl"
                                                            id="transition_os_right_cyl" class="txtBox scrollbar">
                                                            <option value="-4.00">-4.00</option>
                                                            <?php foreach (range(-3, 3) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+4.00">+4.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="transition_os_right_axis"
                                                            id="transition_os_right_axis" class="txtBox scrollbar">
                                                            <option value="None" selected="">None</option>
                                                            <?php foreach (range(1, 180) as $value) : ?>
                                                            <option value="<?= $value ?>"><?= $value ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="transition_os_right_pd"
                                                            id="transition_os_right_pd" class="txtBox scrollbar">
                                                            <option value="0.00" selected="">0.00</option>
                                                            <?php foreach (range(26, 39) as $value) : ?>
                                                            <option value="<?= $value ?>.0"><?= $value ?>.0</option>
                                                            <option value="<?= $value ?>.5"><?= $value ?>.5</option>
                                                            <?php endforeach ?>
                                                            <option value="40.0">40.0</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="or bTn formBtn medium">OR</div>
                                        <div class="bTn formBtn tex-center">
                                            <button type="button" class="webBtn uploadImg" data-upload=""
                                                data-text="Upload Prescription"></button>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="button" class="webBtn lgBtn nextBtn"
                                                data-step="2">Submit Prescription</button></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="transition">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Does this match your prescription?</h1>
                                    <div class="inBlk">
                                        <table>
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
                                                    <td id="transition_od_left_sph1">0.00</td>
                                                    <td id="transition_od_left_cyl1">0.00</td>
                                                    <td id="transition_od_left_axis1">0.00</td>
                                                    <td id="transition_od_left_pd1">0.00</td>
                                                </tr>
                                                <tr>
                                                    <td>OS (Right)</td>
                                                    <td id="transition_os_right_sph1">0.00</td>
                                                    <td id="transition_os_right_cyl1">0.00</td>
                                                    <td id="transition_os_right_axis1">0.00</td>
                                                    <td id="transition_os_right_pd1">0.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="button"
                                                class="webBtn lgBtn nextBtn">Confirm</button></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="transition">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Lens Property</h1>
                                    <div class="mainRow flex">
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="transition_lens_property"
                                                    id="transition_lens_property_normal"
                                                    value="<?= $fourth_content['property_first_title'] ?>"
                                                    data-price="<?= $glasses[3]->property_first_price ?>"
                                                    class="nextBtn" data-option="transition">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fourth_content['property_first_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fourth_content['property_first_title'] ?></h5>
                                                        <p><?= $fourth_content['property_first_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[3]->property_first_price) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="transition_lens_property"
                                                    id="transition_lens_property_blueLight"
                                                    value="<?= $fourth_content['property_second_title'] ?>"
                                                    data-price="<?= $glasses[3]->property_second_price ?>"
                                                    class="nextBtn" data-option="transition">
                                                <div class="inner nextBtn">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fourth_content['property_second_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fourth_content['property_second_title'] ?></h5>
                                                        <p><?= $fourth_content['property_second_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[3]->property_second_price) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="transition">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Classic Lenses</h1>
                                    <div class="mainRow flex">
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="transition_classic_lenses"
                                                    id="transition_classic_lensesStandard"
                                                    value="<?= $fourth_content['classic_first_title'] ?>"
                                                    data-price="<?= $glasses[3]->classic_first_price ?>">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fourth_content['classic_first_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fourth_content['classic_first_title'] ?></h5>
                                                        <p><?= $fourth_content['classic_first_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[3]->classic_first_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="transition_classic_lenses"
                                                    id="transition_classic_lensesRecommend"
                                                    value="<?= $fourth_content['classic_second_title'] ?>"
                                                    data-price="<?= $glasses[3]->classic_second_price ?>">
                                                <div class="inner active">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fourth_content['classic_second_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fourth_content['classic_second_title'] ?></h5>
                                                        <p><?= $fourth_content['classic_second_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[3]->classic_second_price) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="transition_classic_lenses"
                                                    id="transition_classic_lensesAdvanced"
                                                    value="<?= $fourth_content['classic_third_title'] ?>"
                                                    data-price="<?= $glasses[3]->classic_third_price ?>">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fourth_content['classic_third_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fourth_content['classic_third_title'] ?></h5>
                                                        <p><?= $fourth_content['classic_third_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[3]->classic_third_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="submit" class="webBtn lgBtn hidden"
                                                disabled="">Add to cart</button></div>
                                    </div>
                                </fieldset>

                                <fieldset data-option="progressive">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Enter your prescription</h1>
                                    <div class="inBlk">
                                        <table>
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
                                                    <td>
                                                        <select name="progressive_od_left_sph"
                                                            id="progressive_od_left_sph" class="txtBox scrollbar">
                                                            <option value="-10.00">-10.00</option>
                                                            <?php foreach (range(-9, 5) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+6.00">+6.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="progressive_od_left_cyl"
                                                            id="progressive_od_left_cyl" class="txtBox scrollbar">
                                                            <option value="-4.00">-4.00</option>
                                                            <?php foreach (range(-3, 3) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+4.00">+4.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="progressive_od_left_axis"
                                                            id="progressive_od_left_axis" class="txtBox scrollbar">
                                                            <option value="None" selected="">None</option>
                                                            <?php foreach (range(1, 180) as $value) : ?>
                                                            <option value="<?= $value ?>"><?= $value ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="progressive_od_left_pd"
                                                            id="progressive_od_left_pd" class="txtBox scrollbar">
                                                            <option value="0.00" selected="">0.00</option>
                                                            <?php foreach (range(26, 39) as $value) : ?>
                                                            <option value="<?= $value ?>.0"><?= $value ?>.0</option>
                                                            <option value="<?= $value ?>.5"><?= $value ?>.5</option>
                                                            <?php endforeach ?>
                                                            <option value="40.0">40.0</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="progressive_od_left_add"
                                                            id="progressive_od_left_add" class="txtBox scrollbar">
                                                            <option value="0.00" selected="">0.00</option>
                                                            <option value="+0.75">+0.75</option>
                                                            <?php foreach (range(1, 3) as $value) : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <?php if ($value != 3) : ?>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>OS (Right)</td>
                                                    <td>
                                                        <select name="progressive_os_right_sph"
                                                            id="progressive_os_right_sph" class="txtBox scrollbar">
                                                            <option value="-10.00">-10.00</option>
                                                            <?php foreach (range(-9, 5) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+6.00">+6.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="progressive_os_right_cyl"
                                                            id="progressive_os_right_cyl" class="txtBox scrollbar">
                                                            <option value="-4.00">-4.00</option>
                                                            <?php foreach (range(-3, 3) as $value) : ?>
                                                            <?php if ($value < 0) : ?>
                                                            <option value="<?= $value ?>.75"><?= $value ?>.75</option>
                                                            <option value="<?= $value ?>.50"><?= $value ?>.50</option>
                                                            <option value="<?= $value ?>.25"><?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00"><?= $value ?>.00</option>
                                                            <?php elseif ($value == 0) : ?>
                                                            <option value="-<?= $value ?>.75">-<?= $value ?>.75</option>
                                                            <option value="-<?= $value ?>.50">-<?= $value ?>.50</option>
                                                            <option value="-<?= $value ?>.25">-<?= $value ?>.25</option>
                                                            <option value="<?= $value ?>.00" selected><?= $value ?>.00
                                                            </option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php else : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                            <option value="+4.00">+4.00</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="progressive_os_right_axis"
                                                            id="progressive_os_right_axis" class="txtBox scrollbar">
                                                            <option value="None" selected="">None</option>
                                                            <?php foreach (range(1, 180) as $value) : ?>
                                                            <option value="<?= $value ?>"><?= $value ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="progressive_os_right_pd"
                                                            id="progressive_os_right_pd" class="txtBox scrollbar">
                                                            <option value="0.00" selected="">0.00</option>
                                                            <?php foreach (range(26, 39) as $value) : ?>
                                                            <option value="<?= $value ?>.0"><?= $value ?>.0</option>
                                                            <option value="<?= $value ?>.5"><?= $value ?>.5</option>
                                                            <?php endforeach ?>
                                                            <option value="40.0">40.0</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="progressive_os_right_add"
                                                            id="progressive_os_right_add" class="txtBox scrollbar">
                                                            <option value="0.00" selected="">0.00</option>
                                                            <option value="+0.75">+0.75</option>
                                                            <?php foreach (range(1, 3) as $value) : ?>
                                                            <option value="+<?= $value ?>.00">+<?= $value ?>.00</option>
                                                            <option value="+<?= $value ?>.25">+<?= $value ?>.25</option>
                                                            <option value="+<?= $value ?>.50">+<?= $value ?>.50</option>
                                                            <?php if ($value != 3) : ?>
                                                            <option value="+<?= $value ?>.75">+<?= $value ?>.75</option>
                                                            <?php endif ?>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="or bTn formBtn medium">OR</div>
                                        <div class="bTn formBtn tex-center">
                                            <button type="button" class="webBtn uploadImg" data-upload=""
                                                data-text="Upload Prescription"></button>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="button" class="webBtn lgBtn nextBtn"
                                                data-step="1">Submit Prescription</button></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="progressive">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Does this match your prescription?</h1>
                                    <div class="inBlk">
                                        <table>
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
                                                    <td id="progressive_od_left_sph1">0.00</td>
                                                    <td id="progressive_od_left_cyl1">0.00</td>
                                                    <td id="progressive_od_left_axis1">0.00</td>
                                                    <td id="progressive_od_left_pd1">0.00</td>
                                                    <td id="progressive_od_left_add1">0.00</td>
                                                </tr>
                                                <tr>
                                                    <td>OS (Right)</td>
                                                    <td id="progressive_os_right_sph1">0.00</td>
                                                    <td id="progressive_os_right_cyl1">0.00</td>
                                                    <td id="progressive_os_right_axis1">0.00</td>
                                                    <td id="progressive_os_right_pd1">0.00</td>
                                                    <td id="progressive_os_right_add1">0.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="button"
                                                class="webBtn lgBtn nextBtn">Confirm</button></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="progressive">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Lens Type</h1>
                                    <div class="mainRow flex">
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="progressive_lens_type"
                                                    id="progressive_lens_type_normal"
                                                    value="<?= $fifth_content['type_first_title'] ?>"
                                                    data-price="<?= $glasses[4]->type_first_price ?>" class="nextBtn"
                                                    data-option="progressive">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fifth_content['type_first_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fifth_content['type_first_title'] ?></h5>
                                                        <p><?= $fifth_content['type_first_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[4]->type_first_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="progressive_lens_type"
                                                    id="progressive_lens_type_blueLight"
                                                    value="<?= $fifth_content['type_second_title'] ?>"
                                                    data-price="<?= $glasses[4]->type_second_price ?>" class="nextBtn"
                                                    data-option="progressive">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fifth_content['type_second_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fifth_content['type_second_title'] ?></h5>
                                                        <p><?= $fifth_content['type_second_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[4]->type_second_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="progressive_lens_type"
                                                    id="progressive_lens_type_transition"
                                                    value="<?= $fifth_content['type_third_title'] ?>"
                                                    data-price="<?= $glasses[4]->type_third_price ?>" class="nextBtn"
                                                    data-option="progressive">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fifth_content['type_third_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fifth_content['type_third_title'] ?></h5>
                                                        <p><?= $fifth_content['type_third_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[4]->type_third_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                    </div>
                                </fieldset>
                                <fieldset data-option="progressive">
                                    <div class="backBtn prevBtn fi-arrow-left"></div>
                                    <h1 class="heading">Classic Lenses</h1>
                                    <div class="mainRow flex">
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="progressive_classic_lenses"
                                                    id="progressive_classic_lensesStandard"
                                                    value="<?= $fifth_content['classic_first_title'] ?>"
                                                    data-price="<?= $glasses[4]->classic_first_price ?>">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fifth_content['classic_first_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fifth_content['classic_first_title'] ?></h5>
                                                        <p><?= $fifth_content['classic_first_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[4]->classic_first_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="progressive_classic_lenses"
                                                    id="progressive_classic_lensesRecommend"
                                                    value="<?= $fifth_content['classic_second_title'] ?>"
                                                    data-price="<?= $glasses[4]->classic_second_price ?>">
                                                <div class="inner active">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fifth_content['classic_second_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fifth_content['classic_second_title'] ?></h5>
                                                        <p><?= $fifth_content['classic_second_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[4]->classic_second_price) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="radioBtn">
                                                <input type="radio" name="progressive_classic_lenses"
                                                    id="progressive_classic_lensesAdvanced"
                                                    value="<?= $fifth_content['classic_third_title'] ?>"
                                                    data-price="<?= $glasses[4]->classic_third_price ?>">
                                                <div class="inner">
                                                    <div class="icon"><img
                                                            src="<?= get_site_image_src("glasses", $fifth_content['classic_third_icon']) ?>"
                                                            alt=""></div>
                                                    <div class="txt">
                                                        <h5><?= $fifth_content['classic_third_title'] ?></h5>
                                                        <p><?= $fifth_content['classic_third_detail'] ?></p>
                                                        <div class="price">
                                                            <?= format_amount($glasses[4]->classic_third_price) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btmBlk">
                                        <div class="itm">
                                            <div class="icon"><img src="<?= get_image_src($row->image, 150) ?>" alt="">
                                            </div>
                                            <div class="ttl">
                                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                                            </div>
                                        </div>
                                        <div class="price"><?= format_amount($row->price) ?></div>
                                        <div class="bTn"><button type="submit" class="webBtn lgBtn hidden"
                                                disabled="">Add to cart</button></div>
                                    </div>
                                </fieldset>
                                <input type="file" name="" id="" class="uploadFile" data-upload="">
                                <?php endif ?>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="btmBlk">
                        <div class="itm">
                            <div class="icon"><img src="<?= base_url('assets/images/store/1.jpg') ?>" alt=""></div>
                            <div class="ttl">
                                <strong><?= $row->title ?></strong><?= $row->shape ?>
                            </div>
                        </div>
                        <div class="price"><?= format_amount($row->price) ?></div>
                        <div class="bTn"><button type="button" class="webBtn lgBtn">Next</button></div>
                    </div> -->
                </div>
                <?php endif ?>
            </section>
            <!-- detail -->


            <section id="content">
                <div class="contain-fluid">
                    <div class="flexRow flex">
                        <?php if (!empty($row->desc_image)) : ?>
                        <div class="col col1">
                            <div class="imgBlk relative">
                                <div class="image"><img src="<?= get_site_image_src("products", $row->desc_image) ?>"
                                        alt=""></div>
                                <!-- <span>Frame width <br> 135.00mm</span>
                                <span>Lens width <br> 53.00mm</span>
                                <span>Lens height <br> 40.00mm</span>
                                <span>Bridge <br> 18.00mm</span>
                                <span>Temple <br> 147.00mm</span> -->
                            </div>
                        </div>
                        <?php endif ?>
                        <div class="col col2">
                            <div class="content ckEditor">
                                <h2 class="heading">Product description</h2>
                                <?= $row->detail ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->

            <section id="reviews">
                <div class="contain-fluid">
                    <div class="blk">
                        <div class="_header">
                            <h4><?= count($reviews)?> Reviews</h4>
                            <div class="rateYo" data-rateyo-rating="<?= get_avg_rating($row->id)?>"
                                data-rateyo-read-only="true"></div>
                        </div>
                        <?php foreach ($reviews as $key => $review): ?>
                        <div class="review">
                            <div class="ico"><img src="<?= get_image_src($review->mem_image, 150, true)?>" alt=""></div>
                            <div class="txt">
                                <div class="icoTxt">
                                    <div class="title">
                                        <h5><?= $review->mem_name?></h5>
                                        <div class="rateYo" data-rateyo-rating="<?= $review->rating?>"
                                            data-rateyo-read-only="true"></div>
                                    </div>
                                    <div class="date"><?= format_date($review->date)?></div>
                                </div>
                                <?php if (!empty($review->comment)): ?>
                                <p><?= $review->comment?></p>
                                <?php endif ?>
                                <?php if (!empty($review->image)): ?>
                                <div class="image" gallery><img src="<?= get_image_src($review->image, 150) ?>"
                                        data-src="<?= get_image_src($review->image) ?>" alt=""></div>
                                <?php endif ?>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </section>
            <!-- reviews -->


            <section id="similar">
                <div class="contain-fluid">
                    <h1 class="heading text-center">Similar Products</h1>
                    <div id="owl-items" class="owl-carousel owl-theme owl-items">
                        <?php foreach ($related_products as $key => $rp) : ?>
                        <div class="itmBlk">
                            <div class="image">
                                <a
                                    href="<?= site_url("product-detail/{$rp->id}/" . url_title($rp->title, '-', TRUE)) ?>">
                                    <img src="<?= get_image_src($rp->image, 400) ?>" alt="">
                                </a>
                            </div>
                            <div class="txt">
                                <h6><a
                                        href="<?= site_url("product-detail/{$rp->id}/" . url_title($rp->title, '-', TRUE)) ?>"><?= $rp->title ?></a>
                                </h6>
                                <div class="rating">
                                    <div class="rateYo" data-rateyo-rating="<?= get_avg_rating($rp->id)?>"
                                        data-rateyo-read-only="true"></div>
                                    <em><?= count_reviews($rp->id)?></em>
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

            <?php if ($row->stock > 0) : ?>
            <script type="text/javascript">
            $(function() {
                $(document).on('click', '#detail .funBtn', function() {
                    $('body').addClass('flow');
                    $('#function').addClass('active');
                });

                /*$(document).on('click', '#detail .frameBtn', function() {
                    $('body').addClass('flow');
                    $('#frame').addClass('active');
                });*/

                $(document).on('click', '#function > .crosBtn', function() {
                    $('body').removeClass('flow');
                    $('#function').removeClass('active');
                });
                let old_option = null;
                $(document).on('click', '[data-price]:not(.nextBtn)', function() {
                    if (!empty(old_option))
                        options_price.pop();
                    $(this).parents('fieldset:first').find('button[type="submit"]').prop('disabled',
                        false).removeClass('hidden');
                    old_option = floatval($(this).data('price'));
                    options_price.push(old_option);
                    calcTotal();
                });

                /*_____ Form Button _____*/
                let total_price = price = <?= $row->price ?>;
                let options_price = [];
                let opt = "";
                $(".nextBtn").click(function() {
                    // fieldset
                    old_option = null;
                    if ($(this).data('option') != undefined) {
                        opt = $(this).data('option');
                        $(this).parents('fieldset:first').attr('data-option', opt);
                    };
                    currStep = $(this).parents("fieldset");

                    let option = currStep.find('input[type="radio"][data-price]:checked');
                    let progress = $(this).data('step');
                    <?php if (empty($row->frame_only)) : ?>
                    if ($.inArray(opt, ["polarized", "transition"]) != -1 && $.inArray(option.val(), [
                            "Normal", "Clear Lens"
                        ]) != -1)
                        nextStep = currStep.nextAll("fieldset[data-option='" + opt + "']").eq(2);
                    else
                        <?php endif ?>
                    nextStep = currStep.nextAll("fieldset[data-option='" + opt + "']:first");


                    currStep.find('button[type="submit"]').prop('disabled', true).addClass('hidden');
                    currStep.hide();
                    nextStep.fadeIn();

                    <?php if (empty($row->frame_only)) : ?>
                    if (opt == 'prescription') {
                        if (progress == 1) {
                            $('#prescription_od_left_sph1').text($("#prescription_od_left_sph").val());
                            $('#prescription_od_left_cyl1').text($("#prescription_od_left_cyl").val());
                            $('#prescription_od_left_axis1').text($("#prescription_od_left_axis")
                                .val());
                            $('#prescription_od_left_pd1').text($("#prescription_od_left_pd").val());
                            $('#prescription_os_right_sph1').text($("#prescription_os_right_sph")
                                .val());
                            $('#prescription_os_right_cyl1').text($("#prescription_os_right_cyl")
                                .val());
                            $('#prescription_os_right_axis1').text($("#prescription_os_right_axis")
                                .val());
                            $('#prescription_os_right_pd1').text($("#prescription_os_right_pd").val());
                        }
                    }
                    if (opt == 'polarized') {
                        if (progress == 3) {
                            $('#polarized_od_left_sph1').text($("#polarized_od_left_sph").val());
                            $('#polarized_od_left_cyl1').text($("#polarized_od_left_cyl").val());
                            $('#polarized_od_left_axis1').text($("#polarized_od_left_axis").val());
                            $('#polarized_od_left_pd1').text($("#polarized_od_left_pd").val());
                            $('#polarized_os_right_sph1').text($("#polarized_os_right_sph").val());
                            $('#polarized_os_right_cyl1').text($("#polarized_os_right_cyl").val());
                            $('#polarized_os_right_axis1').text($("#polarized_os_right_axis").val());
                            $('#polarized_os_right_pd1').text($("#polarized_os_right_pd").val());
                        }
                    }
                    if (opt == 'transition') {
                        if (progress == 2) {
                            $('#transition_od_left_sph1').text($("#transition_od_left_sph").val());
                            $('#transition_od_left_cyl1').text($("#transition_od_left_cyl").val());
                            $('#transition_od_left_axis1').text($("#transition_od_left_axis").val());
                            $('#transition_od_left_pd1').text($("#transition_od_left_pd").val());
                            $('#transition_os_right_sph1').text($("#transition_os_right_sph").val());
                            $('#transition_os_right_cyl1').text($("#transition_os_right_cyl").val());
                            $('#transition_os_right_axis1').text($("#transition_os_right_axis").val());
                            $('#transition_os_right_pd1').text($("#transition_os_right_pd").val());
                        }
                    }
                    if (opt == 'progressive') {
                        if (progress == 1) {
                            $('#progressive_od_left_sph1').text($("#progressive_od_left_sph").val());
                            $('#progressive_od_left_cyl1').text($("#progressive_od_left_cyl").val());
                            $('#progressive_od_left_axis1').text($("#progressive_od_left_axis").val());
                            $('#progressive_od_left_pd1').text($("#progressive_od_left_pd").val());
                            $('#progressive_od_left_add1').text($("#progressive_od_left_add").val());
                            $('#progressive_os_right_sph1').text($("#progressive_os_right_sph").val());
                            $('#progressive_os_right_cyl1').text($("#progressive_os_right_cyl").val());
                            $('#progressive_os_right_axis1').text($("#progressive_os_right_axis")
                                .val());
                            $('#progressive_os_right_pd1').text($("#progressive_os_right_pd").val());
                            $('#progressive_os_right_add1').text($("#progressive_os_right_add").val());
                        }
                    }

                    <?php endif ?>
                    if (!empty(option.length)) {
                        options_price.push(floatval(option.data('price')));
                        calcTotal();
                    }
                });
                $(".prevBtn").click(function() {
                    old_option = null;
                    currStep = $(this).parents("fieldset:first");

                    currStep.find('button[type="submit"]').prop('disabled', true).addClass('hidden');

                    <?php if (empty($row->frame_only)) : ?>
                    if (opt == "polarized" && $("fieldset[data-option='" + opt + "']").eq(2).find(
                            'input[type="radio"][data-price]:checked').val() == 'Normal' && $(
                            "fieldset[data-option='" + opt + "']").index(currStep) == 5)
                        prevStep = $("fieldset[data-option='" + opt + "']").eq(2);
                    else if (opt == "transition" && $("fieldset[data-option='" + opt + "']").eq(1).find(
                            'input[type="radio"][data-price]:checked').val() == 'Clear Lens' && $(
                            "fieldset[data-option='" + opt + "']").index(currStep) == 4)
                        prevStep = $("fieldset[data-option='" + opt + "']").eq(1);
                    else
                        <?php endif ?>
                    prevStep = currStep.prevAll("fieldset[data-option='" + opt + "']:first");

                    // prevStep = currStep.prevAll("fieldset[data-option='" + opt + "']:first");
                    currStep.hide();
                    prevStep.fadeIn();

                    let option = currStep.find('input[type="radio"][data-price]:checked');
                    if (!empty(option.length)) {
                        /*let option_price = floatval(option.data('price'));
                        console.log(option_price)
                        let new_price = total_price - option_price;
                        $("fieldset[data-option='" + opt + "']").find('.btmBlk .price').html(formatter.format(new_price));*/
                        option.prop('checked', false);
                        options_price.pop();
                        calcTotal();
                    }
                    let pre_option = prevStep.find('input[type="radio"][data-price]:checked');
                    if (!empty(pre_option.length)) {
                        options_price.pop();
                    }
                });

                function calcTotal() {
                    total_price = price;
                    options_price.forEach(function(item, index) {
                        total_price += item;
                    })
                    $("fieldset[data-option='" + opt + "']").find('.btmBlk .price').html('US ' + formatter
                        .format(total_price));
                }
            });
            </script>
            <?php endif ?>
        </main>
        <?php $this->load->view('includes/footer'); ?>
    </body>

</html>