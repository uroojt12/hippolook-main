<meta charset="utf-8">
<meta http-equiv="expires" content="0">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<?php
$page_title = empty($site_content['page_title']) ? $site_settings->site_name : $site_content['page_title'] . ' - ' . $site_settings->site_name;
$meta_description = empty($site_content['meta_description']) ? $site_settings->site_meta_desc : $site_content['meta_description'];
$meta_keywords = empty($site_content['meta_keywords']) ? $site_settings->site_meta_keyword : $site_content['meta_keywords'];
$meta_image = empty($site_content['meta_image']) ? SITE_IMAGES . '/images/' . $site_settings->site_thumb . '?v-' . $site_settings->site_version : $site_content['meta_image'];
?>

<meta name="title" content="<?= $page_title ?>">
<meta name="description" content="<?= $meta_description ?>">
<meta name="keywords" content="<?= $meta_keywords ?>">

<meta property="og:type" content="website">
<meta property="og:url" content="<?= current_url() ?>">
<meta property="og:title" content="<?= $page_title ?>">
<meta property="og:description" content="<?= $meta_description ?>">
<meta property="og:image" content="<?= $meta_image ?>">
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?= current_url() ?>">
<meta property="twitter:title" content="<?= $page_title ?>">
<meta property="twitter:description" content="<?= $meta_description ?>">
<meta property="twitter:image" content="<?= $meta_image ?>">


<!-- Css files -->
<!-- Bootstrap Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css?v-' . $site_settings->site_version) ?>">
<!-- Main Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/main.css?v-' . $site_settings->site_version) ?>">
<!-- Custom Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/custom.css?v-' . $site_settings->site_version) ?>">
<!-- Media-Query Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/responsive.css?v-' . $site_settings->site_version) ?>">
<!-- Font-Awesome Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css?v-' . $site_settings->site_version) ?>">
<!-- Font-Icon Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/font-icon.min.css?v-' . $site_settings->site_version) ?>">
<!-- Owl Carousel Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.min.css?v-' . $site_settings->site_version) ?>">
<!-- Owl Theme Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/owl.theme.default.min.css?v-' . $site_settings->site_version) ?>">
<!-- Datepicker Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/datepicker.min.css?v-' . $site_settings->site_version) ?>">
<!-- Light Gallery Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/lightgallery.css?v-' . $site_settings->site_version) ?>">



<!-- JS Files -->
<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js?v-' . $site_settings->site_version) ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js?v-' . $site_settings->site_version) ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery-ui.min.js?v-' . $site_settings->site_version) ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/functions.js?v-' . $site_settings->site_version) ?>"></script>

<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
</script>
<!-- psstrength Js -->
<link rel="stylesheet" href="<?= base_url('assets/passtrength/passtrength.css') ?>" media="screen" title="no title">
<script type="text/javascript" src="<?= base_url('assets/passtrength/jquery.passtrength.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function($) {
        $('.pwstrnt').passtrength();
    });
</script>

<!-- Owl Carousel Js -->
<script type="text/javascript" src="<?= base_url('assets/js/owl.carousel.min.js?v-' . $site_settings->site_version) ?>"></script>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#owl-product').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: ['<i class="fi-chevron-left"></i>', '<i class="fi-chevron-right"></i>'],
            margin: 0,
            smartSpeed: 1000,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            URLhashListener: true,
            startPosition: 'URLHash',
            items: 1
        });
        $('#owl-thumbnail').owlCarousel({
            autoplay: false,
            dots: false,
            // loop: true,
            margin: 10,
            // autoWidth: true,
            // autoHeight: true,
            mouseDrag: false,
            touchDrag: false,
            smartSpeed: 1000,
            autoplayTimeout: 8000,
            items: 6
        });
        $('#owl-buy').owlCarousel({
            dots: false,
            // loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                480: {
                    items: 3
                },
                580: {
                    items: 4
                },
                768: {
                    items: 5
                },
                991: {
                    items: 6
                },
                1200: {
                    items: 7
                }
            }
        });
        $('.owl-items').owlCarousel({
            dots: false,
            nav: true,
            navText: ['<i class="fi-chevron-left"></i>', '<i class="fi-chevron-right"></i>'],
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                580: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
        $('#owl-seller').owlCarousel({
            loop: true,
            margin: 20,
            smartSpeed: 1000,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                580: {
                    items: 2
                },
                1200: {
                    items: 2
                }
            }
        });
    });
</script>
<!-- Datepicker Js -->
<script type="text/javascript" src="<?= base_url('assets/js/datepicker.min.js?v-' . $site_settings->site_version) ?>"></script>
<script type="text/javascript">
    $(window).on('load', function() {
        $('.datepicker').datepicker({
            multidate: false,
            format: 'mm/dd/yyyy',
            todayHighlight: true,
            multidateSeparator: ',  ',
            templates: {
                leftArrow: '<i class="fi-arrow-left"></i>',
                rightArrow: '<i class="fi-arrow-right"></i>'
            }
        });
    });
</script>
<!-- Rateyo Js -->
<script type="text/javascript" src="<?= base_url('assets/js/jquery.rateyo.min.js?v-' . $site_settings->site_version) ?>"></script>
<script type="text/javascript">
    $(function() {
        $('.rateYo').rateYo({
            // rating: 4.0,
            fullStar: true,
            readOnly: true,
            normalFill: '#ddd',
            ratedFill: '#ffc000',
            starWidth: '14px',
            spacing: '2px'
        });
    });
</script>
<!-- Light Gallery Js -->
<script type="text/javascript" src="<?= base_url('assets/js/lightgallery-all.min.js?v-' . $site_settings->site_version) ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.mousewheel.min.js?v-' . $site_settings->site_version) ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('[gallery]').lightGallery({
            thumbnail: true,
        });
    });
</script>
<!-- Telphone Js -->
<script type="text/javascript" src="<?= base_url('assets/intltelinput/intlTelInput.js?v-' . $site_settings->site_version) ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/intltelinput/utils.js?v-' . $site_settings->site_version) ?>"></script>
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/intltelinput/intlTelInput.css?v-' . $site_settings->site_version) ?>">

<!-- Toastr -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/toastr.css?v-'.$site_settings->site_version)?>">
<script type="text/javascript" src="<?= base_url('assets/js/toastr.min.js?v-'.$site_settings->site_version)?>
"></script>
<script type="text/javascript">
    $(function(){
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    })
</script>


<!-- Favicon -->
<link type="image/png" rel="icon" href="<?= SITE_IMAGES . '/images/' . $site_settings->site_icon . '?v-' . $site_settings->site_version ?>">

<?php if (!empty($site_settings->site_scripts)) : ?>
    <?= $site_settings->site_scripts ?>
<?php endif ?>