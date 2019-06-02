<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_category = ProductCategory::all();
        return $product_category;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Se busca la id ingresada, en caso de no existir arroja null.
        $verifyProductCategory = ProductCategory::find($request->id);

		if($verifyProductCategory == null){

			// Se instancia un objeto del modelo
            $productCategory = new ProductCategory();

            $product_id = $request->product_id;
            $category_id = $request->category_id;

            // En caso de pasar las validaciones se crea la nueva fila en la tabla.
            ProductCategory::create([
                
                'product_id' => $product_id,
                'category_id' => $category_id

            ]);
        }

        else{
            return "Error al ingresar ProductoCategoria, llave primaria repetida.";
        }

        // Se muestran todos el contenido de la tabla Restaurant.
        return ProductCategory::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory  $ProductCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        
        if($productCategory == null){
            return "No se ha encontrado el ProductoCategoria buscado.";
        }
        else{
            return $productCategory;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $ProductCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $ProductCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        // Se busca la id ingresada, en caso de no existir arroja null.
        $verifyProductCategory = ProductCategory::find($request->id);

		if($verifyProductCategory!= null){

			// Se instancia un objeto del modelo
            $productCategory = new ProductCategory();

            $product_id = $request->product_id;
            $category_id = $request->category_id;
                
            // En caso de pasar las validaciones se crea la nueva fila en la tabla.
            $productCategory->updateOrCreate(
            [

                'id' => $request->id
            ],
            
            [
                'product_id' => $product_id,
                'category_id' => $category_id,

            ]);
        }
        
        else{
            return "Error al actualizar ProductoCategoria, llave primaria no existe.";
        }

        // Se muestran todos el contenido de la tabla Restaurant.
        return ProductCategory::all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $ProductCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        // Si la id no existe en la tabla, se avisa al usuario.
        if($productCategory == null){
            return "No se ha encontrado el ProductoCategoria a eliminar.";
        }
        // Si la id existe en la tabla, se elimina.
        else{
            $productCategory->delete();
            return "Se ha eliminado un ProductoCategoria.";
        }
    }
}
