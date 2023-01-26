<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Saukele' }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="/img/logo.svg" type="image/x-icon">
</head>

<body>
    <div id="app" class="bg-white app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container flex-column">
                <div class="d-flex w-100 align-center justify-content-around">
                    <div class="phone-div d-flex align-center justify-content-center">
                        <div class="phone-text text-center">
                            <a href="tel:+79620473900" class="text-black decoration-none">+7(962)047-39-00</a>
                            <a href="tel:+79620473900" class="text-black">Обратная связь</a>
                        </div>
                    </div>
                    <div class="img-toggler d-flex justify-content-around">
                        <a class="d-none phone" href="tel:+79620473900"><img src="/img/phone.svg" alt="phone"></a>
                        <a class="navbar-brand me-0" href="{{ url('/') }}">
                            <img class="logo" src="/img/logo.svg" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse top_collapse d-none-mobile" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <div class="navbar-nav">
                            <div class="nav-item">
                                <a class="nav-link" href="https://vk.com/saukele_omsk">
                                    <img class="vk" src="/img/vk.svg" alt="">
                                </a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="{{route('busket')}}">
                                    <img class="busket" src="/img/busket.svg" alt="">
                                </a>
                            </div>
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <div class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><img class="auth" src="/img/person.svg" alt="{{ __('Login') }}"></a>
                            </div>
                            @endif
                            @else
                            <div class="nav-item">
                                <div class="d-flex">
                                    <a class="nav-link text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <img class="logout" src="/img/logout.svg" alt="">
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse navbarSupportedContentTwo w-100" id="navbarSupportedContent">
                    <div class="navbar-nav navbar-mobile w-100">
                        <div class="navbar-nav navbar-mobile-nav d-flex justify-content-around">
                            <div class="nav-item">
                                <a class="nav-link mobile text-black" href="{{route('index')}}">Главная</a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link mobile text-black" href="{{route('katalog')}}">Каталог</a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link mobile text-white" href="#about">О нас</a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link mobile text-white" href="#about">Контакты</a>
                            </div>
                        </div>
                        <div class="navbar-nav d-none-desktop">
                            <div class="nav-item">
                                <a class="nav-link" href="https://vk.com/saukele_omsk">
                                    <img class="vk" src="/img/vk.svg" alt="">
                                </a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="{{route('busket')}}">
                                    <img class="busket" src="/img/busket.svg" alt="">
                                </a>
                            </div>
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <div class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><img class="auth" src="/img/person.svg" alt="{{ __('Login') }}"></a>
                            </div>
                            @endif
                            @else
                            <div class="nav-item">
                                <div class="d-flex">
                                    <a class="nav-link text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <img class="logout" src="/img/logout.svg" alt="">
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <div class="container">
                <div class="d-flex flex-wrap justify-content-around footer-partners">
                    <div class="d-flex justify-content-center d-none-desktop">
                        <a class="d-none-desktop partner1" href="">
                            <img src="/img/omby-kazaktar-mini.svg" width="210px" height="113px" alt="Спонсор">
                        </a>
                    </div>
                    <div class="d-flex justify-content-center mb-4">
                        <a href="{{ url('/') }}">
                            <img src="/img/logo.svg" alt="Лого">
                        </a>
                    </div>
                    <div class="d-flex justify-content-center partner2-div">
                        <a class="d-none d-none-mobile w-mobile partner1-mobile me-auto" href="">
                            <img src="/img/omby-kazaktar-mini.svg" alt="Спонсор">
                        </a>
                        <a class="w-mobile partner2" href="">
                            <img src="/img/KO-mini.svg" alt="Спонсор">
                        </a>
                    </div>
                </div>
                <div class="footer-menu d-flex flex-wrap justify-content-between mt-5">
                    <div class="desctop mobile d-flex flex-wrap justify-content-around w-50">
                        <div class="d-flex flex-column">
                            <a class=" text text-black decoration-none text1rem" href="">Главная</a>
                            <a class="mt-3 text text-black decoration-none text1rem" href="">Каталог</a>
                        </div>
                        <div class="d-flex flex-column">
                            <a class=" text text-black decoration-none text1rem" href="">О нас</a>
                            <a class="mt-3 text text-black decoration-none text1rem" href="">Контакты</a>
                        </div>
                        <div class="d-flex flex-column">
                            <a class=" text text-black decoration-none text1rem white-text" href="">Корзина</a>
                            <a class="mt-3 text text-black decoration-none text1rem white-text" href="">Профиль</a>
                        </div>
                    </div>
                    <div class="desctop mobile d-flex flex-wrap justify-content-around w-50 mt-3">
                        <div class="d-flex flex-column">
                            <a class=" text text-white decoration-none text1rem black-text" href="">+7(962)047-39-00</a>
                            <a class="mt-3 text text-white decoration-none text1rem black-text" href="">kuho007@mail.ru</a>
                        </div>
                        <div class="d-flex flex-column">
                            <a class=" text text-white decoration-none text1rem" href="">Ул.Ленина 38 оф.401</a>
                            <a class="mt-3 text text-white decoration-none text1rem" href="">Вконтакте</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>