@extends('layouts.master')
@section('title' , 'Главная')
@section('content')
<div class="main-center-block">   
    <nav class="main-center-block-categories">
        <span class="main-center-block-categories-heading">Категории</span>
        @foreach ($сategory as $item)
            @include('cardCategories', compact('item')) 
        @endforeach
    </nav>

    <section class="main-center-block-books">
        <div class="main-center-block-books-tabs-block">
            <input type="radio" name="inset" value="" id="tab_1" checked>
            <label for="tab_1">Новинки</label>
            {{-- <input type="radio" name="inset" value="" id="tab_2">
            <label for="tab_2">Новинки</label>
            <input type="radio" name="inset" value="" id="tab_3">
            <label for="tab_3">Специальные предложения</label> --}}
         
            <div class="main-center-block-books-tab" id="txt_1">    
                <div class="main-center-block-books-container"> 
                    @foreach ($products as $product)
                        @include('card', compact('product')) 
                    @endforeach
                </div>
               
                <div class="menu-pages-block">
                    {{$products->links('layouts.paginate')}}
                </div>
            </div>

            {{-- <div class="main-center-block-books-tab" id="txt_2">
                22
            </div>
            <div class="main-center-block-books-tab" id="txt_3">
               33
            </div> --}}
        </div>
    </section>
</div>  
@endsection