<?php if ($this->uri->segment(3) == 'detail'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Product Orders Management')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="fa fa-bars"></i> Order <strong>Detail</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/abundant-cart'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>
                            <a href="<?= site_url(ADMIN.'/members/manage/'.$row->mem_id); ?>" target="_blank"><b><?= $row->mem_name; ?></b></a>
                        </td>
                        <th>Email</th>
                        <td><?= $row->mem_email;?></td>
                    </tr>
                    <tr>
                        <th>Order Number</th>
                        <td><?= num_size($row->id);?></td>
                        <th>Date</th>
                        <td><?= format_date($row->date, 'M d, Y h:i:s a');?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?= get_order_status($row->status);?></td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <h3><i class="fa fa-shopping-cart"></i> Order Products</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Quantity</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $gtotal = 0?>
                    <?php foreach ($row->products as $key => $pro): ?>
                        <?php
                        $total = floatval($pro->qty*$pro->price);
                        $gtotal += $total;
                        ?>
                        <tr>
                            <td><?= $key+1?></td>
                            <td>
                                <img src="<?= get_image_src($pro->image, 150); ?>" alt="" height="40">
                                <a href="<?= site_url(ADMIN.'/products/manage/'.$pro->p_id); ?>" target="_blank"><b><?= $pro->title; ?></b></a>

                            </td>
                            <td><?= ucfirst($pro->size)?></td>
                            <td><?= $pro->color?></td>
                            <td><?= $pro->qty?></td>
                            <td class="text-right"><?= format_amount($total)?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5" class="text-right bold">Total</th>
                        <td class="text-right"><b><?= format_amount($gtotal-$row->discount_amount+$row->tax_amount)?></b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Abundant Cart Management')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-12">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage <?php if ($this->uri->segment(4) > 0): ?><strong>" <?php echo ucwords($member_row->mem_fname.' '.$member_row->mem_lname); ?> "</strong> <?php endif; ?>Abundant Cart</h2>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th>Customer Name</th>
                <th>Product Count</th>
                <th>Amount</th>
                <th>Date</th>
                <th width="5%">Status</th>
                <th width="12%" class="text-center">Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td><a href="<?= site_url(ADMIN.'/members/manage/'.$row->mem_id); ?>" target="_blank"><b><?= get_mem_name($row->mem_id); ?></b></a></td>
                        <td><?= $row->product_count?></td>
                        <td><?= format_amount($row->product_total-$row->discount_amount+$row->tax_amount)?></td>
                        <td><?= format_date($row->date, 'M d, Y h:i:s a'); ?></td>
                        <td><?= get_order_status($row->status)?></td>
                        <td class="text-center">
                            <a href="<?= site_url(ADMIN.'/abundant-cart/detail/'.$row->id); ?>" class="btn btn-primary btn-sm">View</a>
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

        })
    }(jQuery))
</script>