<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <div class="header__search">
            <form method="get" action="{{route('searchFilms')}}">
                @method('GET')
                @csrf
                <input type="text" name="search" id="search" placeholder="Поиск">
                <button><img src="../img/search.svg" alt="search"></button>
            </form>
        </div>
        <div class="header__logo">
            <img src="../img/Logotype.svg" alt="logo">
        </div>
    </header>
    <main class="promo">
        <div class="promo__menu">
            <x-left/>
        </div>
        <div class="promo__content">
            @yield('content')
        </div>
        <div class="promo__adv">
            <div class="promo__adv-title">Реклама от спонсоров</div>
            <img src="../img/content_1.jpg" alt="some picture">
            <img src="../img/content_2.jpg" alt="some picture">
            <img src="../img/content_3.png" alt="some picture">
        </div>
    </main>
</body>
</html>
