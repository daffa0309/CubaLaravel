<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="<?php echo e(route('/')); ?>"><img class="img-fluid for-light" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>"
                    alt=""><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>"
                    alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="<?php echo e(route('/')); ?>"><img class="img-fluid"
                    src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="<?php echo e(route('/')); ?>"><img class="img-fluid"
                                src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <?php if(Auth::user()->level == 'admin'): ?>
                        <li class="sidebar-list">

                            <a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/forms'? 'active': ''); ?>"
                                href="#">
                        <li><a class="lan-4 <?php echo e(Route::currentRouteName() == 'index' ? 'active' : ''); ?>"
                                href="<?php echo e(route('index')); ?>"><?php echo e(trans('lang.Dashboard')); ?></a></li>
                        </a>
                        </li>
                    <?php else: ?>
                        <li class="sidebar-list">


                        </li>
                    <?php endif; ?>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/forms'? 'active': ''); ?>"
                            href="#">
                            <i data-feather="file-text"></i><span><?php echo e(trans('lang.Forms')); ?></span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/forms'? 'down': 'right'); ?>"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display: <?php echo e(request()->route()->getPrefix() == '/forms'? 'block;': 'none;'); ?>">
                            <li>
                            <li><a href="<?php echo e(route('input-data')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'input-data' ? 'active' : ''); ?>">Input Data
                                </a></li>
                    </li>

                </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/tables'? 'active': ''); ?>"
                        href="#"><i data-feather="server"></i><span><?php echo e(trans('lang.Tables')); ?></span>
                        <div class="according-menu"><i
                                class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/tables'? 'down': 'right'); ?>"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: <?php echo e(request()->route()->getPrefix() == '/tables'? 'block;': 'none;'); ?>">
                        <li>
                            <a class="submenu-title  <?php echo e(in_array(Route::currentRouteName(), ['datatable-basic-init', 'datatable-advance', 'datatable-styling', 'datatable-ajax', 'datatable-server-side', 'datatable-plugin', 'datatable-api']) ? 'active' : ''); ?>"
                                href="#">Data
                                <div class="according-menu"><i
                                        class="fa fa-angle-<?php echo e(in_array(Route::currentRouteName(), ['datatable-basic-init', 'datatable-advance', 'datatable-styling', 'datatable-ajax', 'datatable-server-side', 'datatable-plugin', 'datatable-api', 'datatable-data-source']) ? 'down' : 'right'); ?>"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: <?php echo e(in_array(Route::currentRouteName(), ['datatable-basic-init', 'datatable-advance', 'datatable-styling', 'datatable-ajax', 'datatable-server-side', 'datatable-plugin', 'datatable-api', 'datatable-data-source']) ? 'block' : 'none;'); ?>;">
                                <li><a href="<?php echo e(route('datatable-basic-init')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-basic-init' ? 'active' : ''); ?>">Manage
                                        Data</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6><?php echo e(trans('lang.Components')); ?></h6>
                        <p><?php echo e(trans('lang.UI Components & Elements')); ?></p>
                    </div>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/ui-kits'? 'active': ''); ?>"
                        href="#"><i data-feather="box"></i><span><?php echo e(trans('lang.Ui Kits')); ?></span>
                        <div class="according-menu"><i
                                class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/ui-kits'? 'down': 'right'); ?>"></i>
                        </div>
                    </a>
                    
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/bonus-ui'? 'active': ''); ?>"
                        href="#"><i data-feather="folder-plus"></i><span><?php echo e(trans('lang.Bonus Ui')); ?></span>
                        <div class="according-menu"><i
                                class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/ui-kits'? 'down': 'right'); ?>"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: <?php echo e(request()->route()->getPrefix() == '/bonus-ui'? 'block;': 'none;'); ?>">
                        <li><a href="<?php echo e(route('scrollable')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'scrollable' ? 'active' : ''); ?>">Scrollable</a>
                        </li>
                        <li><a href="<?php echo e(route('tree')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'tree' ? 'active' : ''); ?>">Tree view</a></li>
                        <li><a href="<?php echo e(route('bootstrap-notify')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'bootstrap-notify' ? 'active' : ''); ?>">Bootstrap
                                Notify</a></li>
                        <li><a href="<?php echo e(route('rating')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'rating' ? 'active' : ''); ?>">Rating</a></li>
                        <li><a href="<?php echo e(route('dropzone')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'dropzone' ? 'active' : ''); ?>">dropzone</a></li>
                        <li><a href="<?php echo e(route('tour')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'tour' ? 'active' : ''); ?>">Tour</a></li>
                        <li><a href="<?php echo e(route('sweet-alert2')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'sweet-alert2' ? 'active' : ''); ?>">SweetAlert2</a>
                        </li>
                        <li><a href="<?php echo e(route('modal-animated')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'modal-animated' ? 'active' : ''); ?>">Animated
                                Modal</a></li>
                        <li><a href="<?php echo e(route('owl-carousel')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'owl-carousel' ? 'active' : ''); ?>">Owl
                                Carousel</a></li>
                        <li><a href="<?php echo e(route('ribbons')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'ribbons' ? 'active' : ''); ?>">Ribbons</a></li>
                        <li><a href="<?php echo e(route('pagination')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'pagination' ? 'active' : ''); ?>">Pagination</a>
                        </li>
                        <li><a href="<?php echo e(route('breadcrumb')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'breadcrumb' ? 'active' : ''); ?>">Breadcrumb</a>
                        </li>
                        <li><a href="<?php echo e(route('range-slider')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'range-slider' ? 'active' : ''); ?>">Range
                                Slider</a></li>
                        <li><a href="<?php echo e(route('image-cropper')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'image-cropper' ? 'active' : ''); ?>">Image
                                cropper</a></li>
                        <li><a href="<?php echo e(route('sticky')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'sticky' ? 'active' : ''); ?>">Sticky</a></li>
                        <li><a href="<?php echo e(route('basic-card')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'basic-card' ? 'active' : ''); ?>">Basic Card</a>
                        </li>
                        <li><a href="<?php echo e(route('creative-card')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'creative-card' ? 'active' : ''); ?>">Creative
                                Card</a></li>
                        <li><a href="<?php echo e(route('tabbed-card')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'tabbed-card' ? 'active' : ''); ?>">Tabbed
                                Card</a>
                        </li>
                        <li><a href="<?php echo e(route('dragable-card')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'dragable-card' ? 'active' : ''); ?>">Draggable
                                Card</a></li>
                        <li>
                            <a class="submenu-title <?php echo e(in_array(Route::currentRouteName(), ['timeline-v-1', 'timeline-v-2', 'timeline-small']) ? 'active' : ''); ?>"
                                href="#">Timeline
                                <div class="according-menu"><i
                                        class="fa fa-angle-<?php echo e(in_array(Route::currentRouteName(), ['timeline-v-1', 'timeline-v-2', 'timeline-small']) ? 'down' : 'right'); ?>"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: <?php echo e(in_array(Route::currentRouteName(), ['timeline-v-1', 'timeline-v-2']) ? 'block' : 'none;'); ?>;">
                                <li><a href="<?php echo e(route('timeline-v-1')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'timeline-v-1' ? 'active' : ''); ?>">Timeline
                                        1</a></li>
                                <li><a href="<?php echo e(route('timeline-v-2')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'timeline-v-2' ? 'active' : ''); ?>">Timeline
                                        2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/builders'? 'active': ''); ?>"
                        href="#"><i data-feather="edit-3"></i><span><?php echo e(trans('lang.Builders')); ?></span>
                        <div class="according-menu"><i
                                class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/builders'? 'down': 'right'); ?>"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: <?php echo e(request()->route()->getPrefix() == '/builders'? 'block;': 'none;'); ?>">
                        <li><a href="<?php echo e(route('form-builder-1')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'form-builder-1' ? 'active' : ''); ?>"> Form
                                Builder 1</a></li>
                        <li><a href="<?php echo e(route('form-builder-2')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'form-builder-2' ? 'active' : ''); ?>"> Form
                                Builder 2</a></li>
                        <li><a href="<?php echo e(route('pagebuild')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'pagebuild' ? 'active' : ''); ?>">Page
                                Builder</a>
                        </li>
                        <li><a href="<?php echo e(route('button-builder')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'button-builder' ? 'active' : ''); ?>">Button
                                Builder</a></li>
                    </ul>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6><?php echo e(trans('lang.Pages')); ?></h6>
                        <p><?php echo e(trans('lang.All neccesory pages added')); ?></p>
                    </div>
                </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<?php /**PATH C:\Users\df\Documents\CubaLaravel\resources\views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>