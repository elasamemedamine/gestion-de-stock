<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use App\Models\Category;
use App\Models\Livreurs;
use App\Models\Tarif;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index()
    {
        return view("payments.index")->with([
            "stock" => Stock::all(),
            "categories" => Category::all(),
            "livreurs" => Livreurs::all(),
            "tarifs" => Tarif::all(),
        ]);
    }
    
}
