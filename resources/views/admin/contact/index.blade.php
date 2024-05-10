@extends("layouts.admin.index")
@section("content")
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @if(session("status"))
                <div class="alert alert-info"> {{ session("status") }}</div>
            @endif
            <div class="x_panel">
                <div class="x_title">
                    <h2>Mesajlar Tablosu</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>E-Posta</th>
                            <th>Konu</th>
                            <th>Mesaj</th>
                            <th>Sistem Mail</th>
                            <th>Admin Mail</th>
                            <th>Tarih</th>
                        </tr>
                        </thead>


                        <tbody>

                        @foreach($contact as $contactWrite)
                            <tr>
                                <td>{{ $contactWrite->nameSurname }}</td>
                                <td>{{ $contactWrite->email }}</td>
                                <td>{{ $contactWrite->subject }}</td>
                                <td>{{ $contactWrite->message }}</td>
                                <td>
                                    @if($contactWrite->mailSystem==1)
                                        <span class="label label-success"> <span class="fa fa-check-circle-o"></span> İletildi.</span>
                                    @else
                                        <span class="label label-danger"> <span class="fa fa-check-circle-o"></span> İletilemedi.</span>
                                    @endif
                                </td>
                                <td>
                                    @if($contactWrite->mailAdmin==1)
                                        <span href="" class="label label-success"> <span class="fa fa-check-circle-o"></span> İletildi.</span>
                                    @else
                                        <a href="{{ route("admin.contact.sendMail",["id"=>$contactWrite->id,"name"=>$contactWrite->nameSurname,"email"=>$contactWrite->email]) }}" class="btn btn-primary"> Gönder <span class="fa fa-mail-forward"></span></a>
                                    @endif
                                </td>
                                <td>{{ substr($contactWrite->created_at,0,11) }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
