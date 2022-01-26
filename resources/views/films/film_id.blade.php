@extends('app')

@section('content')
    <div class="promo__bg" style="background-image: url({{ route('getPhoto', $film->id) }});">
        <div class="promo__genre">{{$film->genre->title}}</div>
        <div class="promo__title">{{$film->title}}</div>
        <div class="promo__descr">{{$film->description}}</div>
        <div class="promo__ratings">
            <span>IMDb: {{$film->rating}}</span>
        </div>
    </div>
    <div class="promo__interactive">
        <div>
            <div class="promo__interactive-title">ПРОСМОТРЕННЫЕ ФИЛЬМЫ</div>
            <ul class="promo__interactive-list">
                @foreach($filmViewed as $item)
                    <li class="promo__interactive-item"><a class="dropdown-item"
                                                           href="{{route('films.show', $item->id)}}">{{$item->title}}</a>
                        <div class="delete"></div>
                    </li>
                @endforeach
            </ul>
        </div>
        @auth()
            <div>
                <a class="btn btn-warning" href="{{route('films.edit', $film->id)}}">Edit</a>
            </div>
        @endauth
    </div>
@endsection
