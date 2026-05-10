<!doctype html>
<html>

<head>
    <title><?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Forgot Password — ' ?><?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common logon>


        <section id="logon">
            <div class="contain">
                <div class="logBlk">
                    <form action="" method="post" autocomplete="off" class="frmAjax" id="frmForgot">
                        <h3><?= $site_content['heading'] ?></h3>
                        <p><?= $site_content['short_desc'] ?></p>
                        <div class="txtGrp">
                            <label for="email">Email Address</label>
                            <input type="text" name="email" id="email" class="txtBox" autofocus="">
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn blockBtn">Reset Password <i class="spinner hidden"></i></button>
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