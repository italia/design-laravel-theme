
<!doctype html>
<html lang="it">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bootstrap Italia è un tema Bootstrap 4 per la creazione di applicazioni web nel pieno rispetto delle Linee guida di design per i servizi web della PA">
    <meta name="author" content="Team per la Trasformazione Digitale">
    <meta name="generator" content="Jekyll v3.8.5">

    <title>@yield('title_prefix', config('bootstrap-italia.title_prefix', ''))
        @yield('title', config('bootstrap-italia.title', 'Bootstrap-Italia'))
        @yield('title_postfix', config('bootstrap-italia.title_postfix', ''))</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap-italia/dist/css/bootstrap-italia.min.css') }}" rel="stylesheet">

    @yield('bootstrapitalia_css')

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('vendor/bootstrap-italia/docs/assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('vendor/bootstrap-italia/docs/assets/img/favicons/favicon-32x32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('vendor/bootstrap-italia/docs/assets/img/favicons/favicon-16x16.png') }}" sizes="16x16" type="image/png">

    <link rel="mask-icon" href="{{ asset('vendor/bootstrap-italia/docs/assets/img/favicons/safari-pinned-tab.svg') }}" color="#0066CC">
    <link rel="icon" href="{{ asset('vendor/bootstrap-italia/favicon.ico') }}">
    <meta name="msapplication-config" content="{{ asset('vendor/bootstrap-italia/docs/assets/img/favicons/browserconfig.xml') }}">
    <meta name="theme-color" content="#0066CC">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@teamdigitaleIT">
    <meta name="twitter:creator" content="Team per la Trasformazione Digitale">
    <meta name="twitter:title" content="Template vuoto">
    <meta name="twitter:description" content="Bootstrap Italia è un tema Bootstrap 4 per la creazione di applicazioni web nel pieno rispetto delle Linee guida di design per i servizi web della PA">
    <meta name="twitter:image" content="https://italia.github.io/bootstrap-italia/docs/assets/img/favicons/social-card.png">

    <!-- Facebook -->
    <meta property="og:url" content="https://italia.github.io/bootstrap-italia/docs/esempi/template-vuoto/">
    <meta property="og:title" content="Template vuoto">
    <meta property="og:description" content="Bootstrap Italia è un tema Bootstrap 4 per la creazione di applicazioni web nel pieno rispetto delle Linee guida di design per i servizi web della PA">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://italia.github.io/bootstrap-italia/docs/assets/img/favicons/social-card.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">


    <script>window.__PUBLIC_PATH__ = '{{ asset('vendor/bootstrap-italia/dist/fonts') }}'</script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
        // Disabilita tracciamento se il cookie cookies_consent non esiste
        if (document.cookie.indexOf('cookies_consent=true') === -1) {
            window['ga-disable-UA-114758441-1'] = true;
        }
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-114758441-1', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->



</head>
<body>
@yield('body')

@yield('bootstrapitalia_js')
</body>
</html>