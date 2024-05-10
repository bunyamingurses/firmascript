@extends("layouts.admin.index")
@section("content")
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        @if(session("status"))
            <div class="alert alert-info"> {{ session("status") }}</div>
        @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>Teklifler Tablosu</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Ad Soyad</th>
                        <th>E-Posta</th>
                        <th>Site</th>
                        <th>Mesaj</th>
                        <th>Sistem Mail</th>
                        <th>Admin Mail</th>
                        <th>Tarih</th>
                    </tr>
                    </thead>


                    <tbody>

                    @foreach($offer as $offerWrite)
                        <tr>
                            <td>{{ $offerWrite->nameSurname }}</td>
                            <td>{{ $offerWrite->email }}</td>
                            <td><a target="_blank" href="http://{{ \App\Models\site::getUrl($offerWrite->siteId) }}">{{ \App\Models\site::getSingleName($offerWrite->siteId) }}</a></td>
                            <td>{{ $offerWrite->message }}</td>
                            <td>
                                @if($offerWrite->mailSystem==1)
                                    <span class="label label-success">Gönderildi</span>
                                @else
                                    <span class="label label-danger">Gönderilmedi</span>
                                @endif
                            </td>
                            <td>
                                @if($offerWrite->mailAdmin==1)
                                    <span class="label label-success">Gönderildi.</span>
                                @else
                                    <a href="{{ route("admin.offer.sendMail",["id"=>$offerWrite->id,"siteId"=>$offerWrite->siteId,"name"=>$offerWrite->nameSurname,"email"=>$offerWrite->email]) }}" class="btn btn-primary">Gönder <span class="fa fa-mail-forward"></span></a>
                                @endif
                            </td>
                            <td>{{ substr($offerWrite->created_at,0,11) }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
