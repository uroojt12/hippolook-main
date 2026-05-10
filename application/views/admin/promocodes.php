<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Add/Update Promo Codes')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Add/Update <strong>Promo Codes</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/promocodes'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action=""  role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <h3><i class="fa fa-ticket"></i> Promo Codes Detail</h3>
                    <hr class="hr-short">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="code"> Discount Code <span class="symbol required">*</span></label>
                            <input type="text" name="code" id="code" class="form-control" required="" autofocus="" value="<?php if (isset($row->code)) echo $row->code; ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="control-label" for="code_type"> Type <span class="symbol required">*</span></label>
                            <select id="code_type" name="code_type" id="code_type" class="form-control" required="">
                                <option value="percent"<?= (isset($row->code_type) && 'percent' == $row->code_type)?' selected':'';?>> Percentage</option>
                                <option value="fixed"<?= (isset($row->code_type) && 'fixed' == $row->code_type)?' selected':'';?>> Fixed</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label" for="amount"> Amount/ Percentage <span class="symbol required">*</span></label>
                            <input type="number" step="0.1" name="amount" id="amount" class="form-control" required="" value="<?php if (isset($row->amount)) echo $row->amount; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="codes"> Number of Codes <span class="symbol required">*</span></label>
                            <input type="number" name="codes" min="0" id="codes" class="form-control" required="" value="<?php if (isset($row->codes)) echo $row->codes; ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="control-label" for="expiry_date"> Expiration Date <span class="symbol required">*</span></label>
                            <input type="text" name="expiry_date" id="expiry_date" class="form-control datepicker" required="" value="<?php if (isset($row->expiry_date)) echo format_date($row->expiry_date, 'm/d/Y'); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="control-label" for="status"> Status <span class="symbol required">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value="1"<?= (isset($row->status) && '1' == $row->status)?' selected':'';?>>Active</option>
                                <option value="0"<?= (isset($row->status) && '0' == $row->status)?' selected':'';?>>InActive</option>
                            </select>
                        </div>
                    </div>              
                    <hr class="hr-short">
                    <div class="form-group text-right">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php else: ?>
        <?= showMsg(); ?>
        <?= getBredcrum(ADMIN, array('#' => 'Manage Promo Codes')); ?>
        <div class="row margin-bottom-10">
            <div class="col-md-6">
                <h2 class="no-margin"><i class="entypo-list"></i> Manage <strong>Promo Codes</strong></h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="<?= site_url(ADMIN . '/promocodes/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
            </div>
        </div>
        <table class="table table-bordered datatable" id="table-1">
            <thead>
                <tr>
                    <th width="5%" class="text-center">Sr#</th>
                    <th>Code</th>
                    <th>Code Type</th>
                    <th>Code Value</th>
                    <th>Expiry Date</th>
                    <th width="5%">Status</th>
                    <th width="12%" class="text-center">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($rows) > 0): $count = 0; ?>
                    <?php foreach ($rows as $row): ?>
                        <tr class="odd gradeX">
                            <td class="text-center"><?= ++$count; ?></td>
                            <td><?= $row->code; ?></td>
                            <td><?= ucfirst($row->code_type); ?></td>
                            <td><?= $row->code_type=='fixed'?format_amount($row->amount):$row->amount.'%'; ?></td>
                            <td><?= format_date($row->expiry_date); ?></td>
                            <td><?= getStatus($row->status)?></td>
                            <td class="text-center">
                                <a href="<?= site_url(ADMIN.'/promocodes/manage/'.$row->id); ?>">Edit</a> |
                                <a href="<?= site_url(ADMIN.'/promocodes/delete/'.$row->id); ?>" onclick="return confirm('Delete?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <script type="text/javascript">
        (function($){
            $(function(){
                $('#printBtn').click(function(){
                    setTimeout(function(){
                        location.reload();
                    },100)
                })
            })
        }(jQuery))
    </script>