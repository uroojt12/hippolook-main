<?php echo getBredcrum(ADMIN, array('#' => 'Design Guide')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Design Guide</strong></h2>
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
                    <div class="col-md-12">
                        <label for="heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="heading" id="heading" value="<?= $row['heading'] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="detail" id="detail" rows="5" class="form-control ckeditor" required=""><?= $content->full_code ?></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
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
                                                    <img src="<?= !empty($row['image'.$i]) ? get_site_image_src("images/", $row['image'.$i]) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="image<?= $i?>" accept="image/*">
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="heading<?= $i?>" class="control-label"> Heading <?= $i?> </label>
                                    <input type="text" name="heading<?= $i?>" id="heading<?= $i?>" value="<?= $row['heading'.$i] ?>" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="detail<?= $i?>" class="control-label"> Detail <?= $i?></label>
                                    <textarea name="detail<?= $i?>" id="detail<?= $i?>" rows="4" class="form-control" ><?= $row['detail'.$i] ?></textarea>
                                </div>
                            </div>
                        </div>
                    <?php endfor?>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="footer_text" class="control-label"> Footer Text <span class="symbol required">*</span></label>
                        <textarea name="footer_text" id="footer_text" rows="2" class="form-control" required=""><?= $row['footer_text'] ?></textarea>
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