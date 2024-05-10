<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>{{ \App\Models\setting::getSetting("title") }}</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="cache-control" content="public" />
    <meta name="description" content="{{ \App\Models\setting::getSetting("description") }}" />
    <meta name="keywords" content="{{ \App\Models\setting::getSetting("keyword") }}" />
    <meta name="copyright" content="{{ \App\Models\setting::getSetting("siteUrl") }}" />
    <meta name="author" content="{{ \App\Models\setting::getSetting("author") }}" />
    <meta name="publisher" content="www.bunyamingurses.com Türkiyenin Web Tasarım ve Dijital Adresi" />
    <meta name="distribution" content="Global" />
    <meta name="robots" content="INDEX,FOLLOW" />

    <!-- Bootstrap -->
    <link href="{{ asset("assets/adminAssets/vendors/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset("assets/adminAssets/vendors/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset("assets/adminAssets/vendors/nprogress/nprogress.css") }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset("assets/adminAssets/vendors/animate.css/animate.min.css") }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset("assets/adminAssets/build/css/custom.min.css") }}" rel="stylesheet">
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{ route("login.loginPost") }}" method="post">
                    @csrf
                    <h1>Login Form</h1>
                    <div class="form-group">
                        <input type="text" class="form-control" name="userUsername" placeholder="Lütfen kullanıcı adınızı girin.!" required="required" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="userPassword" placeholder="Lütfen parolanızı girin.!" required="required" />
                    </div>
                    <div class="form-group">

                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-outline-primary col-lg-12 submit">Giriş Yap</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
