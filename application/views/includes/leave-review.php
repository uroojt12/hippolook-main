<div class="popup" data-popup="leave-review">
    <div class="tableDv">
        <div class="tableCell">
            <div class="contain">
                <div class="_inner">
                    <div class="crosBtn"></div>
                    <h3>Leave Review</h3>
                    <form action="<?= site_url('leave-review') ?>" method="post" autocomplete="off" class="frmAjax">
                        <input type="hidden" name="store" value="">
                        <div class="txtGrp">
                            <div class="rateYo" data-rateyo-star-width="20px" data-rateyo-read-only="false" id="rating"></div>
                            <input type="hidden" name="rating" value="0">
                        </div>
                        <div class="txtGrp">
                            <label for="image" class="move">Upload Photo</label>

                            <button type="button" class="txtBox uploadImg" data-upload="dp_image" data-text="Choose your photo"></button>
                            <input type="file" name="image" id="image" class="uploadFile1" style="display:none;" data-upload="dp_image">
                        </div>
                        <div class="txtGrp">
                            <label for="cmnt">Description</label>
                            <textarea name="cmnt" id="cmnt" class="txtBox" placeholder=""></textarea>
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn">Submit <i class="spinner hidden"></i></button>
                        </div>
                        <div class="alertMsg" style="display: none;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>