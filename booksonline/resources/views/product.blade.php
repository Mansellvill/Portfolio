@extends('layouts.master')
@section('title', 'Товар')
@section('content')
            <div class="product-block">
                <article class="address-bar"> 
                    <a href="{{route('index')}}">Главная</a> /
                    <a href="{{route('category', $product->category->code_name)}}">{{$product->category->name}}</a> /
                    {{$product->name}}
                </article>
                <section class="product-main-info-block">
                    <img class="product-img" src="{{Storage::url($product->img)}}" alt="book">
                    <div class="product-main-info">
                        <div class="product-name">
                            <span>
                                {{$product->name}}
                            </span>
                        </div>
                        <div class="product-description">
                            <span>
                                {{$product->description}}
                            </span>
                        </div>
                        <div class="product-buy-block">
                            <div class="product-buy-container">
                                <div class="product-price-container">
                                    <div class="block-price">
                                        <span class="buy-label">
                                            Наша цена:
                                        </span>
            
                                        <span class="buy-price">
                                            {{$product->price}} руб.
                                        </span>
                                    </div>

                                    {{-- <div class="block-discount">
                                        <span>Оригинальная цена: {{$product->price}} руб. Скидка 20%</span>  
                                    </div>   --}}
                                </div>

                                <div class="button-container">
                                    <form action="{{route('basket-add', $product)}}" method="POST">
                                        <button type="submit">В корзину</button>
                                        @csrf
                                    </form>
                                </div>
                            </div>

                            {{-- <div class="product-status-container">
                                <span class="state-label">Статус:</span><span class="state-true">В наличии</span>
                            </div> --}}
                            
                        </div>
                    </div>
                </section>
				
				<section class="product-other-info">
					<div class="product-other-info-left-block">
						<div class="product-info">
							<span class="product-info-label">Информация о книге</span>
							<div class="product-info-container">
								<div class="product-variable-block">
                                    <div class="product-item variable">
                                        <span> ID товара:</span>
                                    </div>
                                    <div class="product-item variable">
                                        <span>Автор:</span>
                                    </div>
                                    <div class="product-item variable">
                                        <span>Категория</span>
                                    </div>
                                    <div class="product-item variable">
                                        <span>Издательство:</span>
                                    </div>
                                    <div class="product-item variable">
                                        <span>Год издания:</span>
                                    </div>
                                    <div class="product-item variable">
                                        <span>ISBN:</span>
                                    </div>
                                    <div class="product-item variable">
                                        <span>Кол-во страниц:</span>
                                    </div>
                                    <div class="product-item variable">
                                        <span>Переплёт:</span>
                                    </div>
                                    <div class="product-item variable">
                                        <span>Формат:</span>
                                    </div>
                                    <div class="product-item variable">
                                        <span>Вес, г:</span>
                                    </div>
                                    <div class="product-item variable">
                                        <span>Возрастные ограничения:</span>
                                    </div>
                                </div>
                                <div class="product-data-block">
                                    <div class="product-item">
                                        <span>{{$product->id}}</span>
                                    </div>
                                    <div class="product-item">
                                        <span>{{$product->author->name}}</span>
                                    </div>
                                    <div class="product-item">
                                        <span>{{$product->category->name}}</span>
                                    </div>
                                    <div class="product-item">
                                        <span>{{$product->publisher->name}}</span>
                                    </div>
                                    <div class="product-item">
                                        <span>{{$product->year}}</span>
                                    </div>
                                    <div class="product-item">
                                        <span>{{$product->isbn}}</span>
                                    </div>
                                    <div class="product-item">
                                        <span>{{$product->number_of_pages}}</span>
                                    </div>
                                    <div class="product-item">
                                        <span>{{$product->binding}}</span>
                                    </div>
                                    <div class="product-item">
                                        <span>{{$product->format}}</span>
                                    </div>
                                    <div class="product-item">
                                        <span>{{$product->weight}}</span>
                                    </div>
                                    <div class="product-item">
                                        <span>{{$product->rating}}</span>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
					<div class="product-other-info-right-block">
                        <span class="also-like-block-label">Вам также может понравиться</span>
                        @foreach ($randomProducts as $product)
                            @include('cardProduct', compact('product')) 
                         @endforeach
					</div>
				</section>
				
            </div>
</body>
</html>
@endsection