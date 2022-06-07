@extends('layouts.master')
@section('title', 'Избранное')
@section('content')
<div class="wish-list-block">
    <span class="wish-list-block-label">Избранное</span>
    <div class="wish-list-table">
        <div class="wish-list-table-header">
            <div class="wish-list-table-header-label ">
                <span>Книга</span>               
            </div>

            <div class="wish-list-table-header-label ">
                <span>Цена</span>               
            </div>

            <div class="wish-list-table-header-label ">
                <span>Статус</span>               
            </div>
        </div>

        <div class="wish-list-table-item">
            <div class="wish-list-table-item-name">
                <img src="imgs/books/book1.jpg" alt="">
                <div class="wish-list-table-item-label">
                    <span>50 правил умной дуры</span>
                </div>
            </div>
            <div class="wish-list-table-item-price">
                <span>200 руб.</span>
            </div>
            <div class="wish-list-table-item-status">
                <span class="state-false">Нет в наличии</span>
            </div>
            <div class="wish-list-table-item-add">
                <button class="wish-list-table-item-btn">В корзину</button>
            </div>
            <div class="wish-list-table-item-delite">
                <button class="wish-list-table-item-dell">x</button>
            </div>
        </div>

    </div>
</div>
@endsection