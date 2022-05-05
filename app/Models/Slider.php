<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'small_tittle',
        'big_tittle',
        'big_sub_tittle',
        'slider_discription',
        'slider_photo',
        'del_price',
        'sell_price',
    ];
}
