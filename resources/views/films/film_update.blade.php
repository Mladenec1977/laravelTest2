@extends('app')

@section('content')
    <div>
        <form class="row g-3 needs-validation" novalidate method="post" action="{{route('films.update', $film->id)}}">
            @method('PATCH')
            @csrf
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
            <div class="col-md-6">
                <label for="title" class="form-label">Название фильма</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$film->title}}">
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">Описание</label>
                <input type="text" class="form-control" name="description" id="description"
                       value="{{$film->description}}">
            </div>
            <div class="col-2">
                <label for="rating" class="form-label">Rating IMDb</label>
                <input type="number" class="form-control" name="rating" id="rating" placeholder="{{$film->rating}}"
                       value="{{$film->rating}}">
            </div>
            <div class="col-md-5">
                <label for="inputState" class="form-label">Категория</label>
                <select id="genre_id" name="genre_id" class="form-select">
                    @foreach($genre as $genreNext)
                        <option value="{{$genreNext->id}}" @if($genreNext->id == $film->genre_id) selected @endif>
                            {{$genreNext->title}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5">
                <label for="inputState" class="form-label">Жанр</label>
                <select id="category_id" name="category_id" class="form-select">
                    @foreach($category as $categoryNext)
                        <option value="{{$categoryNext->id}}"
                                @if($categoryNext->id == $film->category_id) selected @endif>
                            {{$categoryNext->title}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name="viewed" id="viewed"
                           @if($film->viewed == 1) checked @endif>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Уже видел</label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </form>
        @if(isset($film->photo))
            <br>
            <h2>PHOTO</h2>
            <br>
            <img src="{{ route('getPhoto', $film->id) }}" class="img-fluid" alt="film" width="25%">
        @endif
        <form enctype="multipart/form-data" method="post" action="{{route('addPhoto', $film->id)}}">
            @method('POST')
            @csrf
            <p></p>
            <p>Загрузите ваши фотографии на сервер</p>
            <p><input type="file" name="photo" multiple accept="image/*,image/jpeg">
                <input type="submit" value="Отправить"></p>
        </form>
    </div>
@endsection
