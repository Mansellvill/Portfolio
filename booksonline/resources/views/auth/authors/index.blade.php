@extends('auth.layouts.master')
@section('title' , 'Авторы')
@section('content')
<div class="category-list-block">
    <h1 class="category-list-block-label">Авторы</h1>
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

        @foreach ($authors as $author)
        <div class="category-list-table-item">
            <div class="category-list-table-item-number">
                <span>{{$author->id}}</span> 
            </div>

            <div class="category-list-table-item-name">
                <span>{{$author->name}}</span>
            </div>

            <div class="category-list-table-item-code">
                <span>{{$author->code_name}}</span>
            </div>

            <div class="category-list-table-item-open">
                <a href="{{route('authors.show', $author)}}" class="category-list-table-item-btn">Открыть</a>
            </div>

            <div class="category-list-table-item-redactor">
                <a href="{{route('authors.edit', $author)}}" class="category-list-table-item-btn">Редактировать</a>
            </div>
            <form action="{{route('authors.destroy', $author)}}" method="POST">
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
                <a href="{{route('authors.create')}}" class="category-list-table-item-btn">Добавить автора</a>
            </div>
        </div>

    </div>
</div>
@endsection      