        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>    <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Dashboards</li>
                            <li>
                                <a href="{{ url('/home') }}" class="mm-active">
                                    <i class="metismenu-icon pe-7s-rocket"></i>
                                    Dashboard 
                                </a>
                            </li>
                            <li class="app-sidebar__heading">Manage</li>
                            <li   
                            >
                            <a href="#">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Brands
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                             <li>
                                <a href="{{ url('/add/brand') }}"> 
                                    <i class="metismenu-icon"></i>
                                    Add New
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/all/brands') }}"> 
                                    <i class="metismenu-icon"></i>
                                    All Brands
                                </a>
                            </li>
                            @foreach($brands as $brand)
                            <li>
                                <a href="{{ url('/brand/')}}/{{$brand->id}}"> 
                                    <i class="metismenu-icon"></i>
                                    {{$brand->brand_name}} Restaurant
                                </a>
                            </li>
                            @endforeach
                           
                        </ul>
                    </li>
                    <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-car"></i>
                        Restaurants
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                    <li>
                        <a href="{{ url('/restaurant/add')}}">
                            <i class="metismenu-icon">
                            </i>Add New
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/approved/restaurants')}}">
                            <i class="metismenu-icon">
                            </i>Approved Restaurants
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/inprocessing/restaurants')}}">
                            <i class="metismenu-icon">
                            </i>In Processing Restaurants
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/pending/restaurants')}}">
                            <i class="metismenu-icon">
                            </i>Pending Restaurants
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/blocked/restaurants')}}">
                            <i class="metismenu-icon">
                            </i>Blocked Restaurants
                        </a>
                    </li>
                 
                    
           
        </ul>
    </div>
</div>
</div>  