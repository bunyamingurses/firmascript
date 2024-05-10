<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="{{ route("index") }}" class="navbar-brand p-0">
        <h1 class="m-0"><img class="me-2" src="{{ asset("imagesWebp/setting/")."/".\App\Models\setting::getSetting("logoHeaderWebp") }}" alt=""></h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ route("index") }}" class="nav-item @if(request()->route()->getName()=="index" || request()->route()->getName()=="index2" || request()->route()->getName()=="index3" ) active @endif nav-link">Anasayfa</a>
            <a href="{{ route("categories") }}" class="nav-item @if(request()->route()->getName()=="categories" || request()->route()->getName()=="categories2") active @endif nav-link">Kategoriler</a>
            <a href="{{ route("sites") }}" class="nav-item @if(request()->route()->getName()=="sites" || request()->route()->getName()=="sites2" || request()->route()->getName()=="categorySites" ) active @endif nav-link">Projeler</a>
            <a href="{{ route("contact2") }}" class="nav-item @if(request()->route()->getName()=="contact" || request()->route()->getName()=="contact2" || request()->route()->getName()=="contactPost" ) active @endif nav-link">İletişim</a>
        </div>
        <a href="{{ route("getOffer2") }}" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3"><span class="fa fa-lira-sign"></span> Teklif Alın</a>
    </div>
</nav>
