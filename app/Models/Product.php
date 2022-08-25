<?php

namespace App\Models;

use App\Http\Requests\CategoryRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{  
    use HasFactory;
    protected $fillable=["title","description","image","price","quantity","cat_id","discount_price"];
    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
