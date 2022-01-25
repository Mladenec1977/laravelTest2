@extends('app')

@section('content')
<div>
    <form class="row g-3 needs-validation" novalidate method="post" action="{{route('films.store')}}">
        @method('POST')
        @csrf
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
        @endif
        <div class="col-md-6">
            <label for="title" class="form-label">Название фильма</label>
            <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Описание</label>
            <input type="text" class="form-control" name="description" id="description" value="{{old('description')}}">
        </div>
        <div class="col-2">
            <label for="rating" class="form-label">Rating IMDb</label>
            <input type="number" class="form-control" name="rating" id="rating" placeholder="0">
        </div>
        <div class="col-md-5">
            <label for="inputState" class="form-label">Категория</label>
            <select id="genre_id" name="genre_id" class="form-select">
                @foreach($genre as $genreNext)
                    <option value="{{$genreNext->id}}">
                        {{$genreNext->title}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-5">
            <label for="inputState" class="form-label">Жанр</label>
            <select id="category_id" name="category_id" class="form-select">
                @foreach($category as $categoryNext)
                    <option value="{{$categoryNext->id}}">
                        {{$categoryNext->title}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="viewed" id="viewed">
                <label class="form-check-label" for="flexSwitchCheckDefault">Уже видел</label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
</div>
@endsection
