<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Add/Update Scraping Store')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="fa fa-th-large"></i> Add/Update <strong>Scraping Store</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/scraping'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action=""  role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="title"> Store Title</label>
                            <input type="text" name="title" id="title" value="<?php if (isset($row->title)) echo $row->title; ?>" class="form-control" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10">
                            <label class="control-label" for="link"> Store link</label>
                            <input type="text" name="link" id="link" value="<?php if (isset($row->link)) echo $row->link; ?>" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label" for="percentage"> Increase Price Percentage</label>
                            <input type="text" name="percentage" id="percentage" value="<?php if (isset($row->percentage)) echo $row->percentage; ?>" class="form-control">
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
    <?= getBredcrum(ADMIN, array('#' => 'Manage Scraping Stores')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="fa fa-th-large"></i> Manage <strong>Scraping Stores</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/scraping/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th>Store Title</th>
                <th width="50">Scraped</th>
                <th width="15%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td><?= $row->title; ?></td>
                        <td><?= get_yes_no($row->scraped); ?></td>
                        <td class="text-center">
                            <?php if (empty($row->scraped)): ?>
                                <a href="<?= site_url(ADMIN.'/scraping/save-pagination/'.$row->id); ?>" class="btn btn-primary">Scrape</a>
                            <?php endif ?>
                            <a href="<?= site_url(ADMIN.'/scraping/manage/'.$row->id); ?>" class="btn btn-success">Edit</a>
                            <a href="<?= site_url(ADMIN.'/scraping/delete/'.$row->id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>