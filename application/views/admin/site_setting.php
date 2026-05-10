<?= showMsg(); ?>
<?= getBredcrum(ADMIN, array('#' => 'Site Settings')); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <!-- <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>About Page</strong></h2> -->
        <h2 class="no-margin"><i class="fa fa-cogs"></i> Site <strong>Settings</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="<?= site_url(ADMIN . '/settings/clear-cashe'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-refresh"></i> Clear Cache</a>
    </div>
</div>
<hr>
<div class="row col-md-12">
    <form role="form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
            <h3><i class="fa fa-bars"></i> Default Meta</h3>
            <hr class="hr-short">
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Meta Description <span class="symbol required"></span></label>
                    <textarea rows="5" name="site_meta_desc" class="form-control" required autofocus=""><?php if (isset($adminsite_setting->site_meta_desc)) echo ($adminsite_setting->site_meta_desc); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Meta Keywords <span class="symbol required"></span></label>
                    <textarea rows="5" name="site_meta_keyword" class="form-control" required><?php if (isset($adminsite_setting->site_meta_keyword)) echo ($adminsite_setting->site_meta_keyword); ?></textarea>
                </div>
            </div>
            <!--
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label"> Meta Copyright <span class="symbol required"></span></label>
                        <input type="text" name="site_meta_copyright" value="<?php if (isset($adminsite_setting->site_meta_copyright)) echo htmlentities($adminsite_setting->site_meta_copyright); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label"> Meta Author <span class="symbol required"></span></label>
                        <input type="text" name="site_meta_author" value="<?php if (isset($adminsite_setting->site_meta_author)) echo $adminsite_setting->site_meta_author; ?>" class="form-control" required>
                    </div>
                </div>
            -->
            <h3><i class="fa fa-bars"></i> Social Media</h3>
            <hr class="hr-short">
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Facebook Link</label>
                    <input type="text" name="site_facebook" value="<?php if (isset($adminsite_setting->site_facebook)) echo $adminsite_setting->site_facebook; ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Twitter Link</label>
                    <input type="text" name="site_twitter" value="<?php if (isset($adminsite_setting->site_twitter)) echo $adminsite_setting->site_twitter; ?>" class="form-control">
                </div>
            </div>
            <!--
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label"> Google Link</label>
                    <input type="text" name="site_google" value="<?php if (isset($adminsite_setting->site_google)) echo $adminsite_setting->site_google; ?>"  class="form-control">
                    </div>
                </div>
            -->
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Instagram Link</label>
                    <input type="text" name="site_instagram" value="<?php if (isset($adminsite_setting->site_instagram)) echo $adminsite_setting->site_instagram; ?>" class="form-control">
                </div>
            </div>
            <!--
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label"> LinkedIn Link</label>
                        <input type="text" name="site_linkedin" value="<?php if (isset($adminsite_setting->site_linkedin)) echo $adminsite_setting->site_linkedin; ?>" class="form-control">
                    </div>
                </div>
            -->
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="site_youtube"> Youtube Link</label>
                    <input type="text" name="site_youtube" id="site_youtube" value="<?php if (isset($adminsite_setting->site_youtube)) echo $adminsite_setting->site_youtube; ?>" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3><i class="fa fa-bars"></i> General Detail</h3>
            <hr class="hr-short">
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="site_domain"> Site Domain <span class="symbol required"></span></label>
                    <input type="text" name="site_domain" id="site_domain" value="<?php if (isset($adminsite_setting->site_domain)) echo $adminsite_setting->site_domain; ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="site_name"> Site Name <span class="symbol required"></span></label>
                    <input type="text" name="site_name" id="site_name" value="<?php if (isset($adminsite_setting->site_name)) echo $adminsite_setting->site_name; ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="site_email"> Site Email <span class="symbol required"></span></label>
                    <input type="text" name="site_email" id="site_email" value="<?php if (isset($adminsite_setting->site_email)) echo $adminsite_setting->site_email; ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="site_noreply_email"> Site No-Reply Email <span class="symbol required"></span></label>
                    <input type="text" name="site_noreply_email" id="site_noreply_email" value="<?php if (isset($adminsite_setting->site_noreply_email)) echo $adminsite_setting->site_noreply_email; ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="site_phone"> Site Phone <span class="symbol required"></span></label>
                    <input type="text" name="site_phone" id="site_phone" value="<?php if (isset($adminsite_setting->site_phone)) echo $adminsite_setting->site_phone; ?>"  class="form-control" required>
                </div>
            </div>
            <!--
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="site_fax"> Site Fax</label>
                        <input type="text" name="site_fax" id="site_fax" value="<?php if (isset($adminsite_setting->site_fax)) echo $adminsite_setting->site_fax; ?>"  class="form-control">
                    </div>
                </div>
             -->
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="site_address"> Address <span class="symbol required"></span></label>
                    <textarea rows="5" name="site_address" id="site_address" class="form-control"><?php if (isset($adminsite_setting->site_address)) echo ($adminsite_setting->site_address); ?></textarea>
                </div>
            </div>
            <!--
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="site_copyright"> Copyright Year <span class="symbol required"></span></label>
                    <input type="number" step="1" name="site_copyright" id="site_copyright" value="<?= isset($adminsite_setting->site_copyright) ? $adminsite_setting->site_copyright : date('Y') ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="site_about"> Footer About Company <span class="symbol required"></span></label>
                    <textarea rows="5" name="site_about" id="site_about" class="form-control"><?php if (isset($adminsite_setting->site_about)) echo ($adminsite_setting->site_about); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Site Contact Map <span class="symbol required"></span></label>
                    <textarea rows="6" name="site_contact_map" class="form-control"><?php if (isset($adminsite_setting->site_contact_map)) echo ($adminsite_setting->site_contact_map); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Google Adsense Ad <span class="symbol required"></span></label>
                    <textarea rows="4" name="site_google_ad" class="form-control"><?php if (isset($adminsite_setting->site_google_ad)) echo ($adminsite_setting->site_google_ad); ?></textarea>
                </div>
            </div>
            -->

            <!-- <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="site_tex_percentage"> Tax Percentage <span class="symbol required"></span></label>
                    <input type="number" step="0.1" name="site_tex_percentage" id="site_tex_percentage" value="<?php if (isset($adminsite_setting->site_tex_percentage)) echo $adminsite_setting->site_tex_percentage; ?>"  class="form-control" required>
                </div>
            </div> -->
        </div>
        <div class="clearfix"></div>
        <!-- 
            <div class="col-md-6">
                <h3><i class="fa fa-bars"></i> Euro  Amount</h3>
                <hr class="hr-short">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label">Amount <span class="symbol required"></span></label>
                        <input type="number" name="euro_amount" value="<?php if (isset($adminsite_setting->euro_amount)) echo $adminsite_setting->euro_amount; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label"> Chat Code <span class="symbol required"></span></label>
                        <textarea rows="5" name="site_chat" class="form-control"><?php if (isset($adminsite_setting->site_chat)) echo ($adminsite_setting->site_chat); ?></textarea>
                    </div>
                </div>
            </div>
         -->
         <div class="col-md-12">
            <h3><i class="fa fa-bars"></i> Miscellaneous Link</h3>
            <hr class="hr-short">
            <div class="form-group">
                <div class="col-md-6">
                    <label class="control-label" for="site_free_shipping"> Free Shipping Above</label>
                    <div class="input-group">
                        <span class="input-group-addon">US $</span>
                        <input type="number" min="0" step="any" name="site_free_shipping" id="site_free_shipping" value="<?php if (isset($adminsite_setting->site_free_shipping)) echo $adminsite_setting->site_free_shipping; ?>" class="form-control" placeholder="Price" required/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="site_off_heading"> Gift Section Heading</label>
                    <input type="text" name="site_off_heading" id="site_off_heading" value="<?php if (isset($adminsite_setting->site_off_heading)) echo $adminsite_setting->site_off_heading; ?>" class="form-control">
                </div>
                <div class="col-md-12">

                    <label class="control-label" for="site_off_detail"> Gift Section Detail</label>
                    <textarea rows="4" name="site_off_detail" id="site_off_detail" class="form-control"><?php if (isset($adminsite_setting->site_off_detail)) echo ($adminsite_setting->site_off_detail); ?></textarea>
                </div>
                <!-- <div class="col-md-6">
                    <label class="control-label" for="site_covid19_heading"> Covid19 Section Heading</label>
                    <input type="text" name="site_covid19_heading" id="site_covid19_heading" value="<?php if (isset($adminsite_setting->site_covid19_heading)) echo $adminsite_setting->site_covid19_heading; ?>" class="form-control">

                    <label class="control-label" for="site_covid19_detail"> Covid19 Section Detail</label>
                    <textarea rows="4" name="site_covid19_detail" id="site_covid19_detail" class="form-control"><?php if (isset($adminsite_setting->site_covid19_detail)) echo ($adminsite_setting->site_covid19_detail); ?></textarea>
                </div> -->
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="site_scripts"> Scripts <span class="symbol required"></span></label>
                    <textarea rows="8" name="site_scripts" id="site_scripts" class="form-control"><?php if (isset($adminsite_setting->site_scripts)) echo ($adminsite_setting->site_scripts); ?></textarea>
                </div>
            </div>
        </div>

        
        <div class="col-md-12">
            <hr class="hr-short">
            <div class="form-group">
                <div class="col-md-4">
                    <label class="control-label" for="site_paypal_sandox">Paypal Sandbox  <span class="symbol required">*</span></label>
                    <select name="site_paypal_sandox" id="site_paypal_sandox" class="form-control" required>
                        <option value="0" <?= (isset($adminsite_setting->site_paypal_sandox) && 0 == $adminsite_setting->site_paypal_sandox)?' selected':''?>>No</option>
                        <option value="1" <?= (isset($adminsite_setting->site_paypal_sandox) && 1 == $adminsite_setting->site_paypal_sandox)?' selected':''?>>Yes</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="site_sandbox_paypal"> Sandbox Paypal Email  <span class="symbol required">*</span></label>
                    <input type="text" name="site_sandbox_paypal" value="<?php if (isset($adminsite_setting->site_sandbox_paypal)) echo $adminsite_setting->site_sandbox_paypal; ?>"  class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="site_live_paypal"> Live Paypal Email  <span class="symbol required">*</span></label>
                    <input type="text" name="site_live_paypal" value="<?php if (isset($adminsite_setting->site_live_paypal)) echo $adminsite_setting->site_live_paypal; ?>"  class="form-control" required>
                </div>
            </div>
        </div>
        

        <div class="col-md-12">
            <hr class="hr-short">
            <div class="form-group">
                <div class="col-md-4">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Logo Image
                            </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                    <img src="<?= get_site_image_src("images/", $adminsite_setting->site_logo)?>" alt="--">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="logo_image" accept="image/*" <?php if(empty($adminsite_setting->site_logo)){echo 'required=""';}?>>
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Icon Image
                            </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                    <img src="<?= get_site_image_src("images/", $adminsite_setting->site_icon)?>" alt="--">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="icon_image" accept="image/*" <?php if(empty($adminsite_setting->site_icon)){echo 'required=""';}?>>
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
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
                                    <img src="<?= get_site_image_src("images/", $adminsite_setting->site_thumb)?>" alt="--">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="thumb_image" accept="image/*" <?php if(empty($adminsite_setting->site_thumb)){echo 'required=""';}?>>
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <div class="col-md-12">
                    <input type="submit" class="btn btn-green btn-lg" value="Update Settings">
                </div>
            </div>
        </div>
        <br><br>
    </form>
</div>