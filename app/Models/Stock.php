<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'Stock';
    
    protected $fillable = ["name", "status","slug"];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function sales()
    {
        return $this->belongsToMany(Sales::class);
    }
}
