<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'description', 'lot_id'
    ];

    public function lot()
    {
    	return $this->belongsTo(Lot::class);
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
