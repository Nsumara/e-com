<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function parent(){
        return $this->belongsTo(Categories::class,'category_id');
    }
    public function subcategories()
    {
        return $this->hasMany(Categories::class, 'category_id');
    }
}
