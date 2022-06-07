@extends('auth.layouts.master')
@isset($author)
    @section('title' , 'Редакитирвоание автора: '. $author->name)
@else
    @section('title' , 'Добавить автора')
@endisset
@section('content')
<div class="category-list-block">
    <h1 class="category-list-block-label">
        @isset($author)
            Редактирование автора: {{$author->name}}
        @else
            Добавить автора
        @endisset
    </h1>
    <div class="category-form-box">
        <form class="category-form" action="
        @isset($author)
            {{route('authors.update', $author)}}
        @else
            {{route('authors.store')}}
        @endisset
        " method="POST">

            @isset($author)
                @method('PUT')
            @endisset
            <div class="category-form-name">
                <label for="name">Имя</label>
                <input id="name"  name="name" type="text" value="@isset($author) {{$author->name}} @endisset"> 
                @error('name')
                <div class="flash-message-admin-panel alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="category-form-name">
                <label for="code">Код</label>
                <input id="code" name="code_name" type="text" value="@isset($author) {{$author->code_name}} @endisset"> 
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