<!doctype html>
<html>

<head>
    <title>My Information — <?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common dash>


        <section id="setting">
            <div class="contain">
                <h2 class="heading">My Information</h2>
                <div class="blk">
                    <form action="" method="post" autocomplete="off" class="frmAjax" id="frmSetting">
                        <div class="_header">
                            <h4>Account Details</h4>
                        </div>
                        <div class="upLoadDp">
                            <div class="ico">
                                <img src="<?= get_image_src($mem_data->mem_image, '150', true)?>" alt="" id="userImage">
                            </div>
                            <div class="text-center">
                                <!-- <button type="button" class="webBtn smBtn uploadProfilePic" data-image-src="dp">Change Photo</button> -->
                                <label for="profPicUpdate" class="webBtn smBtn uploadProfilePic" data-image-src="dp">Change Photo
                                    <input type="file" name="" id="profPicUpdate" accept="image/*" class="" style="display: none;" data-file="dp">
                                </label>
                            </div>
                            <div class="noHats text-center">(Please upload your photo)</div>
                        </div>
                        <hr>
                        <div class="row formRow">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                <div class="txtGrp">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" value="<?= ($mem_data->mem_fname ? $mem_data->mem_fname : '')?>" class="txtBox" placeholder="" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                <div class="txtGrp">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" value="<?= ($mem_data->mem_lname ? $mem_data->mem_lname : '')?>" class="txtBox" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                <div class="txtGrp">
                                    <label for="email">Email Address</label>
                                    <input type="text" id="email" name="email" class="txtBox" value="<?= $mem_data->mem_email ? $mem_data->mem_email : ''?>" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                                <div class="txtGrp">
                                    <label for="dob">Date of birth</label>
                                    <input type="text" name="dob" id="dob" class="txtBox datepicker" readonly value="<?= $mem_data->mem_dob ? format_date($mem_data->mem_dob, 'm/d/Y') : ''?>" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4">
                                <div class="txtGrp">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="txtBox" value="<?= $mem_data->mem_city ? $mem_data->mem_city : ''?>" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4">
                                <div class="txtGrp">
                                    <label for="state" class="move">State</label>
                                    <select name="state" id="state" class="txtBox">
                                        <option>Select</option>
                                        <?= get_states_options('code', $mem_data->mem_state)?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4">
                                <div class="txtGrp">
                                    <label for="zip">Zip Code</label>
                                    <input type="text" id="zip" name="zip" class="txtBox" value="<?= $mem_data->mem_zip ? $mem_data->mem_zip : ''?>" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-1">
                                <div class="txtGrp">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" class="txtBox" value="<?= $mem_data->mem_address1 ? $mem_data->mem_address1 : ''?>" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-1">
                                <div class="txtGrp">
                                    <label for="profile_bio">Profile Bio</label>
                                    <textarea name="profile_bio" id="profile_bio" class="txtBox" placeholder=""><?= $mem_data->mem_about ? $mem_data->mem_about : ''?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="bTn formBtn text-center">
                            <button type="reset" class="webBtn simpleBtn">Cancel</button>
                            <button type="submit" class="webBtn">Save <i class="spinner hidden"></i></button>
                        </div>
                        <div class="alertMsg" style="display: none;"></div>
                    </form>
                </div>
                <div class="blk">
                    <div class="_header">
                        <h4>Change Password</h4>
                        <div class="info">
                            <strong>Strong Password</strong>
                            <div class="infoIn ckEditor">
                                <p>Your password must contain the following:</p>
                                <ol>
                                    <li>At least 8 characters in length (a strong password has at least 14 characters)</li>
                                    <li>At least 1 letter and at least 1 number or symbol</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <form action="<?= site_url('change-password')?>" method="post" autocomplete="off" class="frmAjax" id="frmChangePass">
                        <div class="row formRow">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4">
                                <div class="txtGrp pasDv">
                                    <label for="">Current password</label>
                                    <input type="password" id="pswd" name="pswd" value="" class="txtBox" placeholder="">
                                    <i class="icon-eye" id="eye"></i>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4">
                                <div class="txtGrp pasDv">
                                    <label for="">New password</label>
                                    <input type="password" id="npswd" name="npswd" value="" class="txtBox pwstrnt" placeholder="">
                                    <i class="icon-eye" id="eye"></i>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4">
                                <div class="txtGrp pasDv">
                                    <label for="">Confirm new password</label>
                                    <input type="password" id="cpswd" name="cpswd" value="" class="txtBox" placeholder="">
                                    <i class="icon-eye" id="eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bTn formBtn text-center">
                            <button type="reset" class="webBtn simpleBtn">Cancel</button>
                            <button type="submit" class="webBtn">Change <i class="spinner hidden"></i></button>
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