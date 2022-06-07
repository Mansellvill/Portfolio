<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['name', 'code_name'];

    public function products() {
        return $this->hasMany(Product::class); 
    }
}


