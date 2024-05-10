@extends("layouts.admin.index")
@section("content")
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        @if(session("status"))
            <div class="alert alert-info"> {{ session("status") }}</div>
        @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>Kategoriler Tablosu</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Kategori Adı</th>
                        <th>Eklenme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>


                    <tbody>

                    @foreach($categories as $categoryWrite)
                        <tr>
                            <td><img width="150px" src="{{ asset("imagesWebp/category/")."/".$categoryWrite->categoryPhotoWebp }}" alt=""></td>
                            <td>{{ $categoryWrite->categoryName }}</td>
                            <td>{{ substr($categoryWrite->created_at,0,11) }}</td>
                            <td>
                                <a href="" class="btn btn-success"><span class="fa fa-eye"></span></a>
                                <a href="{{ route("admin.category.edit",["id"=>$categoryWrite->id]) }}" class="btn btn-primary"><span class="fa fa-pencil-square"></span></a>
                                <a href="{{ route("admin.category.delete",["id"=>$categoryWrite->id]) }}" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
