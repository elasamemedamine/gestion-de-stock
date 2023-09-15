<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use Illuminate\Support\Str;

class StockController extends Controller
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
        return view("managements.stock.index")->with([
            "stock" => Stock::paginate(5)
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
        return view("managements.stock.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStockRequest $request)
    {
        //
        //validation
        $this->validate($request, [
            "name" => "required|unique:stock,name",
            "status" => "required|boolean"
        ]);
        //store data
        $name = $request->name;
        Stock::create([
            "name" => $name,
            "slug" => Str::slug($name),
            "status" => $request->status,
        ]);
        //redirect user
        return redirect()->route("stock.index")->with([
            "success" => "stock ajoutée avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
        return view("managements.stock.edit")->with([
            "stock" => $stock
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockRequest  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStockRequest $request, Stock $stock)
    {
        //
         //validation
         //validation
        $this->validate($request, [
            "name" => "required|unique:stock,name," . $stock->id,
            "status" => "required|boolean"
        ]);
        //store data
        $name = $request->name;
        $stock->update([
            "name" => $name,
            "slug" => Str::slug($name),
            "status" => $request->status,
        ]);
        //redirect user
        return redirect()->route("stock.index")->with([
            "success" => "stock modifiée avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
        $stock->delete();
        //redirect user
        return redirect()->route("stock.index")->with([
            "success" => "stock supprimée avec succés"
        ]);
    }
    
}
