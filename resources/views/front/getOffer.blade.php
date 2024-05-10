@extends("layouts.front.index")
@section("content")

    <div class="row justify-content-center p-2">
        <div class="col-lg-7">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Teklif Alın</h6>
                <h2 class="mt-2">Projeniz İçin Teklif Alın</h2>
                @if(session("status"))
                    <div class="alert alert-info"> {{ session("status") }}</div>
                @endif

            </div>
            <div class="wow fadeInUp" data-wow-delay="0.3s">
                <form action="{{ route("postOffer") }}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nameSurname" name="nameSurname" required="required"
                                       placeholder="Ad Soyad">
                                <label for="name">Ad Soyad</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" required="required"
                                       placeholder="E-Posta Adresi">
                                <label for="email">E-Posta Adresi</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-control bg-light" name="siteId" required="required" id="siteId">
                                    @if(isset($id))
                                        <option value="0">Lütfen Proje Seçin</option>
                                        @foreach($sites as $siteWrite)
                                            @if($siteWrite->id==$id)
                                                <option selected
                                                        value="{{ $siteWrite->id }}">{{ $siteWrite->siteName }}</option>
                                            @else
                                                <option value="{{ $siteWrite->id }}">{{ $siteWrite->siteName }}</option>

                                            @endif
                                        @endforeach
                                    @else
                                        <option selected value="0">Lütfen Proje Seçin</option>
                                        @foreach($sites as $siteWrite)
                                            <option value="{{ $siteWrite->id }}">{{ $siteWrite->siteName }}</option>
                                        @endforeach

                                    @endif
                                </select>
                                <label for="subject">Projeler</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Lütfen mesajınızı belirtin.!" required="required" name="message"
                                          id="message" style="height: 150px"></textarea>
                                <label for="message">Lütfen mesajnızı belirtin.</label>
                            </div>
                        </div>
                        <div class="col-12">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            <button class="btn btn-primary w-100 py-3 mt-2" type="submit">Talep İlet <span
                                    class="fa fa-arrow-right"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
