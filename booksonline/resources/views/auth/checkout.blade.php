@extends('layouts.master')
@section('title', 'Оформление заказа')
@section('content')
<div class="chekout-block">
    <span class="chekout-block-label">Ваш заказ</span>
    <div class="chekout-table">
        <div class="chekout-table-header">
            <div class="chekout-table-header-label ">
                <span>Книга</span>               
            </div>

            <div class="chekout-table-header-label ">
                <span>Цена</span>               
            </div>

            <div class="chekout-table-header-label ">
                <span>Количество</span>               
            </div>

            <div class="chekout-table-header-label ">
                <span>Итого</span>               
            </div>
        </div>

        @foreach ($orders->products as $product)
        <div class="chekout-table-item">
            <div class="chekout-table-item-name">
                <img src="{{Storage::url($product->img)}}" alt="{{$product->name}}" alt="{{$product->name}}">
                <div class="chekout-table-item-label">
                    <span><a href="{{route('product', [$product->category->code_name, $product->code_name])}}">{{$product->name}}</a></span>
                </div>
            </div>
            <div class="chekout-table-item-price">
                <span>{{$product->price}} руб.</span>
            </div>
            <div class="chekout-item-quantity">
                <span>{{$product->pivot->count}} шт.</span>
            </div>
            <div class="chekout-table-item-price">
                <span>{{$product->getPriceForCount()}} руб.</span>
            </div>
        </div>
        @endforeach
    </div>


    <div class="chekout-form">
        <form action="{{route('basket-confirm')}}" method="POST">
            <div class="chekout-form-label-group">
                <span>Оформление заказа:</span>
            </div>
            <div class="chekout-form-label-group">
                <span>Контактная информация</span>
            </div>
            <div class="chekout-contack-block">
                <div class="chekout-form-block">
                    <label for="full_name">ФИО</label>
                    <input type="text" name="full_name" id="full_name" value="{{$orders->user->full_name}}">
                </div>
                <div class="chekout-form-block">
                    <label for="phone">Номер телефона</label>
                    <input type="text" name="phone" id="phone" value="{{$orders->user->phone}}"">
                </div>
                <div class="chekout-form-block">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" value="{{$orders->user->email}}">
                </div>
            </div>
        {{-- <div class="chekout-form-label-group">
                <span >Адрес доставки</span>
            </div>

            <div class="chekout-adress-box">
                <div class="chekout-adress-block">
                    <div class="chekout-form-block">
                        <label for="">Страна</label>
                        <input type="text" name="" id="">
                    </div>
                
                    <div class="chekout-form-block">
                        <label for="">Область</label>
                        <input type="text" name="" id="">
                    </div>
                
                    <div class="chekout-form-block">
                        <label for="">Город</label>
                        <input type="text" name="" id="">
                    </div>
                
                    <div class="chekout-form-block">
                        <label for="">Улица</label>
                        <input type="text" name="" id="">
                    </div>
                </div>

                <div class="chekout-adress-block">
                    <div class="chekout-form-block">
                        <label for="">Дом</label>
                        <input type="text" name="" id="">
                    </div>
                
                    <div class="chekout-form-block">
                        <label for="">Корпус</label>
                        <input type="text" name="" id="">
                    </div>
                
                    <div class="chekout-form-block">
                        <label for="">Квартира</label>
                        <input type="text" name="" id="">
                    </div>
                
                    <div class="chekout-form-block">
                        <label for="">Почтовый индекс</label>
                        <input type="text" name="" id="">
                    </div>
                </div>
            </div> 
            <div class="chekout-form-label-group">
                <span >Способо оплаты</span>
            </div>

            <div class="chekout-payment-method-box">
                <div class="chekout-payment-method-block">
                    <input type="radio" name="payment_method" id="payment_method_1" value="0">
                    <label for="payment_method_1">Онлайн</label>
                </div>
                <div class="chekout-payment-method-block">
                    <input type="radio" name="payment_method" id="payment_method_2" value="1">
                    <label for="payment_method_2">Наложенный платеж</label>
                </div>
            </div>--}} 

            <div class="chekout-form-label-group">
                <span >Подтверждение</span>
            </div>
            
            <div class="chekout-confirm-block">
                <div class="chekout-form-label-group">
                    <span class="chekout-confirm-price-label">Итого к оплате:</span>
                    <span class="chekout-confirm-price-inner">{{$orders->getFullPrice()}} руб.</span>
                </div>
                <button type="submit">Подтвердить заказ</button>
            </div>
            @csrf
        </form>
    </div>
</div>
@endsection