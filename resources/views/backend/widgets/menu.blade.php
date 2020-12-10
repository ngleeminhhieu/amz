<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
        <div class="user-image">
            <center><img src="{{Auth::guard('backend')->user()->hinh??''}}"></center>
        </div>

        <div class="user-name text-center">
            {{Auth::guard('backend')->user()->ten??''}} &nbsp; x &nbsp;
            {{Auth::guard('backend')->user()->username??''}}
        </div>
        <div class="user-designation">
            Developer
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="icon-box menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-disc menu-icon"></i>
                <span class="menu-title">Working Area</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('product.index')}}">Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.index')}}">User</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('b.delivery')}}">Delivery</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<!-- partial -->
