<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\Category;

use Illuminate\Support\Str;

use App\Http\Requests\StoreTarifRequest;
use App\Http\Requests\UpdateTarifRequest;

class TarifController extends Controller
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
        return view("managements.tarifs.index")->with([
            "tarifs" => Tarif::paginate(5)
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
        return view("managements.tarifs.create")->with([
            "categories" => Category::all()
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTarifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTarifRequest $request)
    {
        //
        //validation
        $this->validate($request, [
            "title" => "required|min:3|unique:tarifs,title",
            "description" => "required",
            "image" => "required|image|mimes:png,jpg,jpeg|max:2048",
            "price" => "required|numeric",
            "category_id" => "required|numeric",
        ]);
        //store data
        if ($request->hasFile("image")) {
            $file = $request->image;
            $imageName = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/tarifs'), $imageName);
            $title = $request->title;
            Tarif::create([
                "title" => $title,
                "slug" => Str::slug($title),
                "description" =>  $request->description,
                "price" =>  $request->price,
                "category_id" =>  $request->category_id,
                "image" =>  $imageName,
            ]);
            //redirect user
            return redirect()->route("tarifs.index")->with([
                "success" => "tarif ajouté avec succés"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function show(Tarif $tarif)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarif $tarif)
    {
        //
        return view("managements.tarifs.edit")->with([
            "categories" => Category::all(),
            "tarif" => $tarif
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTarifRequest  $request
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTarifRequest $request, Tarif $tarif)
    {
        //
        //validation
        $this->validate($request, [
            "title" => "required|min:3|unique:tarifs,title," . $tarif->id,
            "description" => "required|min:5",
            "image" => "image|mimes:png,jpg,jpeg|max:2048",
            "price" => "required|numeric",
            "category_id" => "required|numeric",
        ]);
        //store data
        if ($request->hasFile("image")) {
            unlink(public_path('images/tarifs/' . $tarif->image));
            $file = $request->image;
            $imageName = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/tarifs'), $imageName);
            $title = $request->title;
            Tarif::create([
                "title" => $title,
                "slug" => Str::slug($title),
                "description" =>  $request->description,
                "price" =>  $request->price,
                "category_id" =>  $request->category_id,
                "image" =>  $imageName,
            ]);
            //redirect user
            return redirect()->route("tarifs.index")->with([
                "success" => "tarif modifié avec succés"
            ]);
        } else {
            $title = $request->title;
            $tarif->update([
                "title" => $title,
                "slug" => Str::slug($title),
                "description" =>  $request->description,
                "price" =>  $request->price,
                "category_id" =>  $request->category_id
            ]);
            //redirect user
            return redirect()->route("tarifs.index")->with([
                "success" => "tarif modifié avec succés"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarif $tarif)
    {
        //
        //remove image
        unlink(public_path('images/tarifs/' . $tarif->image));
        $tarif->delete();
        //redirect user
        return redirect()->route("tarifs.index")->with([
            "success" => "tarif supprimé avec succés"
        ]);
    }
}
