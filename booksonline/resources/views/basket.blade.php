@extends('layouts.master')
@section('title', 'Корзина')
@section('content')
<div class="cart-block">
    <span class="cart-block-label">Моя корзина</span>
    <div class="cart-table">
        <div class="cart-table-header">
            <div class="cart-table-header-label ">
                <span>Книга</span>               
            </div>

            <div class="cart-table-header-label ">
                <span>Цена</span>               
            </div>

            <div class="cart-table-header-label ">
                <span>Количество</span>               
            </div>

            <div class="cart-table-header-label ">
                <span>Итого</span>               
            </div>
        </div>

        @foreach ($order->products as $product)
        <div class="cart-table-item">
            <div class="cart-table-item-name">
                <img src="{{Storage::url($product->img)}}" alt="{{$product->name}}">
                <div class="cart-table-item-label">
                    <span><a href="{{route('product', [$product->category->code_name, $product->code_name])}}">{{$product->name}}</a> </span>
                </div>
            </div>
            <div class="cart-table-item-price">
                <span>{{ $product->price}} руб.</span>
            </div>

            <div class="cart-item-quantity">
                <input type="number" name="" id="" min="1" max="99" value="{{$product->pivot->count}}">
            </div>
            <div class="cart-table-item-price">
                <span>{{$product->getPriceForCount()}} руб.</span>
            </div>
            <div class="cart-table-item-delite">
                <form action="{{route('basket-remove', $product)}}" method="POST">
                    <button class="cart-table-item-dell">x</button>
                    @csrf
                </form>        
            </div>
        </div>
        @endforeach
    </div>

    <div class="cart-checkout-block">
        <div class="cart-total-price">
            <span class="cart-total-price-label">Итоговая цена: </span><span class="cart-total-price-inner">{{$order->getFullPrice()}} руб.</span>
        </div>
        <div class="cart-buy-button">
            <a href="{{route('basket-checkout')}}">Оформить заказ</a>
        </div>
    </div>
</div>
@endsection