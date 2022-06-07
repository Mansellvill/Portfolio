<div class="block-book-container ">
    <div class="block-book">
        <a href="{{route('product', [$product->category->code_name,$product->code_name])}}">
            <img class="block-book-img" src="{{Storage::url($product->img)}}" alt="book1">
            <div class="block-book-name">
                {{Str::limit($product->name, 16)}}
            </div>
            
            <div class="block-book-price">
                {{$product->price}} руб.
            </div>
        </a>
    </div>

{{-- <div class="discount-label">
        <span class="discount-label-icon">-30%</span>
    </div>
    --}} 
</div>