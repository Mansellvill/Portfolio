@extends('layouts.master')
@section('title', 'Авторизация')
@section('content')

<div class="login-menu-block">
    <div class="login-block">
        <form class="login-form" action="{{route('login')}}" method="POST">
            <h1>Вход</h1>
            <div class="login-form-username">
                <label for="username" class="uname"> Ваш e-mail</label>
                <input id="email" name="email" type="email" required>
            </div>
            <div class="login-form-password">
                <label for="password" class="youpasswd" data-icon="p">Ваш пароль</label>
                <input id="password" name="password" type="password" required>
            </div>

            <div class="login-form-buttons">
                <div class="login-form-btn-log">
                    <button type="submit">Вход</button>        
                </div>
                <div class="login-form-reg">
                    <span>Не зарегистрировыны?</span>
                    <a href="{{route('register')}}" class="login-form-btn-reg">Регистрация</a>
                </div>
            </div>
            @csrf          
        </form>
    </div>
</div>
@endsection