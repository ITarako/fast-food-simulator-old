<?php

namespace App\Models\Category;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
