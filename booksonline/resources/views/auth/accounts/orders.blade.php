@extends('layouts.master')
@section('title', 'Мои заказы')
@section('content')
<div class="order-list-block">
    <h1 class="order-list-block-label">Заказы</h1>
    <div class="order-list-table">
        <div class="order-list-table-header">
            <div class="order-list-table-header-label ">
                <span>№</span>               
            </div> 
            <div class="order-list-table-header-label ">
                <span>Пользователь</span>               
            </div> 
            <div class="order-list-table-header-label ">
                <span>Сумма</span>               
            </div> 
            <div class="order-list-table-header-label ">
                <span>Время заказа</span>               
            </div>
        </div> 
        
   

        @foreach ($orders as $order)
            <div class="order-list-table-item">
                <div class="order-list-table-item-number">
                    <span>{{$order->id}}</span> 
                </div>
                <div class="order-list-table-item-name">
                  <span>{{$order->user->name}}</span> 
                </div> 
                <div class="order-list-table-item-price">
                    <span>{{$order->getFullPrice()}} руб.</span>
                </div>

                <div class="order-list-table-item-data">
                    <span>{{$order->created_at->format('d.m.Y H:i')}}</span>
                </div> 
                <div class="order-list-table-item-open">
                    <a href="{{route('profil.order.show', $order)}}" class="order-list-table-item-btn">Открыть</a>
                </div>
            </div>  
        @endforeach
    </div>
</div>
@endsection      