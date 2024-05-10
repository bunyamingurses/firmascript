
@if(request()->route()->getName()=="index")
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="text-white mb-4 animated zoomIn">Dijital Dünya'da Kimlik Sahibi Olmaya <span class="text-info">Hazır Mısınız?</span></h1>
                    <p class="text-white pb-3 animated zoomIn">Size ait Yönetim paneli ve Güncel WebTasarım ile Siteniz'de/sisteminiz'de değişiklik yapabilir ve güncel tutabilirsiniz.</p>
                    <a href="{{ route("getOffer2") }}" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft"><span class="fa fa-lira-sign"></span> Teklif Alın</a>
                    <a href="{{ route("contact") }}" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight"><span class="fa fa-comments"></span> İletişim</a>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid" src="{{ asset("public/assets/frontAssets/img/hero.png") }}" alt="">
                </div>
            </div>
        </div>
    </div>

@else
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    @if(request()->route()->getName()=="sites" || request()->route()->getName()=="sites2" || request()->route()->getName()=="categorySites")
                        <h1 class="text-white animated zoomIn">Projeler</h1>
                        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route("index") }}">Anasayfa</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Projeler</li>
                            </ol>
                        </nav>
                    @elseif(request()->route()->getName()=="categories")
                        <h1 class="text-white animated zoomIn">Kategoriler</h1>
                        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route("index") }}">Anasayfa</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Kategoriler</li>
                            </ol>
                        </nav>
                    @elseif(request()->route()->getName()=="categories2")
                        <h1 class="text-white animated zoomIn">Kategoriler</h1>
                        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route("index") }}">Anasayfa</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Kategoriler</li>
                            </ol>
                        </nav>
                    @elseif(request()->route()->getName()=="contact")
                        <h1 class="text-white animated zoomIn">İletişim</h1>
                        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route("index") }}">Anasayfa</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">İletişim</li>
                            </ol>
                        </nav>
                    @elseif(request()->route()->getName()=="contact2")
                        <h1 class="text-white animated zoomIn">İletişim</h1>
                        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route("index") }}">Anasayfa</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">İletişim</li>
                            </ol>
                        </nav>
                    @elseif(request()->route()->getName()=="getOffer")
                        <h1 class="text-white animated zoomIn">Teklif Al</h1>
                        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route("index") }}">Anasayfa</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Teklif Al</li>
                            </ol>
                        </nav>
                    @elseif(request()->route()->getName()=="getOffer2")
                        <h1 class="text-white animated zoomIn">Teklif Al</h1>
                        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route("index") }}">Anasayfa</a></li>
s                                <li class="breadcrumb-item text-white" aria-current="page">Teklif Al</li>
                            </ol>
                        </nav>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endif
















