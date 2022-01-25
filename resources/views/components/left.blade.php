<nav class="promo__menu-list">
    <ul>
        <li><a class="promo__menu-item" href="/">Все</a></li>
        @foreach($arrayGenre as $item)
            {{--                <li><a class="promo__menu-item promo__menu-item_active" href="#">Фильмы</a></li>--}}
            <li><a class="promo__menu-item" href="{{route('homeGenre', $item->id)}}">{{ $item->title }}</a></li>
        @endforeach
    </ul>
</nav>
