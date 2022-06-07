@extends('auth.layouts.master')
@isset($category)
    @section('title' , 'Редакитирвоание категории: '. $category->name)
@else
    @section('title' , 'Добавление категории')
@endisset
@section('content')
<div class="category-list-block">
    <h1 class="category-list-block-label">
        @isset($category)
            Редактирование категории: {{$category->name}}
        @else
            Добавить категрию
        @endisset
    </h1>
    <div class="category-form-box">
        <form class="category-form" action="
        @isset($category)
            {{route('categories.update', $category)}}
        @else
            {{route('categories.store')}}
        @endisset
        " method="POST">
            @isset($category)
                @method('PUT')
            @endisset
            <div class="category-form-name">
              
                <label for="name">Наименование</label>
                
                <input id="name"  name="name" type="text" value="@isset($category) {{$category->name}} @endisset"> 

                @error('name')
                <div class="flash-message-admin-panel alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="category-form-name">
                <label for="code">Код</label>
                <input id="code" name="code_name" type="text" value="@isset($category) {{$category->code_name}} @endisset"> 

                @error('code_name')
                <div class="flash-message-admin-panel alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <button class="category-form-btn" type="submit">Сохранить</button> 
            </div>
            @csrf
        </form>
    </div>
</div>
@endsection   