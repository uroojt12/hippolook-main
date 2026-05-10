<!doctype html>
<html>

<head>
    <title><?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Sign in — ' ?><?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common logon>


        <section id="logon">
            <div class="contain">
                <div class="logBlk">
                    <form action="" method="post" autocomplete="off" class="frmAjax" id="frmLogin">
                        <h3><?= $site_content['heading'] ?></h3>
                        <p><?= $site_content['short_desc'] ?></p>
                        <div class="txtGrp">
                            <label for="email">Email Address</label>
                            <input type="text" name="email" id="email" class="txtBox" autofocus="">
                        </div>
                        <div class="txtGrp pasDv">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="txtBox">
                            <i class="icon-eye" id="eye"></i>
                        </div>
                        <div class="txtGrp flex">
                            <div class="lblBtn">
                                <input type="checkbox" name="remember" id="remember" checked="">
                                <label for="remember">Remember me</label>
                            </div>
                            <a href="<?= site_url('forgot-password') ?>" id="pass">Forgot Password?</a>
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn blockBtn">Sign in <i class="spinner hidden"></i></button>
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