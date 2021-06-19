<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subsubcategories(){
        return $this->hasMany(SubSubCategory::class, 'sub_category_id' );
    }

    public function products(){
        return $this->hasMany(Product::class, 'subcategory_id');
    }

}
