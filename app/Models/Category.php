<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Category extends Model
{
    use HasFactory, SoftDeletes;

    //memasukkan data ke dalam skema/table database , bisa dilihat melalu ERD
    protected $fillable=[ 
        'name',
        'slug',
        'icon',
    ];

    public function setNameAttribute($value){
        $this->attributes['name']=$value;
        $this->attributes['slug']=Str::slug($value);
    }

    //table relationship with another table
    public function recipes():HasMany{
        return $this->hasMany(Recipe::class);
    }
}
