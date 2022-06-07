@extends('auth.layouts.master')
@section('title' , 'Товар: '. $product->name)
@section('content')
<div class="product-list-block">
    <h1 class="product-list-block-label">Товар: {{$product->name}}</h1>
    <div class="product-cart-box">
        <div class="product-cart-main-block">

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>ID товара:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->id}}</span>
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Наименование:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->name}}</span>
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Код:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->code_name}}</span>
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Описание:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->description}}</span>
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Автор:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->author->name}}</span>
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Категория:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->category->name}}</span>
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Издательство:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->publisher->name}}</span>
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Год издания:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->year}}</span>
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>ISBN:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->isbn}}</span>
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Кол-во страниц:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->number_of_pages}}</span>
                    </div>
                </div>
            </div>
            
            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Переплёт:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->binding}}</span>
                    </div>
                </div>
            </div>
            
            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Формат:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->format}}</span>
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Вес, г:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->weight}}</span>
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Возрастные ограничения:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->rating}}</span>
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Изображение:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <img src="{{ Storage::url($product->img)}}" alt="{{$product->name}}">
                    </div>
                </div>
            </div>

            <div class="product-cart-item-box">
                <div class="product-cart-left">
                    <div class="product-cart-item">
                        <span>Цена:</span>
                    </div>
                </div>

                <div class="product-cart-right">
                    <div class="product-cart-item">
                        <span>{{$product->price}} руб.</span>
                    </div>
                </div>
            </div>



{{--
          
     </div>
                <div class="product-cart-item">
                    <span>{{$product->isbn}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->number_of_pages}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->binding}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->format}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->weight}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->rating}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->price}}</span>




                <div class="product-cart-item">
                    <span>Возрастные ограничения:</span>
                </div>
                <div class="product-cart-item">
                    <span>Цена:</span>
                </div>
                <div class="product-cart-item">
                    <span>Изображение:</span>
                </div>

            </div>
            <div class="product-cart-right">
                <div class="product-cart-item">
                    <span>{{$product->id}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->name}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->code_name}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->description}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->author}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->category->name}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->publisher}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->year}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->isbn}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->number_of_pages}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->binding}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->format}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->weight}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->rating}}</span>
                </div>
                <div class="product-cart-item">
                    <span>{{$product->price}}</span>
                </div>
                <div class="product-cart-item">
                    <img src="/imgs/books/{{$product->img}}" alt="{{$product->name}}">
                </div>

            </div>--}}
           
        </div>
    </div>
</div>
@endsection   