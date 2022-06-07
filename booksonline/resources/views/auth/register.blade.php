@extends('layouts.master')
@section('title' , 'Регистрация')
@section('content')
    <div class="register-menu-block">
        <div class="register-block">
            <form class="register-form" method="POST"  action="{{route('register')}}">
                @csrf  
                <h1>Регистрация</h1>
                <div class="register-form-email">
                    <label for="name" class="uname"> Ваш логин</label>
                    <input id="name" name="name" type="text" value="" required>
                    @error('name')
                        <div class="flash-message-admin-panel alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div> 
                <div class="register-form-email">
                    <label for="email" class="uname"> Ваш e-mail</label>
                    <input id="email" name="email" type="email" value="" required>
                    @error('email')
                    <div class="flash-message-admin-panel alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="register-form-password">
                    <label for="password" class="youpasswd">Ваш пароль</label>
                    <input id="password" name="password"  type="password" required>
                    @error('password')
                    <div class="flash-message-admin-panel alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="register-form-password">
                    <label for="password-confirmed" class="youpasswd">Введите пароль еще раз</label>
                    <input id="password-confirmed" name="password-confirmed" type="password" required >
                    @error('password-confirmed')
                    <div class="flash-message-admin-panel alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="register-form-buttons">
                    <div class="register-form-btn-log">
                        <button type="submit">Регистрация</button>
                    </div>
                    <div class="register-form-reg">
                        <span>Зарегистрированы?</span>
                        <a href="{{route('login')}}" class="register-form-btn-reg">Вход</a>
                    </div>
                </div> 
                        
            </form>
        </div>
    </div>
@endsection