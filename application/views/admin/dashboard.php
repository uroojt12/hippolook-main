
<div class="row">
    <?php if(access(1)):?>
        <div class="col-md-3 col-sm-4 col-xs-12">
            <a href="<?= site_url(ADMIN.'/members') ?>">
                <div class="tile-stats tile-white">
                    <div class="icon"><i class="entypo-user"></i></div>
                    <div class="num" data-start="0" data-end="<?= $total_members?>" data-postfix="" data-duration="1500" data-delay="0"><?= $total_members?></div>
                    <h3>Total Members </h3>
                    <p>Total Members in our website </p>
                </div>
            </a>
        </div>
    <?php endif?>
    <?php if(access(2)):?>
        <div class="col-md-3 col-sm-4 col-xs-12">
            <a href="<?= site_url(ADMIN.'/products') ?>">
                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-basket"></i></div>
                    <div class="num" data-start="0" data-end="<?= $total_products?>" data-postfix="" data-duration="1500" data-delay="0"><?= $total_products?></div>
                    <h3>Total Products </h3>
                    <p>Total Products in our website </p>
                </div>
            </a>
        </div>
    <?php endif?>
    <?php if(is_admin()):?>
        <div class="col-md-3 col-sm-4 col-xs-12">
            <a href="<?= site_url(ADMIN.'/settings') ?>">
                <div class="tile-stats tile-black">
                    <div class="icon"><i class="fa fa-cogs"></i></div>
                    <div class="num" data-start="0" data-end="0" data-postfix="" data-duration="1500" data-delay="1800"> Settings</div>

                    <h3>Change Settings</h3>
                    <p>on our site right now.</p>
                </div>
            </a>		
        </div>
    <?php endif?>
    <div class="col-md-3 col-sm-4 col-xs-12">
        <a href="<?= site_url(ADMIN.'/settings/change') ?>">
            <div class="tile-stats tile-orange">
                <div class="icon"><i class="fa fa-key"></i></div>
                <div class="num" data-start="0" data-end="0" data-postfix="" data-duration="1500" data-delay="1800"> Password</div>

                <h3>Change Password</h3>
                <p>on our site right now.</p>
            </div>
        </a>        
    </div>
</div>
