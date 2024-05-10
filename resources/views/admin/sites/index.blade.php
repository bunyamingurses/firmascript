@extends("layouts.admin.index")
@section("content")
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @if(session("status"))
                <div class="alert alert-info"> {{ session("status") }}</div>
            @endif
            <div class="x_panel">
                <div class="x_title">
                    <h2>Siteler Tablosu</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Fotoğraf</th>
                            <th>Site Adı</th>
                            <th>Site Hakkında</th>
                            <th>Kategori</th>
                            <th>Siteyi Gör</th>
                            <th>Eklenme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>


                        <tbody>

                        @foreach($site as $siteWrite)
                            <tr>
                                <td><a target="_blank"
                                       href="{{ \App\Models\setting::getSetting("siteUrl")."/".$siteWrite->siteUrl }}"><img
                                            width="200px"
                                            src="{{ asset("imagesWebp/projects/")."/".$siteWrite->siteImageWebp }}"
                                            alt=""></a></td>
                                <td><a target="_blank"
                                       href="{{ \App\Models\setting::getSetting("siteUrl")."/".$siteWrite->siteUrl }}">{{ $siteWrite->siteName }}</a>
                                </td>
                                <td>{{ $siteWrite->siteAbout }}</td>
                                <td>{{ \App\Models\category::getSingleName($siteWrite->siteCategoryId) }}</td>
                                <td><a target="_blank"
                                       href="{{ \App\Models\setting::getSetting("siteUrl")."/".$siteWrite->siteUrl }}"
                                       class="btn btn-info"><span class="fa fa-link"></span></a></td>
                                <td>{{ substr($siteWrite->created_at,0,11) }}</td>
                                <td>
                                    <a href="{{ route("admin.site.edit",["id"=>$siteWrite->id]) }}"
                                       class="btn btn-primary"><span class="fa fa-pencil-square"></span></a>
                                    <a href="{{ route("admin.site.delete",["id"=>$siteWrite->id]) }}"
                                       class="btn btn-danger"><span class="fa fa-trash"></span></a>
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
