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
                                
                                
                            <li><a href="<?php echo e(route('form-validation')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'form-validation' ? 'active' : ''); ?>">Form
                                    Validation</a></li>
                            <li><a href="<?php echo e(route('base-input')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'base-input' ? 'active' : ''); ?>">Base
                                    Inputs</a></li>
                            <li><a href="<?php echo e(route('radio-checkbox-control')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'radio-checkbox-control' ? 'active' : ''); ?>">Checkbox
                                    & Radio</a></li>
                            <li><a href="<?php echo e(route('input-group')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'input-group' ? 'active' : ''); ?>">Input
                                    Groups</a></li>
                            <li><a href="<?php echo e(route('megaoptions')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'megaoptions' ? 'active' : ''); ?>">Mega
                                    Options</a></li>
                    </li>
                    <li>
                        <a class="submenu-title <?php echo e(in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker', 'daterangepicker', 'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'active' : ''); ?>"
                            href="#">Form Widgets
                            <div class="according-menu"><i
                                    class="fa fa-angle-<?php echo e(in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker', 'daterangepicker', 'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'down' : 'right'); ?>"></i>
                            </div>
                        </a>
                        <ul class="nav-sub-childmenu submenu-content"
                            style="display: <?php echo e(in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker', 'daterangepicker', 'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'block' : 'none;'); ?>;">
                            <li><a href="<?php echo e(route('datepicker')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'datepicker' ? 'active' : ''); ?>">Datepicker</a>
                            </li>
                            <li><a href="<?php echo e(route('time-picker')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'time-picker' ? 'active' : ''); ?>">Timepicker</a>
                            </li>
                            <li><a href="<?php echo e(route('datetimepicker')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'datetimepicker' ? 'active' : ''); ?>">Datetimepicker</a>
                            </li>
                            <li><a href="<?php echo e(route('daterangepicker')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'daterangepicker' ? 'active' : ''); ?>">Daterangepicker</a>
                            </li>
                            <li><a href="<?php echo e(route('touchspin')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'touchspin' ? 'active' : ''); ?>">Touchspin</a>
                            </li>
                            <li><a href="<?php echo e(route('select2')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'select2' ? 'active' : ''); ?>">Select2</a></li>
                            <li><a href="<?php echo e(route('switch')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'switch' ? 'active' : ''); ?>">Switch</a></li>
                            <li><a href="<?php echo e(route('typeahead')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'typeahead' ? 'active' : ''); ?>">Typeahead</a>
                            </li>
                            <li><a href="<?php echo e(route('clipboard')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'clipboard' ? 'active' : ''); ?>">Clipboard</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="submenu-title <?php echo e(in_array(Route::currentRouteName(), ['default-form', 'form-wizard', 'form-wizard-two', 'form-wizard-three']) ? 'active' : ''); ?>"
                            href="#">Form Layout
                            <div class="according-menu"><i
                                    class="fa fa-angle-<?php echo e(in_array(Route::currentRouteName(), ['default-form', 'form-wizard', 'form-wizard-two', 'form-wizard-three']) ? 'down' : 'right'); ?>"></i>
                            </div>
                        </a>
                        <ul class="nav-sub-childmenu submenu-content"
                            style="display: <?php echo e(in_array(Route::currentRouteName(), ['default-form', 'form-wizard', 'form-wizard-two', 'form-wizard-three']) ? 'block' : 'none;'); ?>;">
                            <li><a href="<?php echo e(route('default-form')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'default-form' ? 'active' : ''); ?>">Default
                                    Forms</a></li>
                            <li><a href="<?php echo e(route('form-wizard')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'form-wizard' ? 'active' : ''); ?>">Form Wizard
                                    1</a></li>
                            <li><a href="<?php echo e(route('form-wizard-two')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'form-wizard-two' ? 'active' : ''); ?>">Form
                                    Wizard 2</a></li>
                            <li><a href="<?php echo e(route('form-wizard-three')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'form-wizard-three' ? 'active' : ''); ?>">Form
                                    Wizard 3</a></li>
                        </ul>
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
                            <a class="submenu-title  <?php echo e(in_array(Route::currentRouteName(), ['bootstrap-basic-table', 'bootstrap-sizing-table', 'bootstrap-sizing-table', 'bootstrap-border-table', 'bootstrap-styling-table', 'table-components']) ? 'active' : ''); ?>"
                                href="#">Bootstrap Tables
                                <div class="according-menu"><i
                                        class="fa fa-angle-<?php echo e(in_array(Route::currentRouteName(), ['bootstrap-basic-table', 'bootstrap-sizing-table', 'bootstrap-sizing-table', 'bootstrap-border-table', 'bootstrap-styling-table', 'table-components']) ? 'down' : 'right'); ?>"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: <?php echo e(in_array(Route::currentRouteName(), ['bootstrap-basic-table', 'bootstrap-sizing-table', 'bootstrap-sizing-table', 'bootstrap-border-table', 'bootstrap-styling-table', 'table-components']) ? 'block' : 'none;'); ?>;">
                                <li><a href="<?php echo e(route('bootstrap-basic-table')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'bootstrap-basic-table' ? 'active' : ''); ?>">Basic
                                        Tables</a></li>
                                <li><a href="<?php echo e(route('bootstrap-sizing-table')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'bootstrap-sizing-table' ? 'active' : ''); ?>">Sizing
                                        Tables</a></li>
                                <li><a href="<?php echo e(route('bootstrap-border-table')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'bootstrap-border-table' ? 'active' : ''); ?>">Border
                                        Tables</a></li>
                                <li><a href="<?php echo e(route('bootstrap-styling-table')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'bootstrap-styling-table' ? 'active' : ''); ?>">Styling
                                        Tables</a></li>
                                <li><a href="<?php echo e(route('table-components')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'table-components' ? 'active' : ''); ?>">Table
                                        components</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="submenu-title  <?php echo e(in_array(Route::currentRouteName(), ['datatable-basic-init', 'datatable-advance', 'datatable-styling', 'datatable-ajax', 'datatable-server-side', 'datatable-plugin', 'datatable-api']) ? 'active' : ''); ?>"
                                href="#">Data Tables
                                <div class="according-menu"><i
                                        class="fa fa-angle-<?php echo e(in_array(Route::currentRouteName(), ['datatable-basic-init', 'datatable-advance', 'datatable-styling', 'datatable-ajax', 'datatable-server-side', 'datatable-plugin', 'datatable-api', 'datatable-data-source']) ? 'down' : 'right'); ?>"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: <?php echo e(in_array(Route::currentRouteName(), ['datatable-basic-init', 'datatable-advance', 'datatable-styling', 'datatable-ajax', 'datatable-server-side', 'datatable-plugin', 'datatable-api', 'datatable-data-source']) ? 'block' : 'none;'); ?>;">
                                <li><a href="<?php echo e(route('datatable-basic-init')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-basic-init' ? 'active' : ''); ?>">Basic
                                        Init</a></li>
                                <li><a href="<?php echo e(route('datatable-advance')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-advance' ? 'active' : ''); ?>">Advance
                                        Init</a></li>
                                <li><a href="<?php echo e(route('datatable-styling')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-styling' ? 'active' : ''); ?>">Styling</a>
                                </li>
                                <li><a href="<?php echo e(route('datatable-ajax')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-ajax' ? 'active' : ''); ?>">AJAX</a>
                                </li>
                                <li><a href="<?php echo e(route('datatable-server-side')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-server-side' ? 'active' : ''); ?>">Server
                                        Side</a></li>
                                <li><a href="<?php echo e(route('datatable-plugin')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-plugin' ? 'active' : ''); ?>">Plug-in</a>
                                </li>
                                <li><a href="<?php echo e(route('datatable-api')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-api' ? 'active' : ''); ?>">API</a>
                                </li>
                                <li><a href="<?php echo e(route('datatable-data-source')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-data-source' ? 'active' : ''); ?>">Data
                                        Sources</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="submenu-title <?php echo e(in_array(Route::currentRouteName(), ['datatable-ext-autofill', 'datatable-ext-basic-button', 'datatable-ext-col-reorder', 'datatable-ext-fixed-header', 'datatable-ext-html-5-data-export', 'datatable-ext-responsive', 'datatable-ext-row-reorder', 'datatable-ext-scroller']) ? 'active' : ''); ?>"
                                href="#">Ex. Data Tables
                                <div class="according-menu"><i
                                        class="fa fa-angle-<?php echo e(in_array(Route::currentRouteName(), ['datatable-ext-autofill', 'datatable-ext-basic-button', 'datatable-ext-col-reorder', 'datatable-ext-fixed-header', 'datatable-ext-html-5-data-export', 'datatable-ext-key-table', 'datatable-ext-responsive', 'datatable-ext-row-reorder', 'datatable-ext-scroller']) ? 'down' : 'right'); ?>"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: <?php echo e(in_array(Route::currentRouteName(), ['datatable-ext-autofill', 'datatable-ext-basic-button', 'datatable-ext-col-reorder', 'datatable-ext-fixed-header', 'datatable-ext-html-5-data-export', 'datatable-ext-key-table', 'datatable-ext-responsive', 'datatable-ext-row-reorder', 'datatable-ext-scroller']) ? 'block' : 'none;'); ?>;">
                                <li><a href="<?php echo e(route('datatable-ext-autofill')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-ext-autofill' ? 'active' : ''); ?>">Auto
                                        Fill</a></li>
                                <li><a href="<?php echo e(route('datatable-ext-basic-button')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-ext-basic-button' ? 'active' : ''); ?>">Basic
                                        Button</a></li>
                                <li><a href="<?php echo e(route('datatable-ext-col-reorder')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-ext-col-reorder' ? 'active' : ''); ?>">Column
                                        Reorder</a></li>
                                <li><a href="<?php echo e(route('datatable-ext-fixed-header')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-ext-fixed-header' ? 'active' : ''); ?>">Fixed
                                        Header</a></li>
                                <li><a href="<?php echo e(route('datatable-ext-html-5-data-export')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-ext-html-5-data-export' ? 'active' : ''); ?>">HTML
                                        5 Export</a></li>
                                <li><a href="<?php echo e(route('datatable-ext-key-table')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-ext-key-table' ? 'active' : ''); ?>">Key
                                        Table</a></li>
                                <li><a href="<?php echo e(route('datatable-ext-responsive')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-ext-responsive' ? 'active' : ''); ?>">Responsive</a>
                                </li>
                                <li><a href="<?php echo e(route('datatable-ext-row-reorder')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-ext-row-reorder' ? 'active' : ''); ?>">Row
                                        Reorder</a></li>
                                <li><a href="<?php echo e(route('datatable-ext-scroller')); ?>"
                                        class="<?php echo e(Route::currentRouteName() == 'datatable-ext-scroller' ? 'active' : ''); ?>">Scroller</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?php echo e(route('jsgrid-table')); ?>"
                                class="<?php echo e(Route::currentRouteName() == 'jsgrid-table' ? 'active' : ''); ?>">Js Grid Table
                            </a></li>
                    </ul>
                </li>
                 <li class="sidebar-main-title">
						<div>
							<h6><?php echo e(trans('lang.Components')); ?></h6>
                     		<p><?php echo e(trans('lang.UI Components & Elements')); ?></p>
						</div>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/ui-kits' ? 'active' : ''); ?>" href="#"><i data-feather="box"></i><span><?php echo e(trans('lang.Ui Kits')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/ui-kits' ? 'down' : 'right'); ?>"></i></div>
						</a>
						
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/bonus-ui' ? 'active' : ''); ?>" href="#"><i data-feather="folder-plus"></i><span><?php echo e(trans('lang.Bonus Ui')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/ui-kits' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/bonus-ui' ? 'block;' : 'none;'); ?>">
							<li><a href="<?php echo e(route('scrollable')); ?>" class="<?php echo e(Route::currentRouteName()=='scrollable' ? 'active' : ''); ?>">Scrollable</a></li>
	                        <li><a href="<?php echo e(route('tree')); ?>" class="<?php echo e(Route::currentRouteName()=='tree' ? 'active' : ''); ?>">Tree view</a></li>
	                        <li><a href="<?php echo e(route('bootstrap-notify')); ?>" class="<?php echo e(Route::currentRouteName()=='bootstrap-notify' ? 'active' : ''); ?>">Bootstrap Notify</a></li>
	                        <li><a href="<?php echo e(route('rating')); ?>" class="<?php echo e(Route::currentRouteName()=='rating' ? 'active' : ''); ?>">Rating</a></li>
	                        <li><a href="<?php echo e(route('dropzone')); ?>" class="<?php echo e(Route::currentRouteName()=='dropzone' ? 'active' : ''); ?>">dropzone</a></li>
	                        <li><a href="<?php echo e(route('tour')); ?>" class="<?php echo e(Route::currentRouteName()=='tour' ? 'active' : ''); ?>">Tour</a></li>
	                        <li><a href="<?php echo e(route('sweet-alert2')); ?>" class="<?php echo e(Route::currentRouteName()=='sweet-alert2' ? 'active' : ''); ?>">SweetAlert2</a></li>
	                        <li><a href="<?php echo e(route('modal-animated')); ?>" class="<?php echo e(Route::currentRouteName()=='modal-animated' ? 'active' : ''); ?>">Animated Modal</a></li>
	                        <li><a href="<?php echo e(route('owl-carousel')); ?>" class="<?php echo e(Route::currentRouteName()=='owl-carousel' ? 'active' : ''); ?>">Owl Carousel</a></li>
	                        <li><a href="<?php echo e(route('ribbons')); ?>" class="<?php echo e(Route::currentRouteName()=='ribbons' ? 'active' : ''); ?>">Ribbons</a></li>
	                        <li><a href="<?php echo e(route('pagination')); ?>" class="<?php echo e(Route::currentRouteName()=='pagination' ? 'active' : ''); ?>">Pagination</a></li>
	                        <li><a href="<?php echo e(route('breadcrumb')); ?>" class="<?php echo e(Route::currentRouteName()=='breadcrumb' ? 'active' : ''); ?>">Breadcrumb</a></li>
	                        <li><a href="<?php echo e(route('range-slider')); ?>" class="<?php echo e(Route::currentRouteName()=='range-slider' ? 'active' : ''); ?>">Range Slider</a></li>
	                        <li><a href="<?php echo e(route('image-cropper')); ?>" class="<?php echo e(Route::currentRouteName()=='image-cropper' ? 'active' : ''); ?>">Image cropper</a></li>
	                        <li><a href="<?php echo e(route('sticky')); ?>" class="<?php echo e(Route::currentRouteName()=='sticky' ? 'active' : ''); ?>">Sticky</a></li>
	                        <li><a href="<?php echo e(route('basic-card')); ?>" class="<?php echo e(Route::currentRouteName()=='basic-card' ? 'active' : ''); ?>">Basic Card</a></li>
	                        <li><a href="<?php echo e(route('creative-card')); ?>" class="<?php echo e(Route::currentRouteName()=='creative-card' ? 'active' : ''); ?>">Creative Card</a></li>
	                        <li><a href="<?php echo e(route('tabbed-card')); ?>" class="<?php echo e(Route::currentRouteName()=='tabbed-card' ? 'active' : ''); ?>">Tabbed Card</a></li>
	                        <li><a href="<?php echo e(route('dragable-card')); ?>" class="<?php echo e(Route::currentRouteName()=='dragable-card' ? 'active' : ''); ?>">Draggable Card</a></li>
							<li>
								<a class="submenu-title <?php echo e(in_array(Route::currentRouteName(), ['timeline-v-1','timeline-v-2', 'timeline-small']) ? 'active' : ''); ?>" href="#">Timeline
									<div class="according-menu"><i class="fa fa-angle-<?php echo e(in_array(Route::currentRouteName(), ['timeline-v-1','timeline-v-2', 'timeline-small']) ? 'down' : 'right'); ?>"></i></div>
								</a>
								<ul class="nav-sub-childmenu submenu-content" style="display: <?php echo e(in_array(Route::currentRouteName(), ['timeline-v-1','timeline-v-2']) ? 'block' : 'none;'); ?>;">
									<li><a href="<?php echo e(route('timeline-v-1')); ?>" class="<?php echo e(Route::currentRouteName()=='timeline-v-1' ? 'active' : ''); ?>">Timeline 1</a></li>
                              		<li><a href="<?php echo e(route('timeline-v-2')); ?>" class="<?php echo e(Route::currentRouteName()=='timeline-v-2' ? 'active' : ''); ?>">Timeline 2</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/builders' ? 'active' : ''); ?>" href="#"><i data-feather="edit-3"></i><span><?php echo e(trans('lang.Builders')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/builders' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/builders' ? 'block;' : 'none;'); ?>">
							<li><a href="<?php echo e(route('form-builder-1')); ?>" class="<?php echo e(Route::currentRouteName()=='form-builder-1' ? 'active' : ''); ?>"> Form Builder 1</a></li>
	                        <li><a href="<?php echo e(route('form-builder-2')); ?>" class="<?php echo e(Route::currentRouteName()=='form-builder-2' ? 'active' : ''); ?>"> Form Builder 2</a></li>
	                        <li><a href="<?php echo e(route('pagebuild')); ?>" class="<?php echo e(Route::currentRouteName()=='pagebuild' ? 'active' : ''); ?>">Page Builder</a></li>
	                        <li><a href="<?php echo e(route('button-builder')); ?>" class="<?php echo e(Route::currentRouteName()=='button-builder' ? 'active' : ''); ?>">Button Builder</a></li>
						</ul>
					</li>
					
					
				</ul>  
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<?php /**PATH C:\Users\daffa\CubaLaravel\resources\views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>