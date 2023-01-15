<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">

            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->is('home') ? 'active' : '' }}">
                    <a href="/home" class="waves-effect waves-dark ">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
            </ul>
          
           
        </div>
    </div>
</nav>
