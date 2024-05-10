@extends("layouts.front.index")
@section("content")

    <div class="row justify-content-center p-2">
        <div class="col-lg-7">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Bize Yazın</h6>
                <h2 class="mt-2">Sorularınız İçin Bize Yazın</h2>
                @if(session("status"))
                    <div class="alert alert-info"> {{ session("status") }}</div>
                @endif
            </div>
            <div class="wow fadeInUp" data-wow-delay="0.3s">
                <form action="{{ route("contactPost") }}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nameSurname" name="nameSurname" placeholder="Ad Soyad" required="required">
                                <label for="name">Ad Soyad</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-Posta Adresi"  required="required">
                                <label for="email">E-Posta Adresi</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Konu"  required="required">
                                <label for="subject">Konu</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Lütfen mesajınızı belirtin.!" id="message" name="message"  required="required" style="height: 150px"></textarea>
                                <label for="message">Lütfen mesajnızı belirtin.</label>
                            </div>
                        </div>
                        <div class="col-12">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            <button class="btn btn-primary w-100 py-3 mt-2" type="submit">Mesaj'ı Gönder <span class="fa fa-arrow-right"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
