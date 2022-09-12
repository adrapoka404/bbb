<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'store_id', 'user_id', 'status', 'date'];

    public function format($quantity){
        return '$' . number_format($quantity, 2);
    }
}
