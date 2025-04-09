@extends('layouts.app')

@section('content')
    <h1>Участие в конкурсе</h1>
    <a href="{{ route('home') }}">Просмотреть задание</a>

    @if(isset($work))
        <p>Вы уже отправили работу. Желаем удачи!</p>
        @if($work->score)
            <p>Ваш балл: {{ $work->score }}</p>
        @endif
    @else
        <form method="POST" action="{{ route('contest') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Название открытки" required>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Отправить</button>
        </form>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    @endif
@endsection