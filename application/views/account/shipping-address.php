<!doctype html>
<html>

<head>
    <title>Shipping Address — <?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common dash>


        <section id="setting">
            <div class="contain">
                <h2 class="heading">Shipping Address</h2>
                <div class="blk">
                    <form action="" method="post" autocomplete="off" class="frmAjax" id="frmShipping">
                        <div class="_header">
                            <h4>Shipping Address</h4>
                        </div>
                        <div class="row formRow">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                <div class="txtGrp">
                                    <label for="ship_fname">First Name</label>
                                    <input type="text" name="ship_fname" id="ship_fname" value="<?= $mem_data->ship_fname?>" class="txtBox" placeholder="" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                <div class="txtGrp">
                                    <label for="ship_lname">Last Name</label>
                                    <input type="text" name="ship_lname" id="ship_lname" value="<?= $mem_data->ship_lname?>" class="txtBox" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                <div class="txtGrp">
                                    <label for="ship_zip">Phone Number</label>
                                    <input type="text" name="ship_phone" id="ship_phone" value="<?= $mem_data->ship_phone?>" class="txtBox" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                <div class="txtGrp">
                                    <label for="ship_company">Company</label>
                                    <input type="text" name="ship_company" id="ship_company" value="<?= $mem_data->ship_company?>" class="txtBox" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-1">
                                <div class="txtGrp">
                                    <label for="ship_address">Address</label>
                                    <input type="text" name="ship_address" id="ship_address" value="<?= $mem_data->ship_address ?>" class="txtBox"placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                <div class="txtGrp">
                                    <label for="ship_house_number">House Number</label>
                                    <input type="text" name="ship_house_number" id="ship_house_number" value="<?= $mem_data->ship_house_number ?>" class="txtBox">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                <div class="txtGrp">
                                    <label for="ship_zip">Postal Code</label>
                                    <input type="text" name="ship_zip" id="ship_zip" value="<?= $mem_data->ship_zip?>" class="txtBox" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                <div class="txtGrp">
                                    <label for="ship_city">City</label>
                                    <input type="text" name="ship_city" id="ship_city" value="<?= $mem_data->ship_city ?>" class="txtBox" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                <div class="txtGrp">
                                    <label for="ship_country" class="move">County/Region</label>
                                    <select name="ship_country" id="ship_country" class="txtBox">
                                        <option>Select</option>
                                        <?= get_countries_options('name', $mem_data->ship_country)?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bTn formBtn text-center">
                            <button type="reset" class="webBtn simpleBtn">Cancel</button>
                            <button type="submit" class="webBtn">Save <i class="spinner hidden"></i></button>
                        </div>
                        <div class="alertMsg" style="display:none"></div>
                    </form>
                </div>
            </div>
        </section>
        <!-- setting -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>