<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'code_name'];

    public function products() {
        return $this->hasMany(Product::class); 
    }

    public function getCategories() {
        return Category::get();
    }

}
