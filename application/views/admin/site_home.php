<?= getBredcrum(ADMIN, array('#' => 'Home Page')); ?>
<?= showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Home Page</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <!--        <a href="<?= base_url('admin/services'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>-->
    </div>
</div>
<div>
    <hr>
    <div class="clearfix"></div>
    <div class="panel-body">
        <form role="form"  method="post" class="form-horizontal form-groups-bordered validate" novalidate="novalidate" enctype="multipart/form-data">
            <h3>First Section <!-- <input type="checkbox" name="first_section" id="first_section" value="true"<?= !$row || $row['first_section'] ? ' checked=""' : '' ?>> --></h3>
            <div class="form-group">
                <div class="row">
                    <?php for($i = 1; $i <= 3; $i++):?>
                        <div class="col-md-4">
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
                                                    <img src="<?= !empty($row['first_image'.$i]) ? get_site_image_src("images/", $row['first_image'.$i]) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="first_image<?=$i?>" accept="image/*" <?php if(empty($row['first_image'.$i])){echo 'required=""';}?>>
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="first_link<?=$i?>" class="control-label"> Link <?= $i?> <span class="symbol required">*</span></label>
                                    <input type="text" name="first_link<?=$i?>" id="first_link<?=$i?>" value="<?= $row['first_link'.$i] ?>" class="form-control" required>
                                </div>
                                <!-- <div class="col-md-12">
                                    <label for="first_text<?=$i?>" class="control-label"> Detail <?= $i?><span class="symbol required">*</span></label>
                                    <textarea name="first_text<?=$i?>" id="first_text<?=$i?>" rows="4" class="form-control" ><?= $row['first_text'.$i] ?></textarea>
                                </div> -->
                            </div>
                        </div>
                    <?php endfor?>
                </div>
            </div>

            <h3>Second Section</h3>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="second_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="second_heading" id="second_heading" value="<?= $row['second_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="second_short_desc" class="control-label"> Short Description <span class="symbol required">*</span></label>
                                <textarea name="second_short_desc" id="second_short_desc" rows="3" class="form-control" required=""><?= $row['second_short_desc'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php for($i = 1; $i <= 5; $i++):?>
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
                                                    <img src="<?= !empty($row['second_image'.$i]) ? get_site_image_src("images/", $row['second_image'.$i]) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="second_image<?=$i?>" accept="image/*" <?php if(empty($row['second_image'.$i])){echo 'required=""';}?>>
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="second_heading<?= $i?>" class="control-label"> Heading <?= $i?> <span class="symbol required">*</span></label>
                                    <input type="text" name="second_heading<?= $i?>" id="second_heading<?=$i?>" value="<?= $row['second_heading'.$i] ?>" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="second_link<?= $i?>" class="control-label"> Link <?= $i?> <span class="symbol required">*</span></label>
                                    <input type="text" name="second_link<?= $i?>" id="second_link<?=$i?>" value="<?= $row['second_link'.$i] ?>" class="form-control" required>
                                </div>
                                <!-- <div class="col-md-12">
                                    <label for="second_text<?=$i?>" class="control-label"> Detail <span class="symbol required">*</span></label>
                                    <textarea name="second_text<?=$i?>" for="second_text<?=$i?>" rows="4" class="form-control" ><?= $row['second_text'.$i] ?></textarea>
                                </div> -->
                            </div>
                        </div>
                    <?php endfor?>
                </div>
            </div>

            <h3>Third Section</h3>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="third_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="third_heading" id="third_heading" value="<?= $row['third_heading'] ?>" class="form-control" required>
                    </div>
                </div>
            </div>


            <h3>Fourth Section <!-- <input type="checkbox" name="fourth_section" id="fourth_section" value="true"<?= !$row || $row['fourth_section'] ? ' checked=""' : '' ?>> --></h3>
            <div class="form-group">
                <div class="row">
                    <?php for($i = 1; $i <= 2; $i++):?>
                        <div class="col-md-6">
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
                                                    <img src="<?= !empty($row['fourth_image'.$i]) ? get_site_image_src("images/", $row['fourth_image'.$i]) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="fourth_image<?=$i?>" accept="image/*" <?php if(empty($row['fourth_image'.$i])){echo 'required=""';}?>>
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="fourth_link<?=$i?>" class="control-label"> Link <?= $i?> <span class="symbol required">*</span></label>
                                    <input type="text" name="fourth_link<?=$i?>" id="fourth_link<?=$i?>" value="<?= $row['fourth_link'.$i] ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    <?php endfor?>
                </div>
            </div>

            <h3>Fifth Section</h3>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="fifth_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="fifth_heading" id="fifth_heading" value="<?= $row['fifth_heading'] ?>" class="form-control" required>
                    </div>
                </div>
            </div>

            <h3> Sixth Section</h3>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="sixth_small_heading" class="control-label"> Small Heading <span class="symbol required">*</span></label>
                                <input type="text" name="sixth_small_heading" id="sixth_small_heading" value="<?= $row['sixth_small_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="sixth_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="sixth_heading" id="sixth_heading" value="<?= $row['sixth_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="sixth_detail" class="control-label"> Short Detail <span class="symbol required">*</span></label>
                                <textarea name="sixth_detail" id="sixth_detail" rows="3" class="form-control" ><?= $row['sixth_detail'] ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="sixth_button_text" class="control-label"> Button Text <span class="symbol required">*</span></label>
                                <input type="text" name="sixth_button_text" id="sixth_button_text" value="<?= $row['sixth_button_text'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="sixth_button_link" class="control-label"> Button Link <span class="symbol required">*</span></label>
                                <input type="text" name="sixth_button_link" id="sixth_button_link" value="<?= $row['sixth_button_link'] ?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Seventh Section <!-- <input type="checkbox" name="seventh_section" id="seventh_section" value="true"<?= !$row || $row['seventh_section'] ? ' checked=""' : '' ?>> --></h3>
            <div class="form-group">
                <div class="row">
                    <?php for($i = 1; $i <= 2; $i++):?>
                        <div class="col-md-6">
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
                                                    <img src="<?= !empty($row['seventh_image'.$i]) ? get_site_image_src("images/", $row['seventh_image'.$i]) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="seventh_image<?=$i?>" accept="image/*" <?php if(empty($row['seventh_image'.$i])){echo 'required=""';}?>>
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="seventh_link<?=$i?>" class="control-label"> Link <?= $i?> <span class="symbol required">*</span></label>
                                    <input type="text" name="seventh_link<?=$i?>" id="seventh_link<?=$i?>" value="<?= $row['seventh_link'.$i] ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    <?php endfor?>
                </div>
            </div>

            <h3>Eight Section</h3>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="eight_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="eight_heading" id="eight_heading" value="<?= $row['eight_heading'] ?>" class="form-control" required>
                    </div>
                </div>
            </div>


            <h3>Last Section</h3>
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
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="last_link" class="control-label"> Link <span class="symbol required">*</span></label>
                                    <input type="text" name="last_link" id="last_link" value="<?= $row['last_link'] ?>" class="form-control" required>
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
</div>