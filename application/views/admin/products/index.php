<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => $page_title . ' Product')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-basket"></i> <?= $page_title ?> <strong>Product</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/products'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="clearfix"></div>
        <div class="panel-body">
            <form action="" role="form" class="form-horizontal form-groups-bordered frmAjax" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title" class="control-label"> Title <span class="symbol required">*</span></label>
                            <input type="text" name="title" id="title" value="<?php if (isset($row->title)) echo $row->title; ?>" class="form-control" required autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="meta_description" class="control-label"> Meta Description <span class="symbol required">*</span></label>
                            <textarea name="meta_description" id="meta_description" class="form-control" rows="5" required=""><?= $row->meta_description ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="meta_keywords" class="control-label"> Meta Keywords <span class="symbol required">*</span></label>
                            <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="5" required=""><?= $row->meta_keywords ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-3">
                            <label class="control-label" for="brand"> Brand <span class="symbol required">*</span></label>
                            <select name="brand" id="brand" class="form-control" required>
                                <option value="" selected="" disabled=""> - Select - </option>
                                <?php foreach ($brands as $key => $brand_row): ?>
                                    <option value="<?= $brand_row->title ?>"<?= $brand_row->title == $row->brand ? ' selected' : '' ?>><?= $brand_row->title ?></option>
                                <?php endforeach ?>
                            </select>
                        </div> -->
                        <div class="col-md-2">
                            <label class="control-label" for="cat_id"> Category <span class="symbol required">*</span></label>
                            <?php $cat_ids = @explode(',', $row->cat_ids); ?>
                            <select name="cat_id[]" id="cat_id" class="catSub form-control select2" multiple="">
                                <option value="" disabled="" selected=""> - Select - </option>
                                <?php foreach ($cats as $key => $cat_row): ?>
                                    <option value="<?= $cat_row->id ?>" <?= in_array($cat_row->id, $cat_ids) ? ' selected' : '' ?>><?= $cat_row->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="gender" class="control-label"> Gender <span class="symbol required">*</span></label>
                            <?php $genders = @explode(',', $row->gender); ?>
                            <select id="gender" name="gender[]" class="form-control select2" multiple="">
                                <option value="" disabled="" selected=""> - Select - </option>
                                <option value="Male" <?= in_array("Male", $genders) ? ' selected' : '' ?>>Male</option>
                                <option value="Female" <?= in_array("Female", $genders) ? ' selected' : '' ?>>Female</option>
                                <!-- <option value="Both"<?= (isset($row->gender) && "Both" == $row->gender ? ' selected' : '') ?>>Both</option> -->
                            </select>
                        </div>
                        <!-- <div class="col-md-2">
                            <label class="control-label" for="color"> Color <span class="symbol required">*</span></label>
                            <select name="color" id="color" class="form-control" required>
                                <option value="" selected="" disabled=""> - Select - </option>
                                <?php foreach ($colors as $key => $color_row): ?>
                                    <option value="<?= $color_row->title ?>"<?= $color_row->title == $row->color ? ' selected' : '' ?>><?= $color_row->title ?></option>
                                <?php endforeach ?>
                            </select>
                        </div> -->
                        <div class="col-md-2">
                            <label class="control-label" for="shape"> Shape <span class="symbol required">*</span></label>
                            <select name="shape" id="shape" class="form-control" required>
                                <option value="" selected="" disabled=""> - Select - </option>
                                <?php foreach ($shapes as $key => $shape_row): ?>
                                    <option value="<?= $shape_row->title ?>" <?= $shape_row->title == $row->shape ? ' selected' : '' ?>><?= $shape_row->title ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <!-- <div class="col-md-2">
                            <label class="control-label" for="sub_cat_id"> Sub-Category <span class="symbol required">*</span></label>
                            <select name="sub_cat_id" id="sub_cat_id" class="catSub form-control">
                                <option value=""> - Select - </option>
                            </select>
                        </div> -->
                        <!-- <div class="col-md-2">
                            <label class="control-label" for="material"> Material <span class="symbol required">*</span></label>
                            <select name="material" id="material" class="form-control">
                                <option value=""> - Select - </option>
                                <?php foreach ($materials as $key => $material_row): ?>
                                    <option value="<?= $material_row->title ?>"<?= $material_row->title == $row->material ? ' selected' : '' ?>><?= $material_row->title ?></option>
                                <?php endforeach ?>
                            </select>
                        </div> -->
                        <div class="col-md-2">
                            <label class="control-label" for="size"> Size <span class="symbol required">*</span></label>
                            <select name="size" id="size" class="form-control">
                                <option value=""> - Select - </option>
                                <?php foreach ($sizes as $key => $size_row): ?>
                                    <option value="<?= $size_row->title ?>" <?= $size_row->title == $row->size ? ' selected' : '' ?>><?= $size_row->title ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="price" class="control-label"> Price <span class="symbol required">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">US $</span>
                                <input type="number" min="0" step="any" name="price" id="price" value="<?php if (isset($row->price)) echo $row->price; ?>" class="form-control" placeholder="Price" required />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="old_price" class="control-label"> Old Price</label>
                            <div class="input-group">
                                <span class="input-group-addon">US $</span>
                                <input type="number" min="0" step="any" name="old_price" id="old_price" value="<?php if (isset($row->old_price)) echo $row->old_price; ?>" class="form-control" placeholder="Old Price" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="new_in" class="control-label"> Home New In <span class="symbol required">*</span></label>
                            <select id="new_in" name="new_in" class="form-control">
                                <option value="0" <?= (isset($row->new_in) && 0 == $row->new_in ? ' selected' : '') ?>>No</option>
                                <option value="1" <?= (isset($row->new_in) && 1 == $row->new_in ? ' selected' : '') ?>>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="premium" class="control-label"> Home Premium Collection<span class="symbol required">*</span></label>
                            <select id="premium" name="premium" class="form-control">
                                <option value="0" <?= (isset($row->premium) && 0 == $row->premium ? ' selected' : '') ?>>No</option>
                                <option value="1" <?= (isset($row->premium) && 1 == $row->premium ? ' selected' : '') ?>>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="best_seller" class="control-label"> Home Best Seller <span class="symbol required">*</span></label>
                            <select id="best_seller" name="best_seller" class="form-control">
                                <option value="0" <?= (isset($row->best_seller) && 0 == $row->best_seller ? ' selected' : '') ?>>No</option>
                                <option value="1" <?= (isset($row->best_seller) && 1 == $row->best_seller ? ' selected' : '') ?>>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="flash_sale" class="control-label"> Home Flash Sale <span class="symbol required">*</span></label>
                            <select id="flash_sale" name="flash_sale" class="form-control">
                                <option value="0" <?= (isset($row->flash_sale) && 0 == $row->flash_sale ? ' selected' : '') ?>>No</option>
                                <option value="1" <?= (isset($row->flash_sale) && 1 == $row->flash_sale ? ' selected' : '') ?>>Yes</option>
                            </select>
                        </div>

                        <!-- <div class="col-md-2">
                            <label for="pcondition" class="control-label"> Condition <span class="symbol required">*</span></label>
                            <select id="pcondition" name="pcondition" class="form-control">
                                <option value="New"<?= (isset($row->pcondition) && "New" == $row->pcondition ? ' selected' : '') ?>>New</option>
                                <option value="Used"<?= (isset($row->pcondition) && "Used" == $row->pcondition ? ' selected' : '') ?>>Used</option>
                            </select>
                        </div> -->

                        <div class="col-md-2">
                            <label for="stock" class="control-label"> Stock <span class="symbol required">*</span></label>
                            <input type="number" min="0" step="any" name="stock" id="stock" value="<?php if (isset($row->stock)) echo $row->stock; ?>" class="form-control" placeholder="" required />
                        </div>
                        <div class="col-md-2">
                            <label for="status" class="control-label"> Status <span class="symbol required">*</span></label>
                            <select id="status" name="status" class="form-control">
                                <option value="1" <?= (isset($row->status) && 1 == $row->status ? ' selected' : '') ?>>Active</option>
                                <option value="0" <?= (isset($row->status) && 0 == $row->status ? ' selected' : '') ?>>Inactive</option>
                            </select>
                        </div>
                        <!-- <div class="col-md-2">
                            <label for="availability" class="control-label"> Availability <span class="symbol required">*</span></label>
                            <select id="availability" name="availability" class="form-control">
                                <option value="1"<?= (isset($row->availability) && 1 == $row->availability ? ' selected' : '') ?>>Yes</option>
                                <option value="0"<?= (isset($row->availability) && 0 == $row->availability ? ' selected' : '') ?>>No</option>
                            </select>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="sunglasses" class="control-label"> Sunglasses <span class="symbol required">*</span></label>
                            <select id="sunglasses" name="sunglasses" class="form-control">
                                <option value="0" <?= (isset($row->sunglasses) && 0 == $row->sunglasses ? ' selected' : '') ?>>No</option>
                                <option value="1" <?= (isset($row->sunglasses) && 1 == $row->sunglasses ? ' selected' : '') ?>>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="frame_only" class="control-label"> Frame Only <span class="symbol required">*</span></label>
                            <select id="frame_only" name="frame_only" class="form-control">
                                <option value="0" <?= (isset($row->frame_only) && 0 == $row->frame_only ? ' selected' : '') ?>>No</option>
                                <option value="1" <?= (isset($row->frame_only) && 1 == $row->frame_only ? ' selected' : '') ?>>Yes</option>
                            </select>
                        </div>
                    </div>
                </div>

                <h3>Description </h3>
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
                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;background:#eee" data-trigger="fileinput">
                                            <img src="<?= get_site_image_src("products", $row->desc_image) ?>" alt="--">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                        <div>

                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="desc_image" accept="image/*" <?php if (empty($row->desc_image)) {

                                                                                                            echo 'required=""';
                                                                                                        } ?>>

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
                                    <!-- <label for="detail" class="control-label"> Detail <span class="symbol required">*</span></label> -->
                                    <textarea name="detail" id="detail" class="form-control ckeditor" required><?php if (isset($row->detail)) echo $row->detail; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <h3>Images </h3>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Main Thumbnail <span class="symbol required">*</span></label><br>
                            <?php if ($row):

                                // pr($row);
                            ?>
                                <img src="<?= get_image_src($row->image, '150') ?>" height="80"><br>
                            <?php endif ?>
                            <input type="file" name="image" id="image" class="form-control file2 inline btn btn-primary" data-label="<i class='fa fa-upload'></i> Browse" accept="image/*" />
                        </div>

                        <div class="col-md-6">
                            <label class="control-label">Upload Images </label><br>
                            <input type="file" name="upload_files[]" id="uplocamp_file" class="form-control file2 inline btn btn-primary" accept="image/*" multiple data-label="<i class='fa fa-upload'></i> Upload Multiple Images" />
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php
                                if (countlength($row->images) > 0) :
                                    foreach ($row->images as $img) :
                                ?>
                                        <div class="col-md-3 text-center margin-bottom-10 img-blk dy">
                                            <img src="<?= get_image_src($img->image) ?>" style="height:80px; margin-bottom: 10px;"><br>
                                            <button type="button" class="deletePic btn btn-danger btn-sm" data-image="<?= $img->image; ?>"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- <h3>Size </h3>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 margin-bottom-10">
                            <table class="table table-bordered newTable" id="newTable">
                                <tr style="background-color: #eee">
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                                </tr>
                                <?php if (countlength($row->sizes)): ?>
                                    <?php foreach ($row->sizes as $key => $s): ?>
                                        <tr>
                                            <td>
                                                <input type="text" name="size[]" value="<?= $s->size ?>" class="form-control" placeholder="Title" />
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon">€</span>
                                                    <input type="number" min="0" step="any" name="price[]" value="<?= $s->price ?>" class="form-control" />
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" name="qty[]" value="<?= $s->qty ?>" class="form-control" placeholder="Title" />
                                            </td>
                                            <td class="text-center">
                                                <?php if ($key != 0): ?>
                                                    <a href="javascript:void(0)" class="delNewRowTbl" id="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <tr>
                                        <td>
                                            <input type="size" name="size[]" value="" class="form-control" placeholder="title" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon">US $</span>
                                                <input type="number" min="0" step="any" name="price[]" value="" class="form-control" placeholder="Price" />
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" name="qty[]" value="" class="form-control" placeholder="Quantity" />
                                        </td>
                                        <td class="text-center">
                                        </td>
                                    </tr>
                                <?php endif ?>
                            </table>
                        </div>
                    </div>
                </div> -->

                <!-- <h3>Colors</h3>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 margin-bottom-10 colorsContainer">
                            <?php
                            if (countlength($row->colors) > 0) :
                                foreach ($row->colors as $key => $color) :
                            ?>
                                    <div class="row margin-bottom-10">
                                        <div class="col-sm-2">
                                            <input type="color" value="<?= $color->color; ?>" name="colors[]" class="form-control color">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" value="<?= $color->color; ?>" name="colors[]" class="form-control">
                                        </div>
                                        <?php if ($key != 0): ?>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-sm btn-danger removeColor"><i class="fa fa-times"></i></button>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                <?php
                                endforeach;
                                ?>
                            <?php else: ?>
                                <div class="row margin-bottom-10">
                                    <div class="col-sm-2">
                                        <input type="color" value="#ffffff" name="colors[]" class="form-control color">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" value="White" name="colors[]" class="form-control">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="row col-md-12 margin-bottom-10">
                            <div class="col-md-3 pull-left">
                                <button type="button" class="btn btn-sm btn-primary" id="addMoreColor"><i class="fa fa-plus"></i> Add Color</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="clearfix"></div>


                <div class="row" style="margin: 10px 0 10px;">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right" id="abcgit a"><i class="fa fa-save"></i> Save <i class="fa fa-spinner fa-pulse fa-1x fa-fw hidden"></i></button>
                    </div>
                </div>
                <div class="alertMsg"></div>

            </form>
        </div>
        <div class="clearfix"></div>
    </div>

    <!-- Colors -->
    <!-- <script type="text/javascript" src="<?= base_url('assets/js/color.js') ?>"></script> -->

    <script>
        (function($) {
            $(function() {

                // $(document).on('change', '.color', function(e) {
                //     let n_match = ntc.name(this.value);
                //     console.log(n_match)
                //     $(this).parents('.row:first').find("input[name='color_names[]']").val(n_match[1]);
                // });


                // $('#cat_id').change(function() {
                //     let cat = this.value;
                //     $('#sub_cat_id').html('<option value="">Please Wait</option>');
                //     $.ajax({
                //         url: base_url + 'ajax/get-categories',
                //         data: {
                //             'cat': cat
                //         },
                //         method: 'POST',
                //         dataType: 'json',
                //         success: function(data) {
                //             $('#sub_cat_id').html('<option value="">Sub Category</option>');
                //             if (data.found) {
                //                 $('#sub_cat_id').append(data.option);
                //             } else
                //                 $('#sub_cat_id').html('<option value="">' + data.msg + '</option>');
                //             <?php if ($row->sub_cat_id > 0): ?>
                //                 $('#sub_cat_id').val(<?= $row->sub_cat_id ?>);
                //             <?php endif ?>
                //         }
                //     });
                // });
                // <?php if ($row->cat_id > 0): ?>
                //     $('#cat_id').trigger('change');
                // <?php endif ?>

                $(document).on('click', '.addNewRowTbl', function() {
                    var clonedRow = $(this).closest('#newTable').find('tr:last-child').clone();
                    clonedRow.find('input').val('').end();
                    clonedRow.find('textarea').val('').end();
                    clonedRow.find('td:last-child').html(`<a href="javascript:void(0)" class="delNewRowTbl" id="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>`);
                    clonedRow.find('img').attr('src', base_url + 'assets/images/no-image.svg');
                    $(this).closest('#newTable').before().append(clonedRow);
                });
                $(document).on('click', '.delNewRowTbl', function() {
                    $(this).closest('tr').remove();
                });

                // $(document).on('click', '#addMoreColor', function() {
                //     $('.pick-a-color').removeClass('pick-a-color');
                //     $(".colorsContainer").append(`
                //         <div class="row margin-bottom-10">
                //            <div class="col-sm-2">
                //                 <input type="color" value="#ffffff" name="colors[]" class="form-control color">
                //             </div>
                //             <div class="col-sm-2">
                //                 <input type="text" value="White" name="colors[]" class="form-control">
                //             </div>
                //             <div class="col-sm-2">
                //                 <button type="button" class="btn btn-sm btn-danger removeColor"><i class="fa fa-times"></i></button>
                //             </div>
                //         </div>`);
                //     initPickColor();
                // });

                // $(document).on('click', '.removeColor', function() {
                //     $(this).closest('.row').remove();
                // });

                $(document).on('click', '.deletePic', function() {
                    let image = $(this).data('image');
                    $('form').append('<input type="hidden" name="dlt_images[]" value="' + image + '">');
                    $(this).parents('.img-blk').remove();
                });
            });
        }(jQuery));
    </script>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Products')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-basket"></i> Manage <strong>Products</strong></h2>
        </div>

        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/products/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>

    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="80" class="text-center">Sr#</th>
                <th width="10%">Photo</th>
                <th>Name</th>
                <th width="100">Price</th>
                <th width="100">Old Price</th>
                <th width="100" class="text-center">Stock</th>
                <!-- <th width="100" class="text-center">Availability</th> -->
                <th width="100" class="text-center">Status</th>
                <th width="120" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): ?>
                <?php foreach ($rows as $key => $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= $key + 1; ?></td>
                        <td><img src="<?= get_image_src($row->image, 50); ?>" height="50"></td>
                        <td><?= $row->title ?></td>
                        <td><?= format_amount($row->price); ?></td>
                        <td><?= format_amount($row->old_price); ?></td>
                        <td class="text-center"><?= $row->stock; ?></td>
                        <!-- <td class="text-center"><?= verified_status($row->availability); ?></td> -->
                        <td class="text-center"><?= getStatus($row->status); ?></td>
                        <td class="text-center">
                            <a href="<?= site_url(ADMIN . '/products/manage/' . $row->id); ?>">Edit</a> | 
                            <a href="<?= site_url(ADMIN . '/products/delete/' . $row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                        <!-- 
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN . '/products/manage/' . $row->id); ?>">Edit</a></li>
                                    <?php if (access(10)): ?>
                                        <li><a href="<?= site_url(ADMIN . '/products/delete/' . $row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                    <?php endif ?>
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
