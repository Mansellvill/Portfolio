<div class="also-like-block-item">
    <img src="{{Storage::url($product->img)}}" alt="">
    <div class="also-like-book-info">
        <span class="also-like-book-name">{{$product->name}}</span>
        <span class="also-like-book-price">{{$product->price}} руб.</span>
        <span class="also-like-book-button"><a href="{{route('product', [$product->category->code_name,$product->code_name])}}">Подробнее</a></span>
    </div>
</div>