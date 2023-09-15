<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Livreurs;

use App\Models\Stock;
use App\Models\Tarif;



use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sales = Sales::orderBy("created_at", "DESC")->paginate(10);
        return view("sales.index")->with([
            "sales" => $sales
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSalesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesRequest $request)
    {
        //
        //validation
        $this->validate($request, [
            "stock_id" => "required",
            "tarif_id" => "required",
            "livreur_id" => "required",
            "quantity" => "required|numeric",
            "total_price" => "required|numeric",
            "total_received" => "required|numeric",
            "change" => "required|numeric",
            "payment_type" => "required",
            "payment_status" => "required",
        ]);
        //store data
        $sale = new Sales();
        $sale->livreur_id = $request->livreur_id;
        $sale->quantity = $request->quantity;
        $sale->total_price = $request->total_price;
        $sale->total_received = $request->total_received;
        $sale->change = $request->change;
        $sale->payment_status = $request->payment_status;
        $sale->payment_type = $request->payment_type;
        $sale->save();
        $sale->tarifs()->sync($request->tarif_id);
        $sale->stock()->sync($request->stock_id);
        //redirect user
        return redirect()->back()->with([
            "success" => "Paiement effectué avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales, $id)
    {
        //
        //get sale to update
        $sales = Sales::findOrFail($id);
        //get sale tables
        $stock = $sales->stock()->where('sales_id', $sales->id)->get();
        //get table menus
        $tarifs = $sales->tarifs()->where('sales_id', $sales->id)->get();
        return view("sales.edit")->with([
            "stock" => $stock,
            "tarifs" => $tarifs,
            "sale" => $sales,
            "livreurs" => livreurs::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesRequest  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesRequest $request, Sales $sales, $id)
    {
        //
        //validation
        $this->validate($request, [
            "stock_id" => "required",
            "tarif_id" => "required",
            "livreur_id" => "required",
            "quantity" => "required|numeric",
            "total_price" => "required|numeric",
            "total_received" => "required|numeric",
            "change" => "required|numeric",
            "payment_type" => "required",
            "payment_status" => "required",
        ]);
        //get sale to update
        $sale = Sales::findOrFail($id);
        //update data
        $sale->livreur_id = $request->livreur_id;
        $sale->quantity = $request->quantity;
        $sale->total_price = $request->total_price;
        $sale->total_received = $request->total_received;
        $sale->change = $request->change;
        $sale->payment_status = $request->payment_status;
        $sale->payment_type = $request->payment_type;
        $sale->update();
        $sale->tarifs()->sync($request->tarif_id);
        $sale->stock()->sync($request->stock_id);
        //redirect user
        return redirect()->back()->with([
            "success" => "Paiement modifié avec succés"
        ]);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales, $id)
    {
        //
        //get sale to update
        $sale = Sales::findOrFail($id);
        //delete sales
        $sale->delete();
        //redirect user
        return redirect()->back()->with([
            "success" => "Paiement supprimé avec succés"
        ]);
         
    }
}
