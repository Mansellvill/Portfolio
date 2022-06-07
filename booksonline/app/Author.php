<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'code_name'];

    public function products() {
        return $this->hasMany(Product::class); 
    }
}
