<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
  protected $fillable=['category_id','name','code','image','price','sale_price','description'];
  public function category(){ return $this->belongsTo(Category::class); }
  public function getDisplayPriceAttribute(){
    return $this->sale_price ?? $this->price;
  }
}

