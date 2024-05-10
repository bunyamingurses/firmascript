<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bünyamin Gürses</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #fff;
        }

        html {
            font-size: 62.5%;
        }

        body {
            width: 100%;
            height: 100vh;
            background-color: black;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .hata-kutusu {
            width: 100%;
            max-width: 50rem;
            background-color: #000;
            padding: 2.5rem 2.5rem 8rem;
            text-align: center;
            font-family: 'Montserrat', sans-serif;
            box-shadow: 0 0 2rem rgba(0, 0, 0, .8);

        }

        .logo-bolum {
            width: 6rem;
            height: 6rem;
        }

        .logo {
            width: 100%;
        }

        .hata-numara {
            color: #fff;
            font-size: 3.6rem;
            text-transform: uppercase;
        }

        .hata-mesaj {
            display: inline-block;
            font-size: large;
            text-transform: uppercase;
        }

        .hata-aciklama {
            color: #fff;
            font-size: 1.4rem;
            margin-top: 2.5rem;
            margin-bottom: 4rem;
            letter-spacing: 1px;
        }


        @media screen and (min-width: 768px) {
            .hata-kutusu {
                max-width: 70rem;
            }

            .hata-numara {
                font-size: 6rem;
            }

            .hata-mesaj {
                font-size: 3.5rem;
            }

            .hata-aciklama {
                font-size: 1.6rem;
            }

            .hata-link {
                font-size: 2rem;
            }
        }

    </style>
</head>
<body>
<div class="hata-kutusu">
    <div class="logo"><img src="{{ $message->embed(public_path("imagesWebp/setting/")."/".\App\Models\setting::getSetting("logoFooterWebp")) }}" alt=""></div>
    <h1 class="hata-mesaj">{{ @$userName }}.</h1>
    <h2>Mesajınız başarı ile iletilmiştir. Tarafınıza en kısa sürede dönüş yapılacaktır.</h2>

</div>
</body>
</html>






































