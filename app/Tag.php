<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   protected $fillable = ['name'];

   public function product()
   {
       return $this->belongsToMany('CodeCommerce\Product');
   }

    public function scopeOfTag($query, $type){
        return $query->whereHas('products.category', function($q) use ($type){
            $q->where('id', '=', $type);
        });
    }
}
