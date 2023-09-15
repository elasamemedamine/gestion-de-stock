<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
     public function __construct()
     {
            $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view("managements.categories.index")->with([
         "categories"=> Category::paginate(5)
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
        return view("managements.categories.create");
            
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //validation
        $this->validate($request, [
            "title" => "required|min:3"
        ]);
        //store data
        $title = $request->title;
        Category::create([
            "title" => $title,
            "slug" => Str::slug($title)
        ]);
        //redirect user
        return redirect()->route("categories.index")->with([
            "success" =>"categorie ajoutee avec succes"
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view("managements.categories.edit")->with([
            "category" =>$category
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        
        //validation
        $this->validate($request, [
            "title" => "required|min:3"
        ]);
        //store data
        $title = $request->title;
        $category->update([
            "title" => $title,
            "slug" => Str::slug($title)
        ]);
        //redirect user
        return redirect()->route("categories.index")->with([
            "success" =>"categorie modifié avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        //redirect user
        return redirect()->route("categories.index")->with([
            "success" =>"categorie supprimée avec succés"
        ]);
    }
}
