@extends('auth.layouts.master')
@section('title' , 'Издательства')
@section('content')
<div class="category-list-block">
    <h1 class="category-list-block-label">Издательства</h1>
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

        @foreach ($publishers as $publisher)
        <div class="category-list-table-item">
            <div class="category-list-table-item-number">
                <span>{{$publisher->id}}</span> 
            </div>

            <div class="category-list-table-item-name">
                <span>{{$publisher->name}}</span>
            </div>

            <div class="category-list-table-item-code">
                <span>{{$publisher->code_name}}</span>
            </div>

            <div class="category-list-table-item-open">
                <a href="{{route('publishers.show', $publisher)}}" class="category-list-table-item-btn">Открыть</a>
            </div>

            <div class="category-list-table-item-redactor">
                <a href="{{route('publishers.edit', $publisher)}}" class="category-list-table-item-btn">Редактировать</a>
            </div>
            <form action="{{route('publishers.destroy', $publisher)}}" method="POST">
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
                <a href="{{route('publishers.create')}}" class="category-list-table-item-btn">Добавить издательство</a>
            </div>
        </div>

    </div>
</div>
@endsection      