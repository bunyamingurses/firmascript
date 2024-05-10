<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset("assets/siteIcon.png") }}" alt="">
                        <span class=" fa fa-angle-down"> {{ \App\Models\setting::getSetting("author") }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                            <a href="{{ route("admin.setting.index") }}">
                                <span>Ayarlar</span>
                            </a>
                        </li>
                        <li><a href="{{ route("login.logOut") }}"><i class="fa fa-sign-out pull-right"></i> Çıkış Yap</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
