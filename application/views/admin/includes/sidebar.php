<div class="sidebar-menu fixed">
    <div class="sidebar-menu-inner ps-container ps-active-y">
        <header class="logo-env">
            <!-- logo -->
            <div class="logo">
                <a href="<?=site_url(ADMIN.'/dashboard')?>">
                    <img src="<?= SITE_IMAGES.'/images/'.$adminsite_setting->site_logo ?>" width="120" alt="">
                </a>
            </div>
            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>
            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>
        </header>
        <ul id="main-menu" class="main-menu">
            <li class="opened <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/dashboard') ?>">
                    <i class="entypo-gauge"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <?php if(access(1)):?>
                <li class="opened <?= ($this->uri->segment(2) == 'members') ? 'active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/members') ?>">
                        <i class="entypo-user"></i>
                        <span class="title">Members </span>
                    </a>
                </li>
            <?php endif?>
            <?php if(access(2)):?>
                <li class="<?= ($this->uri->segment(2) == 'products') ? ' opened  active' : '' ?>">
                    <a href="javascript:void(0)">
                        <i class="fa fa-th"></i>
                        <span class="title">Products Management</span>
                    </a>
                    <ul>
                        <li class="<?= in_array($this->uri->segment(3), array('manage')) ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/products') ?>">
                                <i class="entypo-basket"></i>
                                <span class="title">Products</span>
                            </a>
                        </li>
                        <li class="<?= ($this->uri->segment(3) == 'products/categories') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/products/categories') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Categories</span>
                            </a>
                        </li>
                        <!-- <li class="<?= ($this->uri->segment(3) == 'products/brands') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/products/brands') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Brands</span>
                            </a>
                        </li> -->
                        <li class="<?= ($this->uri->segment(3) == 'products/colors') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/products/colors') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Colors</span>
                            </a>
                        </li>
                        <li class="<?= ($this->uri->segment(3) == 'products/shapes') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/products/shapes') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Shapes</span>
                            </a>
                        </li>
                        <!-- <li class="<?= ($this->uri->segment(3) == 'products/materials') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/products/materials') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Materials</span>
                            </a>
                        </li> -->
                        <li class="<?= ($this->uri->segment(3) == 'products/sizes') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/products/sizes') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Sizes</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif?>
            <?php if(access(3)):?>
                <li class="opened<?= $this->uri->segment('2') == 'glasses' ? ' active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/glasses') ?>">
                        <i class="fa fa-th-list"></i>
                        <span class="title">Glasses</span>
                    </a>
                </li>
            <?php endif?>
            <?php if(access(4)):?>
                <li class="opened<?= $this->uri->segment('2') == 'orders' ? ' active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/orders') ?>">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="title">Orders</span>
                    </a>
                </li>
            <?php endif?>
            <!-- <?php if(access(5)):?>
                <li class="opened<?= $this->uri->segment('2') == 'abundant-cart' ? ' active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/abundant-cart') ?>">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="title">Aabundant Cart</span>
                    </a>
                </li>
            <?php endif?> -->
            <?php if(access(5)):?>
                <li class="opened<?= ($this->uri->segment(2) == 'promocodes') ? ' active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/promocodes') ?>">
                        <i class="fa fa-ticket"></i>
                        <span class="title">Promo Codes</span>
                    </a>
                </li>
            <?php endif?>
            <?php if(access(19)):?>
                <!-- <li class=" <?= in_array($this->uri->segment(2), array('cities', 'states')) ? ' opened  active' : '' ?>">
                    <a href="javascript:void(0)">
                        <i class="fa fa-th"></i>
                        <span class="title">City/State Management</span>
                    </a>
                    <ul>
                        <li class=" <?= in_array($this->uri->segment(3), array('cities', 'manage')) ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/cities') ?>">
                                <i class="fa fa-th-large"></i>
                                <span class="title">Cites</span>
                            </a>
                        </li>
                        <li class=" <?= in_array($this->uri->segment(3), array('states', 'manage')) ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/states') ?>">
                                <i class="fa fa-th-large"></i>
                                <span class="title">States</span>
                            </a>
                        </li>
                    </ul>
                </li> -->
            <?php endif?>
            
            <?php if(access(6)):?>
                <li class="<?= ($this->uri->segment(2) == 'blog') ? ' opened  active' : '' ?>">
                    <a href="javascript:void(0)">
                        <i class="fa fa-th"></i>
                        <span class="title">Blog Management</span>
                    </a>
                    <ul>
                        <li class="<?= in_array($this->uri->segment(3), array('manage')) ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/blog') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Blog Articles</span>
                            </a>
                        </li>
                        <li class="<?= ($this->uri->segment(3) == 'blog/categories') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/blog/categories') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Categories</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif?>
            <?php if(access(7)):?>
                <li class="opened <?= ($this->uri->segment(2) == 'educational_videos') ? 'active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/educational_videos') ?>">
                        <i class="fa fa-th-list"></i>
                        <span class="title">Educational Videos</span>
                    </a>
                </li>
            <?php endif?>
            <?php if(access(8)):?>
                <li class="opened <?= ($this->uri->segment(2) == 'faq') ? 'active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/faq') ?>">
                        <i class="fa fa-th-list"></i>
                        <span class="title">FAQ's</span>
                    </a>
                </li>
            <?php endif?>
            <?php if(access(9)):?>
                <li class="opened <?= ($this->uri->segment(2) == 'newsletter') ? 'active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/newsletter') ?>">
                        <i class="fa fa-file"></i>
                        <span class="title">Newsletter</span>
                    </a>
                </li>
            <?php endif?>
            <?php if(access(10)):?>
                <li class="opened<?= ($this->uri->segment(2) == 'countries') ? ' active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/countries') ?>">
                        <i class="fa fa-th-list"></i>
                        <span class="title">Countries Management</span>
                    </a>
                </li>
            <?php endif?>
            <?php if(access(11)):?>
                <li class=" <?= ($this->uri->segment(2) == 'sitecontent' || $this->uri->segment(2) == 'preferences') ? ' opened  active' : '' ?>">
                    <a href="javascript:void(0)">
                        <i class="fa fa-pagelines  "></i>
                        <span class="title">Manage Pages</span>
                    </a>
                    <ul>
                        <li class=" <?= ($this->uri->segment(3) == 'login') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/login') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Login</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'signup') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/signup') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Sign up</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'forgot') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/forgot') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Forgot Password</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'reset') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/reset') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Reset Password</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'phone-verify') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/phone-verify') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Phone Verification</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'email-verify') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/email-verify') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Email Verification</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'home') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/home') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Home</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'about') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/about') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">About</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'contact') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/contact') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Contact Us</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'choose_us') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/choose_us') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Why Choose us</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'faq') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/faq') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">FAQ's</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'blog') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/blog') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Blog Articles</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'educational_videos') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/educational_videos') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Educational Videos</span>
                            </a>
                        </li>
                        
                        <li class=" <?= ($this->uri->segment(3) == 'shipping_handling') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/shipping_handling') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Shipping Handling</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'cookies') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/cookies') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Cookies</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'return_policy') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/return_policy') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Return Policy</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'customer_service') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/customer_service') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Customer Service</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'disclaimer') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/disclaimer') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Disclaimer</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'payment_policy') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/payment_policy') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Payment Policy</span>
                            </a>
                        </li>

                        <li class=" <?= ($this->uri->segment(3) == 'privacy_policy') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/privacy_policy') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Privacy Policy</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'terms_conditions') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/terms_conditions') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Terms & Conditions</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'design_guide') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/sitecontent/design_guide') ?>">
                                <i class="entypo-doc-text  "></i>
                                <span class="title">Design Guide</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif?>
            <?php if(is_admin()):?>
                <!-- <li class="<?= ($this->uri->segment(2) == 'scraping') ? ' opened  active' : '' ?>">
                    <a href="javascript:void(0)">
                        <i class="fa fa-th"></i>
                        <span class="title">Scraping Management</span>
                    </a>
                    <ul>
                        <li class="<?= in_array($this->uri->segment(3), array('manage')) ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/scraping') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Stores</span>
                            </a>
                        </li>
                        <li class="<?= ($this->uri->segment(3) == 'products') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/scraping/products') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Products</span>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <li class="opened <?= ($this->uri->segment(2) == 'texts') ? 'active' : '' ?>">
                    <a href="<?= site_url(ADMIN) ?>/texts">
                        <i class="fa fa-cog"></i>
                        <span class="title">Notifications Management</span>
                    </a>
                </li>
                <li class="opened <?= ($this->uri->segment(2) == 'settings' && $this->uri->segment(3) == '') ? 'active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/settings') ?>">
                        <i class="fa fa-cogs"></i>
                        <span class="title">Site Settings</span>
                    </a>
                </li>
                <li class="opened <?= ($this->uri->segment(2) == 'sub-admin') ? 'active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/sub-admin') ?>">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <span class="title">Sub Admin</span>
                    </a>
                </li>
            <?php endif?>
            <li class="opened">
                <a href="<?= site_url(ADMIN.'/settings/change') ?>">
                    <i class="fa fa-lock"></i>
                    <span class="title">Change Password</span>
                </a>
            </li>
        </ul>
    </div>
</div>