@extends('auth.layouts.master')
@section('title' , 'Список товаров')
@section('content')
<div class="prduct-list-block">
    <h1 class="product-list-block-label">Список товаров</h1>
    <div class="product-list-table">
        <div class="product-list-table-header">
            <div class="product-list-table-header-label ">
                <span>№</span>               
            </div>

            <div class="product-list-table-header-label ">
                <span>Код</span>               
            </div>

            <div class="product-list-table-header-label ">
                <span>Название</span>               
            </div>

            <div class="product-list-table-header-label ">
                <span>Категория</span>               
            </div>

            <div class="product-list-table-header-label ">
                <span>Цена</span>               
            </div>
        </div>

        @foreach ($products as $product)
            <div class="product-list-table-item">
                <div class="product-list-table-item-number">
                    <span>{{$product->id}}</span> 
                </div>
                <div class="product-list-table-item-code">
                    <span>{{$product->code_name}}</span>
                </div>

                <div class="product-list-table-item-name">
                    <span>{{$product->name}}</span>
                </div>

                <div class="product-list-table-item-category">
                    <span>{{$product->category->name}}</span>
                </div>

                <div class="product-list-table-item-price">
                    <span>{{$product->price}}</span>
                </div>

                <div class="product-list-table-item-open">
                    <a href='{{route('products.show', $product)}}' class="product-list-table-item-btn">Открыть</a>
                </div>

                <div class="product-list-table-item-redactor">
                    <a href="{{route('products.edit', $product)}}" class="product-list-table-item-btn">Редактировать</a>
                </div>

                <form action="{{route('products.destroy', $product)}}" method="POST">
                    <div class="product-list-table-item-del">
                        @method('DELETE')
                        <button type="submit" class="product-list-table-item-btn">Удалить</button>      
                    </div>
                    @csrf
                </form>
            </div>
        @endforeach

        <div class="product-list-table-item">
            <div class="product-list-table-item-add">
                <a href="{{route('products.create')}}" class="category-list-table-item-btn">Добавить товар</a>
            </div>
        </div>
    </div>
</div>
@endsection      