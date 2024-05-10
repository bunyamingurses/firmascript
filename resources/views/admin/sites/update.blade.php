@extends("layouts.admin.index")
@section("content")
    <div class="row">
        @if(session("status"))
            <div class="alert alert-info"> {{ session("status") }}</div>
        @endif
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Site Güncelleme Formu</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form action="{{ route("admin.site.update",["id"=>$site[0]["id"]]) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryImage"> Site
                                Fotoğraf
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <img class="img-thumbnail" style="margin-bottom: 10px;" src="{{ asset("imagesWebp/projects/")."/".$site[0]["siteImageWebp"] }}" width="150px" alt="">
                                <input type="file" id="siteImage" name="siteImage"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryName"> Site Adı
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="siteName" name="siteName" required="required"
                                       class="form-control col-md-7 col-xs-12" value="{{ $site[0]["siteName"] }}"
                                       placeholder="Lütfen Site Adını Girin.!">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryName"> Site Hakkında
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="siteAbout" name="siteAbout" required="required"
                                       class="form-control col-md-7 col-xs-12" value="{{ $site[0]["siteAbout"] }}" maxlength="254"
                                       placeholder="Lütfen Hakkında Girin.!">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryName"> Site Link(Url)
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="siteUrl" name="siteUrl" required="required"
                                       class="form-control col-md-7 col-xs-12" value="{{ $site[0]["siteUrl"] }}"
                                       placeholder="Lütfen Site Url(Link) Girin.!">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryName"> Site Fiyat
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="sitePrice" name="sitePrice" required="required"
                                       class="form-control col-md-7 col-xs-12" value="{{ $site[0]["sitePrice"] }}"
                                       placeholder="Lütfen Site Fiyat'ı Girin.!">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryName"> Site Kategori
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="categoryId" id="categoryId">
                                    <option value="0">Lütfen Kategori Seçin</option>
                                    @foreach($category as $categoryWrite)
                                        @if($categoryWrite->id == $site[0]["siteCategoryId"])
                                        <option value="{{ $categoryWrite->id }}" selected>{{ $categoryWrite->categoryName }}</option>
                                        @else
                                            <option value="{{ $categoryWrite->id }}">{{ $categoryWrite->categoryName }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Site Ekle <span
                                        class="fa fa-plus-circle"></span></button>
                                <button type="reset" class="btn btn-danger"><span class="fa fa-times"></span> İptal Et</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
