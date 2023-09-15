<?php

namespace App\Http\Controllers;

use App\Models\Livreurs;
use App\Http\Requests\StoreLivreursRequest;
use App\Http\Requests\UpdateLivreursRequest;

class LivreursController extends Controller
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
        return view("managements.livreurs.index")->with([
            "livreurs" => Livreurs::paginate(5)
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
        return view("managements.livreurs.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLivreursRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLivreursRequest $request)
    {
        //
        //validation
        $this->validate($request, [
            "name" => "required|min:3"
        ]);
        //store data
        Livreurs::create([
            "name" => $request->name,
            "telephone" => $request->telephone
        ]);
        //redirect user
        return redirect()->route("livreurs.index")->with([
            "success" => "livreur ajouté avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livreurs  $livreurs
     * @return \Illuminate\Http\Response
     */
    public function show(Livreurs $livreurs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livreurs  $livreurs
     * @return \Illuminate\Http\Response
     */
    public function edit(Livreurs $livreurs, $id)
    {
        //
        return view("managements.livreurs.edit")->with([
            "livreurs" => Livreurs::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLivreursRequest  $request
     * @param  \App\Models\Livreurs  $livreurs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLivreursRequest $request, Livreurs $livreurs, $id)
    {
        //
        //validation
        $this->validate($request, [
            "name" => "required|min:3"
        ]);
        //update data
        $livreurs = Livreurs::findOrFail($id);
        $livreurs->update([
            "name" => $request->name,
            "telephone" => $request->telephone
        ]);
        //redirect user
        return redirect()->route("livreurs.index")->with([
            "success" => "livreur modifié avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livreurs  $livreurs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livreurs $livreurs, $id)
    {
        //
        $livreurs = Livreurs::findOrFail($id);
        $livreurs->delete();
        //redirect user
        return redirect()->route("livreurs.index")->with([
            "success" => "livreur supprimé avec succés"
        ]);
    }
}
