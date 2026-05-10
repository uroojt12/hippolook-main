<!doctype html>
<html>

<head>
    <title><?= !empty($site_content['page_title']) ? $site_content['page_title'] . ' — ' : 'Store — ' ?><?= $site_settings->site_name ?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>

<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
    <main common store>


		<section id="store">
            <div class="contain-fluid">
                <div class="flexRow flex">
                    <div class="col col1">
                        <div class="filters">
                            <div class="closeBtn"></div>
                            <form action="" method="post" id="searchForm">
                                <h5>Filter by <button type="button" class="resetAll">Reset all</button></h5>
                                <div class="inBlk">
                                    <h6>Gender</h6>
                                    <ul class="ctgLst inline">
                                        <li>
                                            <input type="radio" id="gender_Male" name="gender" value="Male">
                                            <label for="gender_Male">Male</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="gender_Female" name="gender" value="Female">
                                            <label for="gender_Female">Female</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="gender_Both" name="gender" value="Both">
                                            <label for="gender_Both">Both</label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <div class="inBlk">
                                    <h6>Price</h6>
                                    <input type="text" name="price" id="price" value="">
                                </div> -->
                                <!-- <div class="inBlk">
                                    <h6>Color <button type="button" class="clearFltr">Clear</button></h6>
                                    <ul class="ctgLst colorLst">
                                        <?php foreach ($colors as $key => $color) : ?>
                                            <li>
                                                <div class="checkBlk">
                                                    <input type="checkbox" id="color_dark_<?= $key ?>" name="colors[]" value="<?= $color->title ?>">
                                                    <div class="ico">
                                                        <img src="<?= get_site_image_src("colors", $color->image); ?>" alt="<?= $color->title ?>">
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div> -->
                                <div class="inBlk">
                                    <h6>Shape <button type="button" class="clearFltr">Clear</button></h6>
                                    <ul class="ctgLst">
                                        <?php foreach ($shapes as $key => $shape) : ?>
                                            <li>
                                                <input type="checkbox" id="shape<?= $shape->title ?>" name="shapes[]" value="<?= $shape->title ?>">
                                                <label for="shape<?= $shape->title ?>"><?= $shape->title ?></label>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <!-- <div class="inBlk">
                                    <h6>Material <button type="button" class="clearFltr">Clear</button></h6>
                                    <ul class="ctgLst">
                                        <?php foreach ($materials as $key => $material) : ?>
                                            <li>
                                                <input type="checkbox" id="material<?= $material->title ?>" name="materials[]" value="<?= $material->title ?>">
                                                <label for="material<?= $material->title ?>"><?= $material->title ?></label>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div> -->
                                <!-- <div class="inBlk">
                                    <h6>Size <button type="button" class="clearFltr">Clear</button></h6>
                                    <ul class="ctgLst">
                                        <?php foreach ($sizes as $key => $size) : ?>
                                            <li>
                                                <input type="checkbox" id="size<?= $size->title ?>" name="sizes[]" value="<?= $size->title ?>">
                                                <label for="size<?= $size->title ?>"><?= $size->title ?></label>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div> -->
                                <div class="btnBlk">
                                    <button type="reset" class="webBtn lgBtn lightBtn borderBtn">Clear</button>
                                    <button type="submit" class="webBtn lgBtn">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col col2">
                        <div class="head">
                            <h1 class="heading">Store</h1>
                            <button type="button" id="filterBtn" class="webBtn smBtn icoBtn roundBtn"><img src="<?= base_url('assets/images/icon-filter.svg') ?>" alt=""> Filter</button>
                        </div>
                        <div class="topHead">
                            <?php if (empty($row_count)) : ?>
                                <span>No item available</span>
                            <?php else : ?>
                                <span><?= $row_count ?> <?= $row_count > 1 ? 'Items' : 'Item' ?> available</span>
                            <?php endif ?>
                            <!-- <div class="miniBtn">
                                Sort by
                                <select name="" id="" class="txtBox">
                                    <option value="0">Relevance</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                            </div> -->
                        </div>
                        <div class="flexRow flex" id="srchLst">
                            <?php foreach ($rows as $key => $row) : ?>
                                <div class="col">
                                    <div class="itmBlk">
                                        <div class="image">
                                            <a href="<?= site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)) ?>">
                                                <img src="<?= get_image_src($row->image, 400) ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="txt">
                                            <h6><a href="<?= site_url("product-detail/{$row->id}/" . url_title($row->title, '-', TRUE)) ?>"><?= $row->title ?></a></h6>
                                            <div class="rating">
                                                <div class="rateYo" data-rateyo-rating="<?= get_avg_rating($row->id)?>" data-rateyo-read-only="true"></div>
                                                <em><?= count_reviews($row->id)?></em>
                                            </div>
                                            <div class="btmBlk">
                                                <div class="price">
                                                    <?= format_amount($row->price) ?>
                                                    <?php if (!empty($row->old_price)) : ?>
                                                        <del><?= format_amount($row->old_price) ?></del>
                                                    <?php endif ?>
                                                </div>
                                                <?= favorite_btn($row->id, 'product') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <?php if ($total_pages > 1) : ?>
                            <div class="btnBlk text-center">
                                <div class="bTn formBtn">
                                    <a href="javascript:void(0)" class="webBtn ldMore">MORE PRODUCTS</a>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="appLoad" style="display: none;">
                            <div class="appLoader"><span class="spiner"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- store -->


        <!-- Ion Slider -->
        <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/ion.slider.min.css') ?>">
        <script type="text/javascript" src="<?= base_url('assets/js/ion.slider.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/ion.slider.skins.js') ?>"></script>
        <script type="text/javascript">
            $(function() {
                $('#price').ionRangeSlider({
                    skin: 'square',
                    min: 1,
                    max: '<?= $max_price ?>',
                    type: 'double',
                    prettify: function(num) {
                        return '$' + num;
                    },
                    onFinish: function(data) {
                        searchItems();
                    },
                    grid: true
                });
                <?php if ($total_pages > 1) : ?>
                    let load = 2;
                    $(document).on('click', '.ldMore', function(e) {
                        let btn = $(this);
                        btn.hide();
                        $('.appLoad').fadeIn('fast');
                        $.ajax({
                            data: {
                                'load': load
                            },
                            dataType: 'JSON',
                            method: 'POST',
                            success: function(res) {
                                if (res.found) {
                                    load = res.load;
                                    $('#srchLst').append(res.items);
                                    refresh_rateYo();

                                    if (res.reached)
                                        btn.parents('.btnBlk:first').remove();
                                    else
                                        btn.show()
                                    $('.appLoad').hide();
                                    $('#srchLst > .col').removeClass('hidden');
                                }
                            },
                            error: function(res) {
                                console.log(res);
                            }
                        });

                    });
                <?php endif ?>

                $(document).on('click', '[data-sort]', function(e) {
                    e.preventDefault();
                    $('form.filter input[name="sort_by"]').val($(this).data('sort'));
                    $('form.filter').submit();
                });

                $(document).on('change', 'input[type="checkbox"], input[type="radio"]', function() {
                    searchItems();
                });
                $(document).on('click', 'button.clearFltr', function(e) {
                    e.preventDefault();
                    $(this).parents('.inBlk:first').find('.ctgLst input[type="checkbox"], .ctgLst input[type="radio"]').prop('checked', false);
                    searchItems();
                });
                $(document).on('click', 'button.resetAll', function(e) {
                    e.preventDefault();
                    $(this).parents('form:first').find('.ctgLst input[type="checkbox"], .ctgLst input[type="radio"]').prop('checked', false);
                    searchItems();
                });

                $(document).on('click', '#filterBtn', function() {
                    $('.filters').addClass('active');
                });
                $(document).on('click', '.filters .closeBtn', function() {
                    $('.filters').removeClass('active');
                });
                $(window).on('load', function() {
                    h = $('#store .topBlk').outerHeight();
                    $('#store').css('padding-top', h);
                });
            });

            let xhr = new window.XMLHttpRequest();
            let ajaxSearch = false;

            function searchItems() {

                if (xhr && xhr.readyState != 4) {
                    xhr.abort();
                }
                if (ajaxSearch)
                    return;
                ajaxSearch = true;
                let formData = $("#searchForm").serializeArray();
                /*
                formData.push({name:'q', value:$('#pq').val()})
                formData.push({name:'zip', value:$('#zip').val()})
                */

                $('#srchLst').html("");
                // $('#layer, .appLoad').show();
                $('.appLoad').fadeIn('fast');
                $.ajax({
                    url: $("#searchForm").attr('action'),
                    type: "POST",
                    data: $.param(formData),
                    success: function(rs) {
                        locations = [];
                        $('.topHead>span').html(rs.msg);
                        if (!empty(rs.items))
                            $('#srchLst').html(rs.items);
                        refresh_rateYo();
                        $('.appLoad').hide();
                        $('#srchLst > .col').removeClass('hidden');
                        $('#srchLst').show();
                    },
                    error: function(data) {
                        console.log(data);
                    },
                    complete: function(data) {
                        ajaxSearch = false;
                    },
                    xhr: function() {
                        return xhr;
                    }
                });
            }
        </script>
    </main>
    <?php $this->load->view('includes/footer'); ?>
</body>

</html>
