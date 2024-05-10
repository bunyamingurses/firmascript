@extends("layouts.admin.index")
@section("content")
    <div class="row">
        @if(session("status"))
            <div class="alert alert-info"> {{ session("status") }}</div>
        @endif
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Kategori Ekleme Formu</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form action="{{ route("admin.category.update",["id"=>$category[0]["id"]]) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryImage"> Kategori
                                Fotoğraf
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <img style="margin-bottom: 20px;" src="{{asset("imagesWebp/category/")."/".$category[0]["categoryPhotoWebp"] }}" width="200px" alt="">
                                <input type="file" id="categoryImage" name="categoryImage"
                                       class="form-control col-md-7 col-xs-12"><br>
                                <p class="text-danger">*Fotoğraf güncellemek mecburi değildir.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryName"> Kategori Adı
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="categoryName" name="categoryName" required="required"
                                       class="form-control col-md-7 col-xs-12" value="{{ $category[0]["categoryName"] }}"
                                       placeholder="Lütfen Kategori Adını Girin.!">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Kategori Güncelle <span
                                        class="fa fa-repeat"></span></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
