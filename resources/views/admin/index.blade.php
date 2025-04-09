@extends('layouts.app')

@section('content')
    <h1>Панель администратора</h1>
    <table>
        <thead>
            <tr>
                <th>ФИО</th>
                <th>Школа</th>
                <th>Класс</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Изображение</th>
                <th>Балл</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($works as $work)
                <tr>
                    <td>{{ $work->user->last_name }} {{ $work->user->first_name }} {{ $work->user->middle_name }}</td>
                    <td>{{ $work->user->school }}</td>
                    <td>{{ $work->user->grade }}</td>
                    <td>{{ $work->title }}</td>
                    <td>{{ $work->category->title }}</td>
                    <td>
                        <a href="{{ Storage::url($work->path_img) }}" target="_blank">Просмотр</a>
                        <a href="{{ route('admin.download', $work) }}">Скачать</a>
                    </td>
                    <td>
                        @if($work->score)
                            {{ $work->score }}
                        @else
                            <form action="{{ route('admin.score', $work) }}" method="POST">
                                @csrf
                                <input type="number" name="score" min="0" max="100" required>
                                <button type="submit">Оценить</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection