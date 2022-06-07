@extends('auth.layouts.master')
@section('title' , 'Категории')
@section('content')
<div class="category-list-block">
    <h1 class="category-list-block-label">Категории</h1>
    <div class="category-list-table">
        <div class="category-list-table-header">
            <div class="category-list-table-header-label ">
                <span>№</span>               
            </div>

            <div class="category-list-table-header-label ">
                <span>Название</span>               
            </div>

            <div class="category-list-table-header-label ">
                <span>Код</span>               
            </div>
        </div>

        @foreach ($categories as $category)
        <div class="category-list-table-item">
            <div class="category-list-table-item-number">
                <span>{{$category->id}}</span> 
            </div>

            <div class="category-list-table-item-name">
                <span>{{$category->name}}</span>
            </div>

            <div class="category-list-table-item-code">
                <span>{{$category->code_name}}</span>
            </div>

            <div class="category-list-table-item-open">
                <a href="{{route('categories.show', $category)}}" class="category-list-table-item-btn">Открыть</a>
            </div>

            <div class="category-list-table-item-redactor">
                <a href="{{route('categories.edit', $category)}}" class="category-list-table-item-btn">Редактировать</a>
            </div>
            <form action="{{route('categories.destroy', $category)}}" method="POST">
                <div class="category-list-table-item-del">
                    @method('DELETE')
                    <button type="submit" class="category-list-table-item-btn">Удалить</button>      
                </div>
                @csrf
            </form>
            
        </div>
        @endforeach

        <div class="category-list-table-item">
            <div class="category-list-table-item-add">
                <a href="{{route('categories.create')}}" class="category-list-table-item-btn">Добавить категорию</a>
            </div>
        </div>

    </div>
</div>
@endsection      