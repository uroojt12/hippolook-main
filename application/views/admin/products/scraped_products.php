<?php if ($this->uri->segment(3) == 'manage-product'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => $page_title.' Scraped Product')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-basket"></i> <?= $page_title?> <strong>Scraped Product</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/scraping/products'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="clearfix"></div>
        <div class="panel-body">
            <form action=""  role="form" class="form-horizontal form-groups-bordered frmAjax" method="post" enctype="multipart/form-data">
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
                        <div class="col-md-3">
                            <label class="control-label" for="brand"> Brand <span class="symbol required">*</span></label>
                            <select name="brand" id="brand" class="form-control" required>
                                <option value="" selected="" disabled=""> - Select - </option>
                                <?php foreach ($brands as $key => $brand_row): ?>
                                    <option value="<?= $brand_row->title?>"<?= $brand_row->title == $row->brand ? ' selected' : ''?>><?= $brand_row->title?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" for="cat_id"> Category <span class="symbol required">*</span></label>
                            <select name="cat_id" id="cat_id" class="catSub form-control">
                                <option value=""> - Select - </option>
                                <?php foreach ($cats as $key => $cat_row): ?>
                                    <option value="<?= $cat_row->id?>"<?= $cat_row->id == $row->cat_id ? ' selected' : ''?>><?= $cat_row->name?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" for="sub_cat_id"> Sub-Category <span class="symbol required">*</span></label>
                            <select name="sub_cat_id" id="sub_cat_id" class="catSub form-control">
                                <option value=""> - Select - </option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" for="material"> Material <span class="symbol required">*</span></label>
                            <select name="material" id="material" class="catSub form-control">
                                <option value=""> - Select - </option>
                                <?php foreach ($materials as $key => $material_row): ?>
                                    <option value="<?= $material_row->title?>"<?= $material_row->title == $row->material ? ' selected' : ''?>><?= $material_row->title?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="default_price" class="control-label"> Deault Price <span class="symbol required">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">€</span>
                                <input type="number" min="0" step="any" name="default_price" id="default_price" value="<?php if (isset($row->default_price)) echo $row->default_price; ?>" class="form-control" placeholder="Default Price" required/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="pcondition" class="control-label"> Condition <span class="symbol required">*</span></label>
                            <input type="text" name="pcondition" id="pcondition" value="<?php if (isset($row->pcondition)) echo $row->pcondition; ?>" class="form-control" required autofocus>
                            <!-- <select id="pcondition" name="pcondition" class="form-control">
                                <option value="New"<?= (isset($row->pcondition) && "New" == $row->pcondition ? ' selected' : '')?>>New</option>
                                <option value="Used"<?= (isset($row->pcondition) && "Used" == $row->pcondition ? ' selected' : '')?>>Used</option>
                            </select> -->
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="control-label"> Status <span class="symbol required">*</span></label>
                            <select id="status" name="status" class="form-control">
                                <option value="1"<?= (isset($row->status) && 1 == $row->status ? ' selected' : '')?>>Active</option>
                                <option value="0"<?= (isset($row->status) && 0 == $row->status ? ' selected' : '')?>>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="availability" class="control-label"> Availability <span class="symbol required">*</span></label>
                            <select id="availability" name="availability" class="form-control">
                                <option value="1"<?= (isset($row->availability) && 1 == $row->availability ? ' selected' : '')?>>Yes</option>
                                <option value="0"<?= (isset($row->availability) && 0 == $row->availability ? ' selected' : '')?>>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                            <textarea name="detail" id="detail" class="form-control ckeditor" required><?php if (isset($row->detail)) echo $row->detail; ?></textarea>
                        </div>
                    </div>
                </div>


                <h3>Images </h3>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Main Thumbnail <span class="symbol required">*</span></label><br>
                            <?php if($row):?>
                                <img src = "<?= get_site_image_src('scraped', $row->image)?>" height = "80"><br>
                            <?php endif?>
                            <input type="file" name="image" id="image" class = "form-control file2 inline btn btn-primary" data-label = "<i class='fa fa-upload'></i> Browse" accept="image/*" />
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
                                if (count($row->images) > 0) :
                                    foreach ($row->images as $img) :
                                        ?>
                                        <div class="col-md-3 text-center margin-bottom-10 img-blk dy">
                                            <img src="<?= get_site_image_src('scraped', $img->image)?>" style="height:80px; margin-bottom: 10px;"><br>
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


                <h3>Size </h3>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 margin-bottom-10">
                            <table class="table table-bordered newTable" id="newTable">
                                <tr style="background-color: #eee">
                                    <th>Size</th>
                                    <th>Price</th>
                                    <!-- <th>Quantity</th> -->
                                    <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                                </tr>
                                <?php if (count($row->sizes)): ?>
                                    <?php foreach ($row->sizes as $key => $s): ?>
                                        <tr>
                                            <td>
                                                <input type="text" name="size[]" value="<?= $s->size ?>" class="form-control" placeholder="Title"/>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon">€</span>
                                                    <input type="number" min="0" step="any" name="price[]" value="<?= $s->price ?>" class="form-control"/>
                                                </div>
                                            </td>
                                            <!-- <td>
                                                <input type="text" name="qty[]" value="<?= $s->qty ?>" class="form-control" placeholder="Title"/>
                                            </td> -->
                                            <td class="text-center">
                                                <?php if ($key != 0): ?>
                                                    <a href="javascript:void(0)" class="delNewRowTbl" id="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                <?php endif?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else:?>
                                    <tr>
                                        <td>
                                            <input type="size" name="size[]" value="" class="form-control" placeholder="title"/>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="number" min="0" step="any" name="price[]" value="" class="form-control" placeholder="Price"/>
                                            </div>
                                        </td>
                                        <!-- <td>
                                            <input type="number" name="qty[]" value="" class="form-control" placeholder="Quantity"/>
                                        </td> -->
                                        <td class="text-center">
                                        </td>
                                    </tr>
                                <?php endif ?>
                            </table>
                        </div>
                    </div>
                </div>


                <h3>Colors</h3>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 margin-bottom-10 colorsContainer">
                            <?php
                            if (count($row->colors) > 0) :
                                foreach ($row->colors as $key => $color) :
                                    ?>
                                    <div class="row margin-bottom-10">
                                        <!-- <div class="col-sm-2">
                                            <input type="color" value="<?= $color->color; ?>" name="colors[]" class="form-control color">
                                        </div> -->
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
                                    <!-- <div class="col-sm-2">
                                        <input type="color" value="#ffffff" name="colors[]" class="form-control color">
                                    </div> -->
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
                </div>

                <div class="row" style="margin: 10px 0 10px;">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Published <i class="fa fa-spinner fa-pulse fa-1x fa-fw hidden"></i></button>
                    </div>
                </div>
                <div class="alertMsg"></div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    
    <!-- Colors -->
    <script type="text/javascript" src="<?= base_url('assets/js/color.js')?>"></script>

    <script>
        (function($){
            $(function() {

                /*$(document).on('change', '.color', function (e) {
                    let n_match = ntc.name(this.value);
                    console.log(n_match)
                    $(this).parents('.row:first').find("input[name='color_names[]']").val(n_match[1]);
                });*/
                

                $('#cat_id').change(function(){
                    let cat = this.value;
                    $('#sub_cat_id').html('<option value="">Please Wait</option>');
                    $.ajax({
                        url: base_url+'ajax/get-categories',
                        data : {'cat': cat},
                        method: 'POST',
                        dataType: 'json',
                        success: function (data) {
                            $('#sub_cat_id').html('<option value="">Sub Category</option>');
                            if(data.found){
                                $('#sub_cat_id').append(data.option);
                            }
                            else
                                $('#sub_cat_id').html('<option value="">'+data.msg+'</option>');
                            <?php if($row->sub_cat_id > 0):?>
                                $('#sub_cat_id').val(<?=$row->sub_cat_id?>);
                            <?php endif?>
                        }
                    });
                });
                <?php if($row->cat_id>0):?>
                    $('#cat_id').trigger('change');
                <?php endif?>

                $(document).on('click', '.addNewRowTbl', function () {
                    var clonedRow = $(this).closest('#newTable').find('tr:last-child').clone();
                    clonedRow.find('input').val('').end();
                    clonedRow.find('textarea').val('').end();
                    clonedRow.find('td:last-child').html(`<a href="javascript:void(0)" class="delNewRowTbl" id="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>`);
                    clonedRow.find('img').attr('src', base_url+'assets/images/no-image.svg');
                    $(this).closest('#newTable').before().append(clonedRow);
                });
                $(document).on('click', '.delNewRowTbl', function () {
                    $(this).closest('tr').remove();
                });

                $(document).on('click', '#addMoreColor', function () {
                    $('.pick-a-color').removeClass('pick-a-color');
                    $(".colorsContainer").append(`
                        <div class="row margin-bottom-10">
                            <!--<div class="col-sm-2">
                                <input type="color" value="#ffffff" name="colors[]" class="form-control color">
                            </div>-->
                            <div class="col-sm-2">
                                <input type="text" value="White" name="colors[]" class="form-control">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-sm btn-danger removeColor"><i class="fa fa-times"></i></button>
                            </div>
                        </div>`
                    );
                    initPickColor();
                });

                $(document).on('click', '.removeColor', function () {
                    $(this).closest('.row').remove();
                });

                $(document).on('click', '.deletePic', function() {
                    let image = $(this).data('image');
                    $('form').append('<input type="hidden" name="dlt_images[]" value="'+image+'">');
                    $(this).parents('.img-blk').remove();
                });
            });
        }(jQuery));
    </script>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Scraped Products')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-basket"></i> Manage <strong>Scraped Products</strong></h2>
        </div>
        
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/scraping/manage-product'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
        
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="80" class="text-center">Sr#</th>
                <th width="10%">Photo</th>
                <th>Name</th>
                <th width="12%">Default Price</th>
                <th width="100" class="text-center">Availability</th>
                <th width="100" class="text-center">Status</th>
                <th width="120" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): ?>
                <?php foreach ($rows as $key => $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= $key+1; ?></td>
                        <td><img src = "<?= get_site_image_src('scraped', $row->image); ?>" height = "60"></td>
                        <td><?= $row->title ?></td>
                        <td><?= format_amount($row->default_price); ?></td>
                        <td class="text-center"><?= verified_status($row->availability); ?></td>
                        <td class="text-center"><?= getStatus($row->status); ?></td>
                        <td class="text-center">
                            <a href="<?= site_url(ADMIN.'/scraping/manage-product/'.$row->id); ?>">Edit</a><!--  |
                            <a href="<?= site_url(ADMIN.'/scraping/delete-product/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a> -->
                        </td>
                        <!-- 
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/scraping/manage-product/'.$row->id); ?>">Edit</a></li>
                                    <?php if(access(10)):?>
                                        <li><a href="<?= site_url(ADMIN.'/scraping/delete-product/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                    <?php endif?>
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