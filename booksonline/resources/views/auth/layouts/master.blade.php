<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/style-admin-panel.css">

    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/SegoeUI.css">
    <link rel="stylesheet" href="/css/SegoeWP.css">
    <title>@yield('title')</title>
</head>
<body>
    <header class="header">
        <section class="header-top">
            <div class="container">
                <div class="header-menu-block">
                    <nav class="header-menu">

                        <a href="{{route('home')}}">Заказы</a>
                        <a href="{{route('products.index')}}">Товары</a>
                        <a href="{{route('categories.index')}}">Категории</a>
                        <a href="{{route('publishers.index')}}">Изадтельства</a>
                        <a href="{{route('authors.index')}}">Авторы</a>
                        <a href="{{route('index')}}">Вернутся на сайт</a>
                        <a href="{{route('get-logout')}}">Выход</a>
                    </nav>
                </div>
            </div>
        </section>
    </header>

    <main class="main">
        <div class="container">
            @yield('content')
        </div>
    </main>
    
    <footer class="footer">
        <div class="footer-info">
            <div class="container">
                <div class="footer-info_inner">
                    <span class="footer-info-text">Copyright © 2021 book-online. Моя страница вконтакте <a target="_blank" href = "https://vk.com/mansellvill">тут</a>.</span>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>