<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function products(){
        return $this->belongsToMany(
            Product::class, //Table relationship
            'order_details', //Table private o intersection
            'order_id', //to
            'product_id', //from
        );
    }
}
