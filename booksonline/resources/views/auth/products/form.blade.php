@extends('auth.layouts.master')
@isset($product)
    @section('title' , 'Редакитирвоание товара: '. $product->name)
@else
    @section('title' , 'Добавление товара')
@endisset
@section('content')
<div class="product-list-block">
    <h1 class="product-list-block-label">
        @isset($product)
            Редактирование товара: {{$product->name}}
        @else
            Добавить товар
        @endisset
    </h1>
    <div class="product-form-box">
        <form class="product-form" action="
        @isset($product)
            {{route('products.update', $product)}}
        @else
            {{route('products.store')}}
        @endisset
        " method="POST" enctype="multipart/form-data">
            @isset($product)
                @method('PUT')
            @endisset
            <div class="product-form-name">
                <label for="name">Наименование</label>
                <input id="name"  name="name" type="text" value="@isset($product){{$product->name}}@endisset"> 
                @error('name')
                <div class="flash-message-admin-panel alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="product-form-name">
                <label for="code">Код</label>
                <input id="code" name="code_name" type="text" value="{{old('code_name', isset($product)? $product->code_name : null)}}">
                @error('code_name')
                <div class="flash-message-admin-panel alert-danger">
                    {{$message}}
                </div>
                @enderror 
            </div>
            <div class="product-form-name">
                <label for="description">Описание</label>
                <textarea name="description" id="description" cols="30" rows="10">@isset($product){{$product->description}}@endisset</textarea>
            </div>
            <div class="product-form-name">
                <label for="author_id">Автор</label>
                <select name="author_id" id="author_id">
                    <option value="">Выберите автора</option>
                    @foreach ($authors as $author)
                        <option value="{{$author->id}}"
                            @isset($product) 
                            @if ($product->author_id == $author->id)
                                selected
                            @endif
                            @endisset
                            >{{$author->name}}</option>
                    @endforeach
                </select>
                @error('author_id')
                <div class="flash-message-admin-panel alert-danger">
                {{$message}}
                 </div>
                @enderror
                
            </div>

            <div class="product-form-name">
                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id"> 
                    <option value="">Выберите категорию</option>       
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                            @isset($product) 
                            @if ($product->category_id == $category->id)
                                selected
                            @endif
                            @endisset
                            >{{$category->name}}</option>
                    @endforeach    
                </select>
                @error('category_id')
                <div class="flash-message-admin-panel alert-danger">
                {{$message}}
                 </div>
                @enderror
            </div>

            <div class="product-form-name">
                <label for="publisher_id">Издательство</label>
                <select name="publisher_id" id="publisher_id">
                    <option value="">Выберите издательство</option>          
                    @foreach ($publishers as $publisher)
                        <option value="{{$publisher->id}}"
                            @isset($product) 
                            @if ($product->publisher_id == $publisher->id)
                                selected
                            @endif
                            @endisset
                            >{{$publisher->name}}</option>
                    @endforeach
                </select>
                @error('publisher_id')
                <div class="flash-message-admin-panel alert-danger">
                {{$message}}
                 </div>
                @enderror
            </div>

            <div class="product-form-name">
                <label for="year">Год издания</label>
                <input id="year" name="year" type="text" value="@isset($product) {{$product->year}} @endisset"> 
            </div>

            <div class="product-form-name">
                <label for="isbn">ISBN</label>
                <input id="isbn" name="isbn" type="text" value="@isset($product) {{$product->isbn}} @endisset"> 
                @error('isbn')
                <div class="flash-message-admin-panel alert-danger">
                {{$message}}
                 </div>
                @enderror
            </div>
            <div class="product-form-name">
                <label for="number_of_pages">Кол-во страниц</label>
                <input id="number_of_pages" name="number_of_pages" type="text" value="@isset($product) {{$product->number_of_pages}} @endisset"> 
            </div>

            <div class="product-form-name">
                <label for="binding">Переплёт</label>
                <input id="binding" name="binding" type="text" value="@isset($product) {{$product->binding}} @endisset"> 
            </div>

            <div class="product-form-name">
                <label for="format">Формат</label>
                <input id="format" name="format" type="text" value="@isset($product) {{$product->format}} @endisset"> 
            </div>

            <div class="product-form-name">
                <label for="weight">Вес, г</label>
                <input id="weight" name="weight" type="text" value="@isset($product) {{$product->weight}} @endisset"> 
            </div>

            <div class="product-form-name">
                <label for="rating">Возрастные ограничения</label>
                <input id="rating" name="rating" type="text" value="@isset($product) {{$product->rating}} @endisset"> 
                @error('rating')
                <div class="flash-message-admin-panel alert-danger">
                    {{$message}}
                 </div>
                @enderror 
            </div>

            <div class="product-form-name">
                <label for="img">Изображение</label>
                 @isset($product) <img src="{{ Storage::url($product->img)}}" alt="{{$product->name}}"> @endisset
                <input type="file" name="img" id="img">
                
            </div>
            <div class="product-form-name">
                <label for="price">Цена</label>
                <input id="price" name="price" type="text" value="@isset($product) {{$product->price}} @endisset">
                @error('price')
                <div class="flash-message-admin-panel alert-danger">
                    {{$message}}
                 </div>
                @enderror 
            </div>

            <div>
                <button class="product-form-btn" type="submit">Сохранить</button> 
            </div>
            @csrf
        </form>
    </div>
</div>
@endsection   