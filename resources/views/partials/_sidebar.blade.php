<div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="false" data-slide-speed="200" style="padding-top: 20px">
                            <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <form class="sidebar-search  " action="/Reports" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." name="search">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li class="nav-item start active">
                            <a href="/" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Management</h3>
                        </li>
                        <?php $user = Auth::User();
                         if ($user->isAn('user-manager') || $user->isAn('admin') ){?>
                        <li class="nav-item">
                            <a href="/Customers" class="nav-link">
                                <i class="icon-wrench"></i>
                                <span class="title">Customers</span>
                            </a>
                        </li>
                        <?php } 
                        if ($user->isAn('shop-manager') || $user->isAn('admin') ){?>
                        <li class="nav-item  ">
                            <a href="/Products" class="nav-link">
                                <i class="icon-puzzle"></i>
                                <span class="title">Products</span>
                            </a>
                        </li>
                        <?php } 
                        if ($user->isAn('shop-manager') || $user->isAn('admin') ){?>
                        <li class="nav-item  ">
                            <a href="/Orders" class="nav-link">
                                <i class="icon-settings"></i>
                                <span class="title">Orders</span>
                            </a>
                        </li>
                        <?php } if ($user->isAn('admin') ){
                            ?>
                            <li class="nav-item  ">
                            <a href="/Logs" class="nav-link">
                                <i class="icon-list"></i>
                                <span class="title">Logs</span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>