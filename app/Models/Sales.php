<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [
        "user_id", "quantity", "total_price",
        "total_received", "change", "payment_type", "payment_status"
    ];

    public function Tarifs()
    {
        return $this->belongsToMany(Tarif::class);
    }

    public function Stock()
    {
        return $this->belongsToMany(Stock::class);
    }

    public function livreurs()
    {
        return $this->belongsTo(Livreurs::class);
    }
}
