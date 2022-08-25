<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=["name","Email","phone","addresse","product_title","price","quantity","image","product_id","user_id"];

}
