<?php echo getBredcrum(ADMIN, array('#' => 'About us')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>About us</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <!--        <a href="<?php echo base_url('admin/about'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>-->
    </div>
</div>
<div>
    <hr>
    <div class="clearfix"></div>
    <div class="panel-body">
        <form role="form"  method="post" class="form-horizontal form-groups-bordered validate" novalidate="novalidate" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-primary" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Banner Image
                                </div>
                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                        <img src="<?= !empty($row['image1']) ? get_site_image_src("images/", $row['image1']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image1" accept="image/*" <?php if(empty($row['image1'])){echo 'required=""';}?>>
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="page_title" class="control-label"> Page Title <span class="symbol required">*</span></label>
                                <input type="text" name="page_title" id="page_title" value="<?= $row['page_title'] ?>" class="form-control" autofocus required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="meta_description" class="control-label"> Meta Description <span class="symbol required">*</span></label>
                                <textarea name="meta_description" id="meta_description" class="form-control" rows="5" required=""><?= $row['meta_description'] ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="meta_keywords" class="control-label"> Meta Keywords <span class="symbol required">*</span></label>
                                <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="5" required=""><?= $row['meta_keywords'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3>First Section</h3>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="first_left_heading" class="control-label"> Left Heading <span class="symbol required">*</span></label>
                                <input type="text" name="first_left_heading" id="first_left_heading" value="<?= $row['first_left_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="first_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="first_heading" id="first_heading" value="<?= $row['first_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="first_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                                <textarea name="first_detail" id="first_detail" rows="5" class="form-control ckeditor" required=""><?= $row['first_detail'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Second Section</h3>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-primary" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Image
                                </div>
                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                        <img src="<?= !empty($row['image2']) ? get_site_image_src("images/", $row['image2']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image2" accept="image/*" <?php if(empty($row['image2'])){echo 'required=""';}?>>
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="second_link" class="control-label"> Link <span class="symbol required">*</span></label>
                                <input type="text" name="second_link" id="second_link" value="<?= $row['second_link'] ?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Third Section <!-- <input type="checkbox" name="third_section" id="third_section" value="true"<?= !$row || $row['third_section'] ? ' checked=""' : '' ?>> --></h3>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="third_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="third_heading" id="third_heading" value="<?= $row['third_heading'] ?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php for($i = 1; $i <= 6; $i++):?>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="panel panel-primary" data-collapsed="0">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                Image <?= $i?>
                                            </div>
                                            <div class="panel-options">
                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                    <img src="<?= !empty($row['third_image'.$i]) ? get_site_image_src("images/", $row['third_image'.$i]) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="third_image<?=$i?>" accept="image/*" <?php if(empty($row['third_image'.$i])){echo 'required=""';}?>>
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="third_heading<?=$i?>" class="control-label"> Heading <?= $i?> <span class="symbol required">*</span></label>
                                    <input type="text" name="third_heading<?=$i?>" id="third_heading<?=$i?>" value="<?= $row['third_heading'.$i] ?>" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="third_text<?=$i?>" class="control-label"> Detail <?= $i?><span class="symbol required">*</span></label>
                                    <textarea name="third_text<?=$i?>" id="third_text<?=$i?>" rows="4" class="form-control" ><?= $row['third_text'.$i] ?></textarea>
                                </div>
                            </div>
                        </div>
                    <?php endfor?>
                </div>
            </div>
            
            <h3>Fourth Section</h3>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="fourth_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="fourth_heading" id="fourth_heading" value="<?= $row['fourth_heading'] ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="fourth_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                                <textarea name="fourth_detail" id="fourth_detail" rows="5" class="form-control ckeditor" required=""><?= $row['fourth_detail'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-primary" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Image
                                </div>
                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                        <img src="<?= !empty($row['image3']) ? get_site_image_src("images/", $row['image3']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image3" accept="image/*" <?php if(empty($row['image3'])){echo 'required=""';}?>>
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-2 control-label "></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
</div>