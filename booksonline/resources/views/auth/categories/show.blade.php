@extends('auth.layouts.master')
@section('title' , 'Категория: '. $category->name)
@section('content')
<div class="category-list-block">
    <h1 class="category-list-block-label">Категория: {{$category->name}}</h1>
    <div class="category-cart-box">
        <div class="category-cart-main-block">
            <div class="category-cart-left">
                <div class="category-cart-item">
                    <span>Наименование:</span>
                </div>
                <div class="category-cart-item">
                    <span>Код:</span>
                </div>

                <div class="category-cart-item">
                    <span>Кол-во товаров:</span>
                </div>

            </div>
            <div class="category-cart-right">
                <div class="category-cart-item">
                    <span>{{$category->name}}</span>
                </div>
                <div class="category-cart-item">
                    <span>{{$category->code_name}}</span>
                </div>
                <div class="category-cart-item">
                    <span>{{$category->products->count()}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection   