@extends('layouts.app')

@section('content')
    <h1>Регистрация</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="first_name">Имя</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
            @error('first_name')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="last_name">Фамилия</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
            @error('last_name')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="middle_name">Отчество</label>
            <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name') }}">
            @error('middle_name')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="school">Школа</label>
            <input type="text" name="school" id="school" value="{{ old('school') }}" required>
            @error('school')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="grade">Класс</label>
            <input type="text" name="grade" id="grade" value="{{ old('grade') }}" required>
            @error('grade')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Подтверждение пароля</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <button type="submit">Зарегистрироваться</button>
    </form>
@endsection