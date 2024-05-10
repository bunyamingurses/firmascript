@extends("layouts.front.index")
@section("content")

    <!-- Portfolio Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Projeler</h6>
                <h2 class="mt-2">Kategorilerimize Göz Atın</h2>
            </div>
            <div class="row">
                @foreach($category as $categoryWrite)
                    <div class="card m-auto mb-2" style="width: 18rem;">
                    <img src="{{ asset("imagesWebp/category/"."/".$categoryWrite->categoryPhotoWebp) }}" class="card-img-top mt-3"
                         alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $categoryWrite->categoryName }} <span class="fa fa-check-circle"></span></h5>
                        <a href="{{ route("categorySites",["id"=>$categoryWrite->id,"name"=>\App\Http\Controllers\admin\tool\functionController::seo($categoryWrite->categoryName)]) }}" class="btn btn-primary"><span class="fa fa-eye"></span> İlgili tasarımları gör</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Portfolio End -->

@endsection
