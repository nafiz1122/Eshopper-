<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Product extends Model
{
    protected $fillable = [
       'category_id','brand_id','product_name','product_short_des','product_long_des','product_price','product_size','product_color','product_status',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function brand(){

    return $this->belongsTo(Brand::class);

    }
}
