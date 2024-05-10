<!-- Portfolio Start -->
<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Projelerimiz</h6>
            <h2 class="mt-2">Projelerimize Göz Atın</h2>
        </div>


        <div class="row justify-content-center">


            @foreach($sites as $siteWrite)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="card mb-2">
                        <a target="_blank"
                           href="{{ \App\Models\setting::getSetting("siteUrl")."/public/".$siteWrite->siteUrl }}"><img
                                    src="{{ asset("imagesWebp/projects/")."/".$siteWrite->siteImageWebp }}"
                                    class="card-img"
                                    alt="..."></a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $siteWrite->siteName }} <span class="fa fa-check-circle"></span>
                            </h5>
                            <a target="_blank"
                               href="{{ \App\Models\setting::getSetting("siteUrl")."/public/".$siteWrite->siteUrl }}"
                               class="btn btn-primary"><span class="fa fa-eye"></span> Projeyi Gör</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <a href="{{ route("sites") }}" class="btn btn-primary col-lg-3 mt-3">Tüm Projeler <span class="fa fa-arrow-circle-right"></span></a>
        </div>


    </div>
</div>
<!-- Portfolio End -->
