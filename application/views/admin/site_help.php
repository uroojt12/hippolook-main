<?php echo getBredcrum(ADMIN, array('#' => 'Help')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Help</strong></h2>
    </div>
    <div class="col-md-6 text-right">

    </div>
</div>
<div>
    <hr>
    <div class="clearfix"></div>
    <div class="panel-body">
        <form role="form"  method="post" class="form-horizontal form-groups-bordered validate" novalidate="novalidate" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-md-12">
                    <label for="page_title" class="control-label"> Page Title <span class="symbol required">*</span></label>
                    <input type="text" name="page_title" id="page_title" value="<?= $row['page_title'] ?>" class="form-control" autofocus required>
                </div>
                <div class="col-md-6">
                    <label for="meta_description" class="control-label"> Meta Description <span class="symbol required">*</span></label>
                    <textarea name="meta_description" id="meta_description" class="form-control" rows="5" required=""><?= $row['meta_description'] ?></textarea>
                </div>
                <div class="col-md-6">
                    <label for="meta_keywords" class="control-label"> Meta Keywords <span class="symbol required">*</span></label>
                    <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="5" required=""><?= $row['meta_keywords'] ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 col-md-12 ">
                    <label for="heading" class="control-label "> Heading <span class="symbol required">*</span></label>
                    <input type="text" name="heading" id="heading" value="<?= $row['heading'] ?>" class="form-control" required="">
                </div>
                <div class="col-sm-12 col-md-12 ">
                    <label for="short_desc" class="control-label "> Detail <span class="symbol required">*</span></label>
                    <textarea name="short_desc" rows="8" class="form-control" required=""><?= $row['short_desc'] ?></textarea>
                </div>
            </div>

            <h3> Last Section</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="last_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                    <input type="text" name="last_heading" value="<?= $row['last_heading'] ?>" id="last_heading" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="last_btn1_text" class="control-label"> Button1 Text <span class="symbol required">*</span></label>
                    <input type="text" name="last_btn1_text" id="last_btn1_text" value="<?= $row['last_btn1_text'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="last_btn2_text" class="control-label"> Button2 Text <span class="symbol required">*</span></label>
                    <input type="text" name="last_btn2_text" id="last_btn2_text" value="<?= $row['last_btn2_text'] ?>" class="form-control" required>
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