<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('/') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}"
                    alt=""><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                    alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('/') }}"><img class="img-fluid"
                    src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{ route('/') }}"><img class="img-fluid"
                                src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    @if (Auth::user()->level == 'admin')
                        <li class="sidebar-list">

                            <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/forms'? 'active': '' }}"
                                href="#">
                        <li><a class="lan-4 {{ Route::currentRouteName() == 'index' ? 'active' : '' }}"
                                href="{{ route('index') }}">{{ trans('lang.Dashboard') }}</a></li>
                        </a>
                        </li>
                    @else
                        <li class="sidebar-list">


                        </li>
                    @endif

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/forms'? 'active': '' }}"
                            href="#">
                            <i data-feather="file-text"></i><span>{{ trans('lang.Forms') }}</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-{{ request()->route()->getPrefix() == '/forms'? 'down': 'right' }}"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display: {{ request()->route()->getPrefix() == '/forms'? 'block;': 'none;' }}">
                            <li>
                            <li><a href="{{ route('input-data') }}"
                                    class="{{ Route::currentRouteName() == 'input-data' ? 'active' : '' }}">Input Data
                                </a></li>
                    </li>

                </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/tables'? 'active': '' }}"
                        href="#"><i data-feather="server"></i><span>{{ trans('lang.Tables') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{ request()->route()->getPrefix() == '/tables'? 'down': 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/tables'? 'block;': 'none;' }}">
                        <li>
                            <a class="submenu-title  {{ in_array(Route::currentRouteName(), ['datatable-basic-init', 'datatable-advance', 'datatable-styling', 'datatable-ajax', 'datatable-server-side', 'datatable-plugin', 'datatable-api']) ? 'active' : '' }}"
                                href="#">Data
                                <div class="according-menu"><i
                                        class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['datatable-basic-init', 'datatable-advance', 'datatable-styling', 'datatable-ajax', 'datatable-server-side', 'datatable-plugin', 'datatable-api', 'datatable-data-source']) ? 'down' : 'right' }}"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: {{ in_array(Route::currentRouteName(), ['datatable-basic-init', 'datatable-advance', 'datatable-styling', 'datatable-ajax', 'datatable-server-side', 'datatable-plugin', 'datatable-api', 'datatable-data-source']) ? 'block' : 'none;' }};">
                                <li><a href="{{ route('datatable-basic-init') }}"
                                        class="{{ Route::currentRouteName() == 'datatable-basic-init' ? 'active' : '' }}">Manage
                                        Data</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6>{{ trans('lang.Components') }}</h6>
                        <p>{{ trans('lang.UI Components & Elements') }}</p>
                    </div>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/ui-kits'? 'active': '' }}"
                        href="#"><i data-feather="box"></i><span>{{ trans('lang.Ui Kits') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{ request()->route()->getPrefix() == '/ui-kits'? 'down': 'right' }}"></i>
                        </div>
                    </a>
                    {{-- <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/ui-kits' ? 'block;' : 'none;' }}">
							<li><a href="{{route('state-color')}}" class="{{ Route::currentRouteName()=='state-color' ? 'active' : '' }}">State color</a></li>
							<li><a href="{{route('typography')}}" class="{{ Route::currentRouteName()=='typography' ? 'active' : '' }}">Typography</a></li>
							<li><a href="{{route('avatars')}}" class="{{ Route::currentRouteName()=='avatars' ? 'active' : '' }}">Avatars</a></li>
							<li><a href="{{route('helper-classes')}}" class="{{ Route::currentRouteName()=='helper-classes' ? 'active' : '' }}">helper classes</a></li>
							<li><a href="{{route('grid')}}" class="{{ Route::currentRouteName()=='grid' ? 'active' : '' }}">Grid</a></li>
							<li><a href="{{route('tag-pills')}}" class="{{ Route::currentRouteName()=='tag-pills' ? 'active' : '' }}">Tag & pills</a></li>
							<li><a href="{{route('progress-bar')}}" class="{{ Route::currentRouteName()=='progress-bar' ? 'active' : '' }}">Progress</a></li>
							<li><a href="{{route('modal')}}" class="{{ Route::currentRouteName()=='modal' ? 'active' : '' }}">Modal</a></li>
							<li><a href="{{route('alert')}}" class="{{ Route::currentRouteName()=='alert' ? 'active' : '' }}">Alert</a></li>
							<li><a href="{{route('popover')}}" class="{{ Route::currentRouteName()=='popover' ? 'active' : '' }}">Popover</a></li>
							<li><a href="{{route('tooltip')}}" class="{{ Route::currentRouteName()=='tooltip' ? 'active' : '' }}">Tooltip</a></li>
							<li><a href="{{route('loader')}}" class="{{ Route::currentRouteName()=='loader' ? 'active' : '' }}">Spinners</a></li>
							<li><a href="{{route('dropdown')}}" class="{{ Route::currentRouteName()=='dropdown' ? 'active' : '' }}">Dropdown</a></li>  
							<li><a href="{{route('accordion')}}" class="{{ Route::currentRouteName()=='accordion' ? 'active' : '' }}">Accordion</a></li>
							<li>
								<a class="submenu-title {{ in_array(Route::currentRouteName(), ['tab-bootstrap','tab-material']) ? 'active' : '' }}" href="#">Tabs
									<div class="according-menu"><i class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['tab-bootstrap','tab-material']) ? 'down' : 'right' }}"></i></div>
								</a>
								<ul class="nav-sub-childmenu submenu-content" style="display: {{ in_array(Route::currentRouteName(), ['tab-bootstrap','tab-material']) ? 'block' : 'none;' }};">
									<li><a href="{{route('tab-bootstrap')}}" class="{{ Route::currentRouteName()=='tab-bootstrap' ? 'active' : '' }}">Bootstrap Tabs</a></li>
                           			<li><a href="{{route('tab-material')}}" class="{{ Route::currentRouteName()=='tab-material' ? 'active' : '' }}">Line Tabs</a></li>
								</ul>
							</li>
							<li><a href="{{route('box-shadow')}}" class="{{ Route::currentRouteName()=='box-shadow' ? 'active' : '' }}">Shadow</a></li>
                     		<li><a href="{{route('list')}}" class="{{ Route::currentRouteName()=='list' ? 'active' : '' }}">Lists</a></li>
						</ul> --}}
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/bonus-ui'? 'active': '' }}"
                        href="#"><i data-feather="folder-plus"></i><span>{{ trans('lang.Bonus Ui') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{ request()->route()->getPrefix() == '/ui-kits'? 'down': 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/bonus-ui'? 'block;': 'none;' }}">
                        <li><a href="{{ route('scrollable') }}"
                                class="{{ Route::currentRouteName() == 'scrollable' ? 'active' : '' }}">Scrollable</a>
                        </li>
                        <li><a href="{{ route('tree') }}"
                                class="{{ Route::currentRouteName() == 'tree' ? 'active' : '' }}">Tree view</a></li>
                        <li><a href="{{ route('bootstrap-notify') }}"
                                class="{{ Route::currentRouteName() == 'bootstrap-notify' ? 'active' : '' }}">Bootstrap
                                Notify</a></li>
                        <li><a href="{{ route('rating') }}"
                                class="{{ Route::currentRouteName() == 'rating' ? 'active' : '' }}">Rating</a></li>
                        <li><a href="{{ route('dropzone') }}"
                                class="{{ Route::currentRouteName() == 'dropzone' ? 'active' : '' }}">dropzone</a></li>
                        <li><a href="{{ route('tour') }}"
                                class="{{ Route::currentRouteName() == 'tour' ? 'active' : '' }}">Tour</a></li>
                        <li><a href="{{ route('sweet-alert2') }}"
                                class="{{ Route::currentRouteName() == 'sweet-alert2' ? 'active' : '' }}">SweetAlert2</a>
                        </li>
                        <li><a href="{{ route('modal-animated') }}"
                                class="{{ Route::currentRouteName() == 'modal-animated' ? 'active' : '' }}">Animated
                                Modal</a></li>
                        <li><a href="{{ route('owl-carousel') }}"
                                class="{{ Route::currentRouteName() == 'owl-carousel' ? 'active' : '' }}">Owl
                                Carousel</a></li>
                        <li><a href="{{ route('ribbons') }}"
                                class="{{ Route::currentRouteName() == 'ribbons' ? 'active' : '' }}">Ribbons</a></li>
                        <li><a href="{{ route('pagination') }}"
                                class="{{ Route::currentRouteName() == 'pagination' ? 'active' : '' }}">Pagination</a>
                        </li>
                        <li><a href="{{ route('breadcrumb') }}"
                                class="{{ Route::currentRouteName() == 'breadcrumb' ? 'active' : '' }}">Breadcrumb</a>
                        </li>
                        <li><a href="{{ route('range-slider') }}"
                                class="{{ Route::currentRouteName() == 'range-slider' ? 'active' : '' }}">Range
                                Slider</a></li>
                        <li><a href="{{ route('image-cropper') }}"
                                class="{{ Route::currentRouteName() == 'image-cropper' ? 'active' : '' }}">Image
                                cropper</a></li>
                        <li><a href="{{ route('sticky') }}"
                                class="{{ Route::currentRouteName() == 'sticky' ? 'active' : '' }}">Sticky</a></li>
                        <li><a href="{{ route('basic-card') }}"
                                class="{{ Route::currentRouteName() == 'basic-card' ? 'active' : '' }}">Basic Card</a>
                        </li>
                        <li><a href="{{ route('creative-card') }}"
                                class="{{ Route::currentRouteName() == 'creative-card' ? 'active' : '' }}">Creative
                                Card</a></li>
                        <li><a href="{{ route('tabbed-card') }}"
                                class="{{ Route::currentRouteName() == 'tabbed-card' ? 'active' : '' }}">Tabbed
                                Card</a>
                        </li>
                        <li><a href="{{ route('dragable-card') }}"
                                class="{{ Route::currentRouteName() == 'dragable-card' ? 'active' : '' }}">Draggable
                                Card</a></li>
                        <li>
                            <a class="submenu-title {{ in_array(Route::currentRouteName(), ['timeline-v-1', 'timeline-v-2', 'timeline-small']) ? 'active' : '' }}"
                                href="#">Timeline
                                <div class="according-menu"><i
                                        class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['timeline-v-1', 'timeline-v-2', 'timeline-small']) ? 'down' : 'right' }}"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: {{ in_array(Route::currentRouteName(), ['timeline-v-1', 'timeline-v-2']) ? 'block' : 'none;' }};">
                                <li><a href="{{ route('timeline-v-1') }}"
                                        class="{{ Route::currentRouteName() == 'timeline-v-1' ? 'active' : '' }}">Timeline
                                        1</a></li>
                                <li><a href="{{ route('timeline-v-2') }}"
                                        class="{{ Route::currentRouteName() == 'timeline-v-2' ? 'active' : '' }}">Timeline
                                        2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/builders'? 'active': '' }}"
                        href="#"><i data-feather="edit-3"></i><span>{{ trans('lang.Builders') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{ request()->route()->getPrefix() == '/builders'? 'down': 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/builders'? 'block;': 'none;' }}">
                        <li><a href="{{ route('form-builder-1') }}"
                                class="{{ Route::currentRouteName() == 'form-builder-1' ? 'active' : '' }}"> Form
                                Builder 1</a></li>
                        <li><a href="{{ route('form-builder-2') }}"
                                class="{{ Route::currentRouteName() == 'form-builder-2' ? 'active' : '' }}"> Form
                                Builder 2</a></li>
                        <li><a href="{{ route('pagebuild') }}"
                                class="{{ Route::currentRouteName() == 'pagebuild' ? 'active' : '' }}">Page
                                Builder</a>
                        </li>
                        <li><a href="{{ route('button-builder') }}"
                                class="{{ Route::currentRouteName() == 'button-builder' ? 'active' : '' }}">Button
                                Builder</a></li>
                    </ul>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6>{{ trans('lang.Pages') }}</h6>
                        <p>{{ trans('lang.All neccesory pages added') }}</p>
                    </div>
                </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
