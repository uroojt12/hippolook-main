<?php if ($this->uri->segment(3) == 'manage-category'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Add/Update Category')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="fa fa-th-large"></i> Add/Update <strong>Category</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/products/categories'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action=""  role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"> Category Title</label>
                            <input type="text" name="name" value="<?php if (isset($row->name)) echo $row->name; ?>" class="form-control" required autofocus>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"> Parent Category</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="0"> - No Parent - </option>
                                <?php
                                foreach ($parent_categories as $rs) {
                                    ?><option value="<?= $rs->id; ?>" <?= ($rs->id == $row->parent_id) ? 'selected' : ''; ?>><?= $rs->name; ?></option>
                                <?php } ?>
                            </select>                            
                        </div>
                    </div>
                </div> -->
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"> Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" <?php
                                if (isset($row->status) && '1' == $row->status) {
                                    echo 'selected';
                                }
                                ?>>Active</option>
                                <option value="0" <?php
                                if (isset($row->status) && '0' == $row->status) {
                                    echo 'selected';
                                }
                                ?>>InActive</option>
                            </select>
                        </div>
                    </div>        
                </div>     
                <div class="clearfix"></div>
                <div class="col-md-12">                
                    <hr class="hr-short">
                    <div class="form-group text-right">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Categories')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="fa fa-th-large"></i> Manage <strong>Categories</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/products/manage-category'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th>Category Title</th>
                <!-- <th width="30%">Parent Category</th> -->
                <th width="8%" class="text-center">Status</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td><?= $row->name; ?></td>
                        <!-- <td><?= get_default(get_cat_name($row->parent_id), '-----'); ?></td> -->
                        <td class="text-center"><?= getStatus($row->status); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/products/manage-category/'.$row->id); ?>">Edit</a></li>
                                    <li><a href="<?= site_url(ADMIN.'/products/delete-category/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>