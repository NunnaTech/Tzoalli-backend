<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    protected $table = 'evidences';
    use HasFactory;

    public function observation()
    {
        return $this->belongsTo(Observation::class);
    }
}
