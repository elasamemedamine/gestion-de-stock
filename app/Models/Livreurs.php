<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livreurs extends Model
{
    use HasFactory;
    protected $table = 'livreurs';

    protected $fillable = ["name", "telephone"];


    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
}
