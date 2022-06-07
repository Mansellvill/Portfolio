@extends('layouts.master')
@section('title', 'Мои заказы')
@section('content')
<div class="order-list-block">
    <h1 class="order-list-block-label">Мой профиль</h1>
    <div class="order-info-block">
        <div class="order-card-label">
            <span>ФИО: {{$user->full_name}}</span>
        </div>
        <div class="order-card-label">
            <span>Телефон: {{$user->phone}}</span>
        </div>
        <div class="order-card-label">
            <span>E-mail: {{$user->email}}</span>
        </div>
        <div class="order-card-label">
            <span>Дата регистрации: {{$user->created_at->format('d.m.Y H:i')}}</span>
        </div>
        <div class="profil-edit">
            <a href="{{route('profil.edit')}}" class="profil-edit-btn">Редактировать</a>
        </div>
          
    </div>
</div>
@endsection      