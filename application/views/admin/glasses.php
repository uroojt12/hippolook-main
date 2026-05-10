<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Update Glass')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-board"></i> Update <strong>Glass</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/glasses'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="clearfix"></div>
        <div class="panel-body">
            <form role="form"  method="post" class="form-horizontal form-groups-bordered validate" novalidate="novalidate" enctype="multipart/form-data">
                <div class="form-group">
                    <h2><?= $row->title?></h2>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        Main Icon
                                    </div>
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                            <img src="<?= !empty($content_row['main_icon']) ? get_site_image_src("glasses", $content_row['main_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="main_icon" accept="image/*" <?php if(empty($content_row['main_icon'])){echo 'required=""';}?>>
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <label for="page_title" class="control-label"> Page Title <span class="symbol required">*</span></label>
                                    <input type="text" name="" id="title" value="<?php if (isset($row->title)) echo $row->title; ?>" class="form-control" required autofocus>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="overview" class="control-label"> Overview <span class="symbol required">*</span></label>
                                    <textarea name="overview" id="overview" class="form-control" rows="2" required=""><?= $content_row['overview'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php switch ($row->id) : case 1:?>
                    <div class="form-group">
                        <h3>Lens Type</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <div class="panel panel-primary" data-collapsed="0">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    First Icon
                                                </div>
                                                <div class="panel-options">
                                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                        <img src="<?= !empty($content_row['type_first_icon']) ? get_site_image_src("glasses", $content_row['type_first_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="type_first_icon" accept="image/*" <?php if(empty($content_row['type_first_icon'])){echo 'required=""';}?>>
                                                        </span>
                                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="type_first_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                <input type="text" name="type_first_title" id="type_first_title" value="<?= $content_row['type_first_title'] ?>" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="type_first_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                <textarea name="type_first_detail" id="type_first_detail" rows="4" class="form-control" ><?= $content_row['type_first_detail'] ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="type_first_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">US $</span>
                                                    <input type="number" min="0" step="any" name="type_first_price" id="type_first_price" value="<?php if (isset($row->type_first_price)) echo $row->type_first_price; ?>" class="form-control" placeholder="Price" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <div class="panel panel-primary" data-collapsed="0">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    Second Icon
                                                </div>
                                                <div class="panel-options">
                                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                        <img src="<?= !empty($content_row['type_second_icon']) ? get_site_image_src("glasses", $content_row['type_second_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="type_second_icon" accept="image/*" <?php if(empty($content_row['type_second_icon'])){echo 'required=""';}?>>
                                                        </span>
                                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="type_second_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                <input type="text" name="type_second_title" id="type_second_title" value="<?= $content_row['type_second_title'] ?>" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="type_second_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                <textarea name="type_second_detail" id="type_second_detail" rows="4" class="form-control" ><?= $content_row['type_second_detail'] ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="type_second_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">US $</span>
                                                    <input type="number" min="0" step="any" name="type_second_price" id="type_second_price" value="<?php if (isset($row->type_second_price)) echo $row->type_second_price; ?>" class="form-control" placeholder="Price" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php break; case 2:?>
                        <div class="form-group">
                            <h3>Lens Type</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        First Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['type_first_icon']) ? get_site_image_src("glasses", $content_row['type_first_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="type_first_icon" accept="image/*" <?php if(empty($content_row['type_first_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="type_first_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="type_first_title" id="type_first_title" value="<?= $content_row['type_first_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_first_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="type_first_detail" id="type_first_detail" rows="4" class="form-control" ><?= $content_row['type_first_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_first_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="type_first_price" id="type_first_price" value="<?php if (isset($row->type_first_price)) echo $row->type_first_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Second Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['type_second_icon']) ? get_site_image_src("glasses", $content_row['type_second_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="type_second_icon" accept="image/*" <?php if(empty($content_row['type_second_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="type_second_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="type_second_title" id="type_second_title" value="<?= $content_row['type_second_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_second_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="type_second_detail" id="type_second_detail" rows="4" class="form-control" ><?= $content_row['type_second_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_second_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="type_second_price" id="type_second_price" value="<?php if (isset($row->type_second_price)) echo $row->type_second_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h3>Classic Lenses</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        First Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['classic_first_icon']) ? get_site_image_src("glasses", $content_row['classic_first_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="classic_first_icon" accept="image/*" <?php if(empty($content_row['classic_first_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="classic_first_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="classic_first_title" id="classic_first_title" value="<?= $content_row['classic_first_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_first_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="classic_first_detail" id="classic_first_detail" rows="4" class="form-control" ><?= $content_row['classic_first_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_first_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="classic_first_price" id="classic_first_price" value="<?php if (isset($row->classic_first_price)) echo $row->classic_first_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Second Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['classic_second_icon']) ? get_site_image_src("glasses", $content_row['classic_second_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="classic_second_icon" accept="image/*" <?php if(empty($content_row['classic_second_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="classic_second_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="classic_second_title" id="classic_second_title" value="<?= $content_row['classic_second_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_second_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="classic_second_detail" id="classic_second_detail" rows="4" class="form-control" ><?= $content_row['classic_second_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_second_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="classic_second_price" id="classic_second_price" value="<?php if (isset($row->classic_second_price)) echo $row->classic_second_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Third Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['classic_third_icon']) ? get_site_image_src("glasses", $content_row['classic_third_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="classic_third_icon" accept="image/*" <?php if(empty($content_row['classic_third_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="classic_third_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="classic_third_title" id="classic_third_title" value="<?= $content_row['classic_third_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_third_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="classic_third_detail" id="classic_third_detail" rows="4" class="form-control" ><?= $content_row['classic_third_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_third_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="classic_third_price" id="classic_third_price" value="<?php if (isset($row->classic_third_price)) echo $row->classic_third_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php break; case 3:?>
                        <div class="form-group">
                            <h3>Lens Type</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        First Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['type_first_icon']) ? get_site_image_src("glasses", $content_row['type_first_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="type_first_icon" accept="image/*" <?php if(empty($content_row['type_first_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="type_first_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="type_first_title" id="type_first_title" value="<?= $content_row['type_first_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_first_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="type_first_detail" id="type_first_detail" rows="4" class="form-control" ><?= $content_row['type_first_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_first_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="type_first_price" id="type_first_price" value="<?php if (isset($row->type_first_price)) echo $row->type_first_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Second Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['type_second_icon']) ? get_site_image_src("glasses", $content_row['type_second_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="type_second_icon" accept="image/*" <?php if(empty($content_row['type_second_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="type_second_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="type_second_title" id="type_second_title" value="<?= $content_row['type_second_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_second_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="type_second_detail" id="type_second_detail" rows="4" class="form-control" ><?= $content_row['type_second_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_second_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="type_second_price" id="type_second_price" value="<?php if (isset($row->type_second_price)) echo $row->type_second_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h3>Classic Lenses</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        First Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['classic_first_icon']) ? get_site_image_src("glasses", $content_row['classic_first_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="classic_first_icon" accept="image/*" <?php if(empty($content_row['classic_first_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="classic_first_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="classic_first_title" id="classic_first_title" value="<?= $content_row['classic_first_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_first_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="classic_first_detail" id="classic_first_detail" rows="4" class="form-control" ><?= $content_row['classic_first_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_first_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="classic_first_price" id="classic_first_price" value="<?php if (isset($row->classic_first_price)) echo $row->classic_first_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Second Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['classic_second_icon']) ? get_site_image_src("glasses", $content_row['classic_second_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="classic_second_icon" accept="image/*" <?php if(empty($content_row['classic_second_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="classic_second_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="classic_second_title" id="classic_second_title" value="<?= $content_row['classic_second_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_second_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="classic_second_detail" id="classic_second_detail" rows="4" class="form-control" ><?= $content_row['classic_second_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_second_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="classic_second_price" id="classic_second_price" value="<?php if (isset($row->classic_second_price)) echo $row->classic_second_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Third Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['classic_third_icon']) ? get_site_image_src("glasses", $content_row['classic_third_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="classic_third_icon" accept="image/*" <?php if(empty($content_row['classic_third_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="classic_third_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="classic_third_title" id="classic_third_title" value="<?= $content_row['classic_third_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_third_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="classic_third_detail" id="classic_third_detail" rows="4" class="form-control" ><?= $content_row['classic_third_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_third_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="classic_third_price" id="classic_third_price" value="<?php if (isset($row->classic_third_price)) echo $row->classic_third_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php break; case 4:?>
                        <div class="form-group">
                            <h3>Lens Type</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        First Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['type_first_icon']) ? get_site_image_src("glasses", $content_row['type_first_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="type_first_icon" accept="image/*" <?php if(empty($content_row['type_first_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="type_first_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="type_first_title" id="type_first_title" value="<?= $content_row['type_first_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_first_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="type_first_detail" id="type_first_detail" rows="4" class="form-control" ><?= $content_row['type_first_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_first_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="type_first_price" id="type_first_price" value="<?php if (isset($row->type_first_price)) echo $row->type_first_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Second Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['type_second_icon']) ? get_site_image_src("glasses", $content_row['type_second_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="type_second_icon" accept="image/*" <?php if(empty($content_row['type_second_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="type_second_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="type_second_title" id="type_second_title" value="<?= $content_row['type_second_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_second_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="type_second_detail" id="type_second_detail" rows="4" class="form-control" ><?= $content_row['type_second_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_second_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="type_second_price" id="type_second_price" value="<?php if (isset($row->type_second_price)) echo $row->type_second_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h3>Lens Property</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        First Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['property_first_icon']) ? get_site_image_src("glasses", $content_row['property_first_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="property_first_icon" accept="image/*" <?php if(empty($content_row['property_first_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="property_first_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="property_first_title" id="property_first_title" value="<?= $content_row['property_first_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="property_first_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="property_first_detail" id="property_first_detail" rows="4" class="form-control" ><?= $content_row['property_first_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="property_first_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="property_first_price" id="property_first_price" value="<?php if (isset($row->property_first_price)) echo $row->property_first_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Second Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['property_second_icon']) ? get_site_image_src("glasses", $content_row['property_second_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="property_second_icon" accept="image/*" <?php if(empty($content_row['property_second_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="property_second_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="property_second_title" id="property_second_title" value="<?= $content_row['property_second_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="property_second_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="property_second_detail" id="property_second_detail" rows="4" class="form-control" ><?= $content_row['property_second_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="property_second_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="property_second_price" id="property_second_price" value="<?php if (isset($row->property_second_price)) echo $row->property_second_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h3>Classic Lenses</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        First Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['classic_first_icon']) ? get_site_image_src("glasses", $content_row['classic_first_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="classic_first_icon" accept="image/*" <?php if(empty($content_row['classic_first_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="classic_first_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="classic_first_title" id="classic_first_title" value="<?= $content_row['classic_first_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_first_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="classic_first_detail" id="classic_first_detail" rows="4" class="form-control" ><?= $content_row['classic_first_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_first_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="classic_first_price" id="classic_first_price" value="<?php if (isset($row->classic_first_price)) echo $row->classic_first_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Second Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['classic_second_icon']) ? get_site_image_src("glasses", $content_row['classic_second_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="classic_second_icon" accept="image/*" <?php if(empty($content_row['classic_second_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="classic_second_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="classic_second_title" id="classic_second_title" value="<?= $content_row['classic_second_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_second_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="classic_second_detail" id="classic_second_detail" rows="4" class="form-control" ><?= $content_row['classic_second_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_second_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="classic_second_price" id="classic_second_price" value="<?php if (isset($row->classic_second_price)) echo $row->classic_second_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Third Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['classic_third_icon']) ? get_site_image_src("glasses", $content_row['classic_third_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="classic_third_icon" accept="image/*" <?php if(empty($content_row['classic_third_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="classic_third_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="classic_third_title" id="classic_third_title" value="<?= $content_row['classic_third_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_third_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="classic_third_detail" id="classic_third_detail" rows="4" class="form-control" ><?= $content_row['classic_third_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_third_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="classic_third_price" id="classic_third_price" value="<?php if (isset($row->classic_third_price)) echo $row->classic_third_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php break; case 5:?>
                        <div class="form-group">
                            <h3>Lens Type</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        First Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['type_first_icon']) ? get_site_image_src("glasses", $content_row['type_first_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="type_first_icon" accept="image/*" <?php if(empty($content_row['type_first_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="type_first_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="type_first_title" id="type_first_title" value="<?= $content_row['type_first_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_first_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="type_first_detail" id="type_first_detail" rows="4" class="form-control" ><?= $content_row['type_first_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_first_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="type_first_price" id="type_first_price" value="<?php if (isset($row->type_first_price)) echo $row->type_first_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Second Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['type_second_icon']) ? get_site_image_src("glasses", $content_row['type_second_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="type_second_icon" accept="image/*" <?php if(empty($content_row['type_second_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="type_second_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="type_second_title" id="type_second_title" value="<?= $content_row['type_second_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_second_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="type_second_detail" id="type_second_detail" rows="4" class="form-control" ><?= $content_row['type_second_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="type_second_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="type_second_price" id="type_second_price" value="<?php if (isset($row->type_second_price)) echo $row->type_second_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h3>Lens Property</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        First Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['property_first_icon']) ? get_site_image_src("glasses", $content_row['property_first_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="property_first_icon" accept="image/*" <?php if(empty($content_row['property_first_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="property_first_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="property_first_title" id="property_first_title" value="<?= $content_row['property_first_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="property_first_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="property_first_detail" id="property_first_detail" rows="4" class="form-control" ><?= $content_row['property_first_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="property_first_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="property_first_price" id="property_first_price" value="<?php if (isset($row->property_first_price)) echo $row->property_first_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Second Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['property_second_icon']) ? get_site_image_src("glasses", $content_row['property_second_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="property_second_icon" accept="image/*" <?php if(empty($content_row['property_second_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="property_second_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="property_second_title" id="property_second_title" value="<?= $content_row['property_second_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="property_second_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="property_second_detail" id="property_second_detail" rows="4" class="form-control" ><?= $content_row['property_second_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="property_second_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="property_second_price" id="property_second_price" value="<?php if (isset($row->property_second_price)) echo $row->property_second_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h3>Classic Lenses</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        First Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['classic_first_icon']) ? get_site_image_src("glasses", $content_row['classic_first_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="classic_first_icon" accept="image/*" <?php if(empty($content_row['classic_first_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="classic_first_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="classic_first_title" id="classic_first_title" value="<?= $content_row['classic_first_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_first_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="classic_first_detail" id="classic_first_detail" rows="4" class="form-control" ><?= $content_row['classic_first_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_first_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="classic_first_price" id="classic_first_price" value="<?php if (isset($row->classic_first_price)) echo $row->classic_first_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Second Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['classic_second_icon']) ? get_site_image_src("glasses", $content_row['classic_second_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="classic_second_icon" accept="image/*" <?php if(empty($content_row['classic_second_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="classic_second_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="classic_second_title" id="classic_second_title" value="<?= $content_row['classic_second_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_second_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="classic_second_detail" id="classic_second_detail" rows="4" class="form-control" ><?= $content_row['classic_second_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_second_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="classic_second_price" id="classic_second_price" value="<?php if (isset($row->classic_second_price)) echo $row->classic_second_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary" data-collapsed="0">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        Third Icon
                                                    </div>
                                                    <div class="panel-options">
                                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                            <img src="<?= !empty($content_row['classic_third_icon']) ? get_site_image_src("glasses", $content_row['classic_third_icon']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="classic_third_icon" accept="image/*" <?php if(empty($content_row['classic_third_icon'])){echo 'required=""';}?>>
                                                            </span>
                                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="classic_third_title" class="control-label"> Title <span class="symbol required">*</span></label>
                                                    <input type="text" name="classic_third_title" id="classic_third_title" value="<?= $content_row['classic_third_title'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_third_detail" class="control-label"> Overview<span class="symbol required">*</span></label>
                                                    <textarea name="classic_third_detail" id="classic_third_detail" rows="4" class="form-control" ><?= $content_row['classic_third_detail'] ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="classic_third_price" class="control-label"> Price <span class="symbol required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">US $</span>
                                                        <input type="number" min="0" step="any" name="classic_third_price" id="classic_third_price" value="<?php if (isset($row->classic_third_price)) echo $row->classic_third_price; ?>" class="form-control" placeholder="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php break;?>
                <?php endswitch; ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-2 control-label "></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Glasses')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> Manage <strong>Glasses</strong></h2>
        </div>
        <!-- 
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/glasses/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
         -->
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <!-- <th width="10%">Photo</th> -->
                <th>Title</th>
                <!-- <th>Overview</th> -->
                <!-- <th width="12%">Default Price</th> -->
                <th width="100" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): ?>
                <?php foreach ($rows as $key => $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= $key+1; ?></td>
                        <!-- <td class="text-center"><img src = "<?=  get_site_image_src("glasses", $row->image); ?>" height = "60"></td> -->
                        <td><?= $row->title ?></td>
                        <!-- <td><?= $row->overview; ?></td> -->
                        <!-- <td><?= format_amount($row->default_price); ?>/<?= $row->price_label?></td> -->
                        <td class="text-center">
                            <a href="<?= site_url(ADMIN.'/glasses/manage/'.$row->id); ?>" class="btn btn-primary">Edit</a>
                        </td>
                        <!-- 
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/glasses/manage/'.$row->id); ?>">Edit</a></li>
                                    <?php if(access(10)):?>
                                        <li><a href="<?= site_url(ADMIN.'/glasses/delete/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                    <?php endif?>
                                </ul>
                            </div>
                        </td>
                         -->
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>