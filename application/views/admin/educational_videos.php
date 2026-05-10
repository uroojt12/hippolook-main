<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Add/Update Educational video')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> Add/Update <strong>Educational video</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/educational_videos'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action=""  role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        Thumb Image
                                    </div>
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                            <img src="<?= !empty($row->image) ? get_site_image_src("educational", $row->image, 'thumb_') : 'http://placehold.it/3000x1000' ?>" alt="--">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image" accept="image/*" <?php if(empty($row->image)){echo 'required=""';}?>>
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
                                        <label for="title" class="control-label"> Title <span class="symbol required">*</span></label>
                                        <input type="text" name="title" id="title" value="<?php if (isset($row->title)) echo $row->title; ?>" class="form-control" required autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="video_type" class="control-label"> Video Type <span class="symbol required">*</span></label>
                                        <select name="video_type" id="video_type" class="form-control">
                                            <option value="youtube"<?= $row->video_type == 'youtube' ? ' selected' : '';?>>Youtube</option>
                                            <option value="video"<?= $row->video_type == 'video' ? ' selected' : ''?>>Video</option>
                                        </select>
                                    </div>
                                    <div class="col-md-10 youtube<?= $row->video_type == 'video' ? ' hidden' : ''?>">
                                        <label for="video_code" class="control-label"> Video Code <span class="symbol required">*</span></label>
                                        <input type="text" name="video_code" id="video_code" value="<?= $row->video_code ?>" class="form-control" required<?= $row->video_type == 'video' ? ' disabled' : ''?>>
                                    </div>
                                    <div class="col-md-10 video<?= empty($row->video_type) || $row->video_type == 'youtube' ? ' hidden' : ''?>">
                                        <label for="video_file" class="control-label"> Upload Video <span class="symbol required">*</span></label><br>
                                        <?php if (!empty($row->video_file)): ?>
                                            <video src="<?= SITE_IMAGES.'educational/'.$row->video_file?>" controls width="200"></video>
                                        <?php endif ?>
                                        <br>
                                        <input type="file" name="video_file" id="video_file" class="form-control file2 inline btn btn-primary" accept="video/mp4" data-label = "<i class='fa fa-upload'></i> Browse"<?= empty($row->video_type) || $row->video_type == 'youtube' ? ' disabled' : ''?> />
                                        <div><br />
                                            <small style = " color:#F00;">* Allowed formats are <strong>MP4</strong>.</small><br>
                                            <!-- <small style = "color:#F00;">* Image size maximum <strong>20MB</strong> allowed.</small> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>

<script type="text/javascript">
    (function($){
        $(function(){
            $(document).on('change', '#video_type', function (e){
                let type = this.value;
                if (type == 'youtube') {
                    $('.video').addClass('hidden').find('input').prop('disabled', true);
                    $('.youtube').removeClass('hidden').find('input').prop('disabled', false);
                } else {
                    $('.youtube').addClass('hidden').find('input').prop('disabled', true);
                    $('.video').removeClass('hidden').find('input').prop('disabled', false);
                }
            });
        })
    }(jQuery))
</script>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Educational videos')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> Manage <strong>Educational videos</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= base_url(ADMIN . '/educational_videos/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="60" class="text-center">Sr#</th>
                <th width="200">Photo</th>
                <th>Title</th>
                <!-- <th width="200">Video Code</th> -->
                <th width="200">Video Type</th>
                <th width="150" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): ?>
                <?php foreach ($rows as $key => $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= $key+1; ?></td>
                        <td class="text-left"><img src = "<?=  get_site_image_src("educational", $row->image, 'thumb_'); ?>" width = "100"></td>
                        <td class="text-left"><strong><?= $row->title ?></strong></td>
                        <!-- <td class="text-left"><?= $row->video_code ?></td> -->
                        <td class="text-left"><?= ucfirst($row->video_type) ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/educational_videos/manage/'.$row->id); ?>">Edit</a></li>
                                    <li><a href="<?= site_url(ADMIN.'/educational_videos/delete/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>