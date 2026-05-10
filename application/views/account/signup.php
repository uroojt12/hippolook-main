<!doctype html>
<html>

<head>
    <title><?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Sign up — ' ?><?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common logon>


        <section id="logon">
            <div class="contain">
                <div class="logBlk">
                    <form action="" method="post" autocomplete="off" class="frmAjax" id="frmSignup">
                        <h3><?= $site_content['heading'] ?></h3>
                        <p><?= $site_content['short_desc'] ?></p>
                        <div class="txtGrp">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" class="txtBox" autofocus="">
                        </div>
                        <div class="txtGrp">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" class="txtBox">
                        </div>
                        <div class="txtGrp">
                            <label for="email">Email Address</label>
                            <input type="text" name="email" id="email" class="txtBox">
                        </div>
                        <div class="txtGrp pasDv">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="txtBox">
                            <i class="icon-eye" id="eye"></i>
                        </div>
                        <!-- <div class="txtGrp pasDv">
                            <label for="c_password">Confirm Password</label>
                            <input type="password" name="c_password" id="c_password" class="txtBox">
                            <i class="icon-eye" id="eye"></i>
                        </div> -->
                        <div class="txtGrp flex">
                            <div class="lblBtn">
                                <input type="checkbox" name="confirm" id="confirm" value="1">
                                <label for="confirm">By signing up, I agree to Hippolook
                                    <a href="<?= site_url('terms-and-conditions') ?>">Terms & Conditions</a>
                                    and
                                    <a href="<?= site_url('privacy-policy') ?>">Privacy Policy.</a>
                                </label>
                            </div>
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn blockBtn">Sign up <i class="spinner hidden"></i></button>
                        </div>
                        <div class="alertMsg" style="display:none"></div>
                    </form>
                    <div class="haveAccount text-center">
                        <span>Already have an account?</span>
                        <a href="<?= site_url('signin') ?>">Sign in</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- logon -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>