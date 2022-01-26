@extends('app')

@section('content')
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Photo</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">IMDb:</th>
                <th scope="col">Просмотреный</th>
                <th scope="col">Жанр</th>
                <th scope="col">Категория</th>
                @auth()
                <th scope="col">Ред</th>
                <th scope="col">Del</th>
                @endauth
            </tr>
            </thead>
            <tbody>
            @foreach($films as $item)
            <tr>
                <th scope="row"><img src="{{ route('getPhoto', $item->id) }}" class="img-fluid" alt="film" width="100px"></th>
                <td><a class="dropdown-item" href="{{route('films.show', $item->id)}}">{{$item->title}}</a></td>
                <td>{{$item->description}}</td>
                <td>{{$item->rating}}</td>
                @if ($item->viewed == 1)
                    <td>Да</td>
                @else
                    <td>Нет</td>
                @endif
                    <td>{{$item->genre->title}}</td>
                    <td>{{$item->category->title}}</td>
                @auth()
                    <td><a class="btn btn-warning" href="{{route('films.edit', $item->id)}}">Edit</a></td>
                    <td>
                        <form method="post" action="{{route('films.destroy', $item->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">X</button>
                        </form>
                    </td>
                @endauth
            </tr>
            @endforeach
            @auth()
                <tr>
                    <th scope="row">#</th>
                    <td><a class="dropdown-item" href="{{route('films.create')}}">Добавить</a></td>
                </tr>
            @endauth
            </tbody>
        </table>
    </div>
@endsection
