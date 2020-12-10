<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="/backend/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/backend/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="search">
                            <i class="icon-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search"
                        aria-describedby="search">
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-lg-flex d-none">
                <button type="button" class="btn btn-info font-weight-bold">+ Create New</button>
            </li>
            <li class="nav-item dropdown d-flex">
                <div class="row">
                    <a class="col-6" href="{{route('f.changeLanguage',['vi'])}}" id="vn">
                        <img width="20px" height="20px"
                            src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxjaXJjbGUgc3R5bGU9ImZpbGw6I0Q4MDAyNzsiIGN4PSIyNTYiIGN5PSIyNTYiIHI9IjI1NiIvPg0KPHBvbHlnb24gc3R5bGU9ImZpbGw6I0ZGREE0NDsiIHBvaW50cz0iMjU2LDEzMy41NjUgMjgzLjYyOCwyMTguNTk0IDM3My4wMzMsMjE4LjU5NCAzMDAuNzAyLDI3MS4xNDQgMzI4LjMzLDM1Ni4xNzQgMjU2LDMwMy42MjMgDQoJMTgzLjY3LDM1Ni4xNzQgMjExLjI5OCwyNzEuMTQ0IDEzOC45NjgsMjE4LjU5NCAyMjguMzcyLDIxOC41OTQgIi8+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg==" /></a>
                    <a class="col-6" href="{{route('f.changeLanguage',['en'])}}" id="en">
                        <img width="20px" height="20px"
                            src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxjaXJjbGUgc3R5bGU9ImZpbGw6I0YwRjBGMDsiIGN4PSIyNTYiIGN5PSIyNTYiIHI9IjI1NiIvPg0KPGc+DQoJPHBhdGggc3R5bGU9ImZpbGw6I0Q4MDAyNzsiIGQ9Ik0yNDQuODcsMjU2SDUxMmMwLTIzLjEwNi0zLjA4LTQ1LjQ5LTguODE5LTY2Ljc4M0gyNDQuODdWMjU2eiIvPg0KCTxwYXRoIHN0eWxlPSJmaWxsOiNEODAwMjc7IiBkPSJNMjQ0Ljg3LDEyMi40MzVoMjI5LjU1NmMtMTUuNjcxLTI1LjU3Mi0zNS43MDgtNDguMTc1LTU5LjA3LTY2Ljc4M0gyNDQuODdWMTIyLjQzNXoiLz4NCgk8cGF0aCBzdHlsZT0iZmlsbDojRDgwMDI3OyIgZD0iTTI1Niw1MTJjNjAuMjQ5LDAsMTE1LjYyNi0yMC44MjQsMTU5LjM1Ni01NS42NTJIOTYuNjQ0QzE0MC4zNzQsNDkxLjE3NiwxOTUuNzUxLDUxMiwyNTYsNTEyeiIvPg0KCTxwYXRoIHN0eWxlPSJmaWxsOiNEODAwMjc7IiBkPSJNMzcuNTc0LDM4OS41NjVoNDM2Ljg1MmMxMi41ODEtMjAuNTI5LDIyLjMzOC00Mi45NjksMjguNzU1LTY2Ljc4M0g4LjgxOQ0KCQlDMTUuMjM2LDM0Ni41OTYsMjQuOTkzLDM2OS4wMzYsMzcuNTc0LDM4OS41NjV6Ii8+DQo8L2c+DQo8cGF0aCBzdHlsZT0iZmlsbDojMDA1MkI0OyIgZD0iTTExOC41ODQsMzkuOTc4aDIzLjMyOWwtMjEuNywxNS43NjVsOC4yODksMjUuNTA5bC0yMS42OTktMTUuNzY1TDg1LjEwNCw4MS4yNTJsNy4xNi0yMi4wMzcNCglDNzMuMTU4LDc1LjEzLDU2LjQxMiw5My43NzYsNDIuNjEyLDExNC41NTJoNy40NzVsLTEzLjgxMywxMC4wMzVjLTIuMTUyLDMuNTktNC4yMTYsNy4yMzctNi4xOTQsMTAuOTM4bDYuNTk2LDIwLjMwMWwtMTIuMzA2LTguOTQxDQoJYy0zLjA1OSw2LjQ4MS01Ljg1NywxMy4xMDgtOC4zNzIsMTkuODczbDcuMjY3LDIyLjM2OGgyNi44MjJsLTIxLjcsMTUuNzY1bDguMjg5LDI1LjUwOWwtMjEuNjk5LTE1Ljc2NWwtMTIuOTk4LDkuNDQ0DQoJQzAuNjc4LDIzNC41MzcsMCwyNDUuMTg5LDAsMjU2aDI1NmMwLTE0MS4zODQsMC0xNTguMDUyLDAtMjU2QzIwNS40MjgsMCwxNTguMjg1LDE0LjY3LDExOC41ODQsMzkuOTc4eiBNMTI4LjUwMiwyMzAuNA0KCWwtMjEuNjk5LTE1Ljc2NUw4NS4xMDQsMjMwLjRsOC4yODktMjUuNTA5bC0yMS43LTE1Ljc2NWgyNi44MjJsOC4yODgtMjUuNTA5bDguMjg4LDI1LjUwOWgyNi44MjJsLTIxLjcsMTUuNzY1TDEyOC41MDIsMjMwLjR6DQoJIE0xMjAuMjEzLDEzMC4zMTdsOC4yODksMjUuNTA5bC0yMS42OTktMTUuNzY1bC0yMS42OTksMTUuNzY1bDguMjg5LTI1LjUwOWwtMjEuNy0xNS43NjVoMjYuODIybDguMjg4LTI1LjUwOWw4LjI4OCwyNS41MDloMjYuODIyDQoJTDEyMC4yMTMsMTMwLjMxN3ogTTIyMC4zMjgsMjMwLjRsLTIxLjY5OS0xNS43NjVMMTc2LjkzLDIzMC40bDguMjg5LTI1LjUwOWwtMjEuNy0xNS43NjVoMjYuODIybDguMjg4LTI1LjUwOWw4LjI4OCwyNS41MDloMjYuODIyDQoJbC0yMS43LDE1Ljc2NUwyMjAuMzI4LDIzMC40eiBNMjEyLjAzOSwxMzAuMzE3bDguMjg5LDI1LjUwOWwtMjEuNjk5LTE1Ljc2NWwtMjEuNjk5LDE1Ljc2NWw4LjI4OS0yNS41MDlsLTIxLjctMTUuNzY1aDI2LjgyMg0KCWw4LjI4OC0yNS41MDlsOC4yODgsMjUuNTA5aDI2LjgyMkwyMTIuMDM5LDEzMC4zMTd6IE0yMTIuMDM5LDU1Ljc0M2w4LjI4OSwyNS41MDlsLTIxLjY5OS0xNS43NjVMMTc2LjkzLDgxLjI1Mmw4LjI4OS0yNS41MDkNCglsLTIxLjctMTUuNzY1aDI2LjgyMmw4LjI4OC0yNS41MDlsOC4yODgsMjUuNTA5aDI2LjgyMkwyMTIuMDM5LDU1Ljc0M3oiLz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K" />
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown d-flex mr-4 ">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                    id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="icon-globe"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
                    <a class="dropdown-item preview-item">
                        <i class="icon-head"></i> Profile
                    </a>
                <a class="dropdown-item preview-item" href="{{route('b.logout')}}">
                        <i class="icon-inbox"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
<!-- partial -->
