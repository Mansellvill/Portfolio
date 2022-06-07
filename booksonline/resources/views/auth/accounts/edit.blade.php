@extends('layouts.master')
@section('title', 'Мои заказы')
@section('content')
<div class="order-list-block">
    <h1 class="order-list-block-label">Мой профиль</h1>
    <div class="category-form-box">
        <form class="category-form" action="{{route('profil.update')}}" method="POST">
            <div class="category-form-name">
                <label for="full_name">ФИО</label>
                <input id="full_name" name="full_name" type="text" value="@isset($user){{$user->full_name}}@endisset"> 
                @error('full_name')
                    <div class="flash-message-admin-panel alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="category-form-name">
                <label for="phone">Телефон</label>
                <input id="phone"  name="phone" type="text" value="@isset($user){{$user->phone}}@endisset">
                @error('phone')
                <div class="flash-message-admin-panel alert-danger">
                    {{$message}}
                </div>
            @enderror 
            </div>

            <div class="category-form-name">
                <label for="email">Email</label>
                <input id="email"  name="email" type="email" value="@isset($user){{$user->email}}@endisset"> 
                @error('email')
                <div class="flash-message-admin-panel alert-danger">
                    {{$message}}
                </div>
            @enderror
            </div>
            <div>
                <button type="submit" class="product-form-btn">Сохранить</button>
            </div>
            @csrf
        </form>
    </div>

</div>
@endsection      