<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'code_name', 'description', 'author_id', 'category_id', 'publisher_id', 'year',
     'isbn', 'number_of_pages','binding','format','weight', 'rating', 'img', 'price'];

    public function category() {
        return $this->belongsTo(Category::class); 
    }

    public function publisher() {
        return $this->belongsTo(Publisher::class); 
    }

    public function author() {
        return $this->belongsTo(Author::class); 
    }

    public function getPriceForCount() {
        if(!is_null($this->pivot)) {
            return $this->pivot->count * $this-> price;
        }
        return $this-> price;
    }


}
