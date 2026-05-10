<!doctype html>
<html>

<head>
    <title>404 Not Found — <?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <main>


        <section id="oops">
            <div class="logoDv">
                <a href="<?= site_url() ?>"><img src="<?= SITE_IMAGES . '/images/' . $site_settings->site_logo . '?v-' . $site_settings->site_version ?>" alt="<?= $site_settings->site_name ?>"></a>
            </div>
            <div class="contain text-center">
                <div class="icon">404</div>
                <div class="inner">
                    <h4>Page Not Found</h4>
                    <p>Let's pretend ..... !! You never saw that. Go back to the Homepage to find out more.</p>
                    <div class="bTn"><a href="<?= site_url() ?>" class="webBtn">Back to the website</a></div>
                </div>
            </div>
        </section>
        <!-- oops -->


    </main>
</body>

</html>