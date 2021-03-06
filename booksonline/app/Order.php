<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getFullPrice() {
        $sum = 0;
        foreach($this->products as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public static function changeFullPrice($cangePrice) {
        
        $sum = self::getFullPriceBasket() + $cangePrice;
        session(['full_order_price' => $sum]);
    }

    public static function getFullPriceBasket() {
        return session('full_order_price', 0);
    }

    public static function changeCollItem($col) {
        $collItem = self::get–°hangeCollItemBasket() + $col;
        if($collItem == 0 ) {
            session()->forget('coll_item_backet');
        }
        else {
            session(['coll_item_backet' => $collItem]);
        }
        
    }

    public static function get–°hangeCollItemBasket() {
        return session('coll_item_backet', 0);
    }

}
