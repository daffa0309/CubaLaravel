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
              
                    <li class="sidebar-list">
                        <a
                            class="sidebar-link sidebar-title"
                            href="{{route('data-kreditur')}}"><i data-feather="home"></i><span
                                class="lan-3">Manage Data</span>
                            <div class="according-menu">
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a
                            class="sidebar-link sidebar-title"
                            href="{{route('input-data')}}"><i data-feather="plus-circle"></i><span
                                class="lan-3">Input Data</span>
                            <div class="according-menu">
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a
                            class="sidebar-link sidebar-title"
                            href="{{route('edit-profile')}}"><i data-feather="edit"></i><span
                                class="lan-3">Edit Profile</span>
                            <div class="according-menu">
                            </div>
                        </a>
                    </li>
                    @if(auth()->user()->level == "admin")
                    <li class="sidebar-list">
                        <a
                            class="sidebar-link sidebar-title"
                            href="{{route('data-user')}}"><i data-feather="user"></i><span
                                class="lan-3">Data User</span>
                            <div class="according-menu">
                            </div>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
