<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Werehouse extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code','status', 'user_id'];

}
