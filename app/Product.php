<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['code','name','price','category_id','description','image'];
//    public function getCategory()
//    {
//       return Category::find($this->category_id);
//    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function getPriceForCount(){

        return $this->pivot->count * $this->price;
    }
}
