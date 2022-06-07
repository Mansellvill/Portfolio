@extends('auth.layouts.master')
@section('title' , 'Категория: '. $author->name)
@section('content')
<div class="category-list-block">
    <h1 class="category-list-block-label">Автор: {{$author->name}}</h1>
    <div class="category-cart-box">
        <div class="category-cart-main-block">
            <div class="category-cart-left">
                <div class="category-cart-item">
                    <span>Имя:</span>
                </div>
                <div class="category-cart-item">
                    <span>Код:</span>
                </div>

                {{--<div class="category-cart-item">
                    <span>Кол-во товаров:</span>
                </div>--}}

            </div>
            <div class="category-cart-right">
                <div class="category-cart-item">
                    <span>{{$author->name}}</span>
                </div>
                <div class="category-cart-item">
                    <span>{{$author->code_name}}</span>
                </div>
                {{--<div class="category-cart-item">
                    <span>{{$publisher->products->count()}}</span>
                </div>
                --}}
            </div>
        </div>
    </div>
</div>
@endsection   