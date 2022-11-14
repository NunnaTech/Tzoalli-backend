<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Grocer;
use App\Models\Order;


class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "visited_by",
        "visit_date",
        "status",
        "order_id",
        "category_id",
        "grocer_id"
    ];

    public function visited_by(){
        return $this->belongsTo(User::class,'visited_by','id');
    }

    public function grocer(){
        return $this->belongsTo(Grocer::class,'grocer_id','id');
    }

    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
