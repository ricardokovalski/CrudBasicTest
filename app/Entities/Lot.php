<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $fillable = [
        'code'
    ];

    public function categories()
    {
    	return $this->hasMany(Category::class);
    }
}
