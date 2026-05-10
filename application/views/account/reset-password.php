<!doctype html>
<html>

<head>
    <title><?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Reset Password — ' ?><?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common logon>


        <section id="logon">
            <div class="contain">
                <div class="logBlk">
                    <form action="" method="post" autocomplete="off" class="frmAjax" id="frmReset">
                        <h3><?= $site_content['heading'] ?></h3>
                        <p><?= $site_content['short_desc'] ?></p>
                        <div class="txtGrp pasDv">
                            <label for="">Password</label>
                            <input type="password" name="pswd" id="pswd" class="txtBox" autofocus="">
                            <i class="icon-eye" id="eye"></i>
                        </div>
                        <div class="txtGrp pasDv">
                            <label for="">Confirm Password</label>
                            <input type="password" name="cpswd" id="cpswd" class="txtBox">
                            <i class="icon-eye" id="eye"></i>
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn blockBtn">Change my Password <i class="spinner hidden"></i></button>
                        </div>
                        <div class="alertMsg" style="display:none"></div>
                    </form>
                    <div class="haveAccount text-center">
                        <span>Don’t have an account?</span>
                        <a href="<?= site_url('signup') ?>">Sign up</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- logon -->


    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>