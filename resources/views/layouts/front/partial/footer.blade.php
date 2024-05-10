<!-- Footer Start -->
<div class="container-xxl bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-4">
                <a href="{{ route("index") }}">
                <img src="{{ asset("imagesWebp/setting/")."/".\App\Models\setting::getSetting("logoFooterWebp") }}" alt="">
                </a>
                <h5 class="text-white mb-4">İletişim</h5>
                <p><i class="fa fa-map-marker-alt me-3"></i>İstanbul/Türkiye</p>
                <p><i class="fa fa-phone-alt me-3"></i>+90 534 654 6300</p>
                <p><i class="fa fa-envelope me-3"></i>info@gursesyazilim.com</p>
{{--                <div class="d-flex pt-2">--}}
{{--                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>--}}
{{--                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>--}}
{{--                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>--}}
{{--                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>--}}
{{--                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>--}}
{{--                </div>--}}
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="text-white mb-4">Linkler</h5>
                <a class="btn btn-link" href="{{ route("index") }}">Anasayfa</a>
                <a class="btn btn-link" href="{{ route("categories") }}">Kategoriler</a>
                <a class="btn btn-link" href="{{ route("sites") }}">Projeler</a>
                <a class="btn btn-link" href="{{ route("contact2") }}">İletişim</a>
                <a class="btn btn-link" href="{{ route("getOffer2") }}">Teklif Alın <span class="fa fa-lira-sign"></span></a>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="text-white mb-4">Newsletter</h5>
                <p>Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non
                    vulpu</p>
                <div class="position-relative w-100 mt-3">
                    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                           placeholder="Your Email" style="height: 48px;">
                    <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                            class="fa fa-paper-plane text-primary fs-4"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-lg-5">
        <div class="copyright">
            <div class="row">
                <div class="col-lg-12 text-center text-center mb-3 mb-md-0">
                    <a class="border-bottom" href="{{ \App\Models\setting::getSetting("siteUrl") }}">www.gursesyazilim.com</a>, &copy; Tüm Hakları Saklıdır.</a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
