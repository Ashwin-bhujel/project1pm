<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="" class="user-image img-responsive"/>
            </li>


            <li>
                <a class="active-menu"  href="<?= backend_url() ?>"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-3x"></i> ADMINS<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= backend_url('add-admin-users')?>">Add Admin Users</a>
                    </li>
                    <li>
                        <a href="<?= backend_url('show-admin-users')?>">Show Admin Users</a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>

</nav>
 /. NAV SIDE