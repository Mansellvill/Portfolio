@extends('auth.layouts.master')
@isset($publisher)
    @section('title' , 'Редакитирвоание издательства: '. $publisher->name)
@else
    @section('title' , 'Добавить издательство')
@endisset
@section('content')
<div class="category-list-block">
    <h1 class="category-list-block-label">
        @isset($publisher)
            Редактирование издательства: {{$publisher->name}}
        @else
            Добавить издательство
        @endisset
    </h1>
    <div class="category-form-box">
        <form class="category-form" action="
        @isset($publisher)
            {{route('publishers.update', $publisher)}}
        @else
            {{route('publishers.store')}}
        @endisset
        " method="POST">

            @isset($publisher)
                @method('PUT')
            @endisset
            <div class="category-form-name">
                <label for="name">Наименование</label>
                <input id="name"  name="name" type="text" value="@isset($publisher) {{$publisher->name}} @endisset"> 
                @error('name')
                <div class="flash-message-admin-panel alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="category-form-name">
                <label for="code">Код</label>
                <input id="code" name="code_name" type="text" value="@isset($publisher) {{$publisher->code_name}} @endisset"> 
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