<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Siarhei Aulas">
        <meta name="author" content="Vitali Mechinski">
	<meta name="description" content="@yield('meta_description', '"DarkSky@Belastro.Net - интерактивная карта для астрономов-любителей. Поиск мест с темным небом в Беларуси: фильтр по засветке, рельефу и доступности. Сообщество для обмена локациями')">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'DarkSky@Belastro.Net') }}</title>
	<meta property="og:title" content="@yield('title', config('app.name', 'DarkSky@Belastro.Net'))">
	<meta property="og:description" content="@yield('meta_description', 'DarkSky@Belastro.Net - интерактивная карта наблюдательных площадок для любителей астрономии')">
	<meta property="og:type" content="website">
	<meta property="og:url" content="{{ url()->current() }}">
	<meta property="og:image" content="{{ asset('img/og-image.png') }}">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--Своя CSS-->
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <!--WYSIWYG-->
	@auth()
        <script src="https://cdn.tiny.cloud/1/h5bg17bncqtbj1tvtaz3rzghm4qdyeyb65f5kd5jo56j5j9e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	@endauth
        <!--Favicon-->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon/favicon.ico')}}">
        <!--
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon/favicon_16x16.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon/favicon_32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/favicon/favicon_96x96.png')}}">
        <link rel="icon" type="image/png" sizes="120x120" href="{{asset('img/favicon/favicon_120x120.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('img/favicon/favicon_192x192.png')}}">
        <link sizes="72x72" rel="apple-touch-icon" href="{{asset('img/favicon/favicon_72x72.png')}}">
        <link sizes="144x144" rel="apple-touch-icon" href="{{asset('img/favicon/favicon_144x144.png')}}">
        <link sizes="180x180" rel="apple-touch-icon" href="{{asset('img/favicon/favicon_180x180.png')}}">
        -->
    
    </head>
    <body class="bg-light">
            @yield('content')
	<script>
document.addEventListener('DOMContentLoaded', function() {
    const aside = document.getElementById('filtersAside');
        if (!aside) {
        return;
    }
    const toggleBtn = document.createElement('button');
    toggleBtn.className = 'toggle-filters-btn';
    toggleBtn.id = 'toggleFilters';
    toggleBtn.innerHTML = '🔍 Показать фильтры';
    document.body.appendChild(toggleBtn);
        const overlay = document.createElement('div');
    overlay.className = 'overlay';
    document.body.appendChild(overlay);
    function openFilters() {
        aside.classList.add('show');
        overlay.classList.add('show');
        toggleBtn.innerHTML = '✖ Закрыть фильтры';
        document.body.style.overflow = 'hidden';
    }
        function closeFilters() {
        aside.classList.remove('show');
        overlay.classList.remove('show');
        toggleBtn.innerHTML = '🔍 Показать фильтры';
        document.body.style.overflow = '';
    }
    toggleBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
                if (aside.classList.contains('show')) {
            closeFilters();
        } else {
            openFilters();
        }
    });
        overlay.addEventListener('click', function() {
        closeFilters();
    });
        document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && aside.classList.contains('show')) {
            closeFilters();
        }
    });
    let touchStartY = 0;
        aside.addEventListener('touchstart', function(e) {
        touchStartY = e.touches[0].clientY;
    });
        aside.addEventListener('touchmove', function(e) {
        if (!aside.classList.contains('show')) return;
                const touchEndY = e.touches[0].clientY;
        if (touchEndY - touchStartY > 50) {
            e.preventDefault();
            closeFilters();
        }
    });
        aside.addEventListener('click', function(e) {
        e.stopPropagation();
    });
    function checkMobile() {
        if (window.innerWidth > 768) {
            aside.classList.remove('show');
            aside.style.position = 'static';
            overlay.classList.remove('show');
            toggleBtn.style.display = 'none';
            document.body.style.overflow = '';
        } else {
            aside.style.position = 'fixed';
            toggleBtn.style.display = 'block';
        }
    }
        checkMobile();
    window.addEventListener('resize', function() {
        checkMobile();
        if (window.innerWidth > 768 && aside.classList.contains('show')) {
            closeFilters();
        }
    });
    if (window.innerWidth <= 768) {
        aside.classList.remove('show');
    }
});
</script>
    </body>
</html>
