@extends('layouts.master')
@section('title', 'Категория: '. $сategory->name)
@section('content')
    <div class="main-center-block">
        <nav class="main-center-block-categories">
            <span class="main-center-block-categories-heading">Категории</span>
            @foreach ($сategory->getCategories() as $item)
                @include('cardCategories', compact('сategory')) 
            @endforeach
        </nav>
       
        <section class="main-center-block-books-categories">
            <div class="main-center-block-books-categories-name">
                <span class="categories-name-text">
                    {{$сategory->name}}
                </span>
            </div>
            <div class="categories-items">
                @foreach ($products as $product)
                    @include('card', compact('product')) 
                @endforeach
            </div>
            <div class="menu-pages-block">
                {{$products->links('layouts.paginate')}}
            </div>
        </section>
    </div>
@endsection