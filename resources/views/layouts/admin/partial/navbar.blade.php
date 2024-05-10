<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><img src="{{ asset("assets/gursesYazilimIcon.png") }}" width="50px" alt=""> <small>Gürses Yazılım</small></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset("assets/siteIcon.png") }}" alt="..." width="128px" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Hoşgeldiniz,</span>
                <h2>Bünyamin Gürses</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menüler</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route("admin.index") }}"><i class="fa fa-home"></i> Dashboard</a></li>

                    <li><a href="{{ route("admin.setting.index") }}"><i class="fa fa-cogs"></i> Ayarlar</a></li>

                    <li><a><i class="fa fa-database"></i> Kategoriler <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route("admin.category.index") }}">Kategoriler</a></li>
                            <li><a href="{{ route("admin.category.create") }}">Kategori Ekle</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-image"></i> Siteler <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route("admin.site.index") }}">Sieler</a></li>
                            <li><a href="{{ route("admin.site.create") }}">Site Ekle</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route("admin.offer.index") }}"><i class="fa fa-users"></i> Teklifler </a></li>

                    <li><a href="{{ route("admin.contact.index") }}"><i class="fa fa-comments"></i> Mesajlar </a></li>
                </ul>
            </div>


        </div>
        <!-- /sidebar menu -->

    </div>
</div>
