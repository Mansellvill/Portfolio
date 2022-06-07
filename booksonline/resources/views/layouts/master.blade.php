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
    <title> @yield('title')</title>
</head>
<body>
    
    <header class="header">
        <section class="header-top">
            <div class="container">
                <div class="header-menu-block">
                    <nav class="header-menu">
                        @guest
                            <a href="{{route('login')}}">Вход</a>
                        @endguest
                        @auth
                        @if (Auth::user()->isAdmin())
                            <a href="{{route('home')}}">Панель администратора</a>
                        @else
                            <a href="{{route('profil.index')}}">Профиль {{Auth::user()->name}}</a>
                            <a href="{{route('profil.orders')}}">Мои заказы</a>
                        @endif 
                            <a href="{{route('get-logout')}}">Выход</a> 
                        @endauth
                        
                    </nav>
                </div>
            </div>
        </section>
        <section class="header-center">
            <div class="container">
                <div class="header-center-block">
                    <div class="header-logo">
                        <a href="{{route('index')}}"><img src="/imgs/header/logo.png" alt="Online Bookstore"></a>    
                    </div>
                    <div class="header-search">
                        <form action="{{route('search')}}" method="POST">
                            <input class="header-search-input" type="text" placeholder="Искать здесь..." name="search">
                            <button class="header-search-button" type="submit">Поиск</button>
                            @csrf
                        </form>
                    </div>
                    <div class="header-basket">
                        <span class="cart">Моя корзина</span>
                        <span>
                            @if (!is_null(session('coll_item_backet')))
                                ({{session('coll_item_backet')}})
                            @else 
                                (Пусто)
                            @endif
                        </span>
                        <div class="header-basket-btn">
                            <span class="cart-sum">
                                @if (!is_null(session('full_order_price')))
                                {{session('full_order_price')}}
                                @else 
                                0
                                @endif
                                руб.

                            </span>
                            <a class="cart-checkout-btn" href="{{route('basket')}}">Проверить</a>
                        </div>

                    </div>
                    {{-- <div class="header-whish-list">
                        <div class="whish-list-circle"></div>
                        <div class="whish-list-text">
                            <a class="whish-list-btn" href="{{route('wishlist')}}">Избранное</a>
                            <span class="whish-list-col">20</span>  
                        </div> 
                    </div> --}}
                </div>
            </div>
        </section>
    </header>

    <main class="main">
        <div class="container">

            @if (session()->has('success'))
            <div class="message-block">
                <div class="flash-message alert-success">
                    {{session()->get('success')}}
                </div>
            </div>
            @elseif (session()->has('warning'))
                <div class="message-block">
                    <div class="flash-message alert-warning">
                        {{session()->get('warning')}}
                    </div>
                </div>
            @endif    
            
            {{-- @dump(session()) --}}
            @yield('content')
        </div>
    </main>
    
    <footer class="footer">
 
        <div class="footer-info">
            <div class="container">
                <div class="footer-info_inner">
                    <span class="footer-info-text">Copyright © 2021 Книжный интернет-магазин. Моя страница вконтакте <a target="_blank" href = "https://vk.com/mansellvill">тут</a>.</span>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>