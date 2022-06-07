@extends('layouts.master')
@section('title' , 'Заказ № ' . $order->id)
@section('content')
<div class="category-list-block">
    <h1 class="category-list-block-label">Заказ № {{$order->id}}</h1>
  
    <div class="order-label">
        <span>Контактное лицо</span>
    </div>
    <div class="order-info-block">
        <div class="order-card-label">
            <span>ФИО: {{$order->full_name}}</span>
        </div>
        <div class="order-card-label">
            <span>Телефон: {{$order->phone}}</span>
        </div>
        <div class="order-card-label">
            <span>E-mail: {{$order->email}}</span>
        </div>
    </div>
    
    <div class="order-label">
        <span>Состав заказа</span>
    </div>
    <div class="chekout-table">
        <div class="chekout-table-header">
            <div class="chekout-table-header-label ">
                <span>Книга</span>               
            </div>

            <div class="chekout-table-header-label ">
                <span>Цена</span>               
            </div>

            <div class="chekout-table-header-label ">
                <span>Количество</span>               
            </div>

            <div class="chekout-table-header-label ">
                <span>Итого</span>               
            </div>
        </div>

        @foreach ($order->products as $product)
        <div class="chekout-table-item">
            <div class="chekout-table-item-name">
                <img src="{{Storage::url($product->img)}}" alt="{{$product->name}}" alt="{{$product->name}}">
                <div class="chekout-table-item-label">
                    <span><a href="{{route('product', [$product->category->code_name, $product->code_name])}}">{{$product->name}}</a></span>
                </div>
            </div>
            <div class="chekout-table-item-price">
                <span>{{$product->price}} руб.</span>
            </div>
            <div class="chekout-item-quantity">
                <span>{{$product->pivot->count}} шт.</span>
            </div>
            <div class="chekout-table-item-price">
                <span>{{$product->getPriceForCount()}} руб.</span>
            </div>
        </div>
        @endforeach
    </div>

    <div class="order-label">
        <span>Итого к оплате:</span>
        <span>{{$order->getFullPrice()}} руб.</span>
    </div>
</div>
@endsection   