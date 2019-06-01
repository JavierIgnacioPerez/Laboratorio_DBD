<?php

namespace App\Http\Controllers;

use App\WebpageRecord;
use Illuminate\Http\Request;

class WebpageRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webpageRecord= WebpageRecord::all();
        return $webpageRecord;
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
        $verifyWebpageRecord= WebpageRecord::find($request->id);
        if($verifyWebpageRecord ==null){

          $webpageRecord= new WebpageRecord();

          $action= $request->$action;

          if(!(is_numeric($action))){
            $webpageRecord->updateOrCreate([
              'action'=>$action
            ]);
          }
          else{
            return "Error en los parametros ingresados.";
          }
        }
        else{
          return "Error al ingresar Webpage Record, llave primaria repetida";
        }
        return WebpageRecord::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WebpageRecord  $webpageRecord
     * @return \Illuminate\Http\Response
     */
    public function show(WebpageRecord $webpageRecord)
    {
        $webpageRecord= WebpageRecord::fin($id);

        if($webpageRecord==null){
          return "No se ha encontrado el Webpage Record buscado.";
        }
        else{
          return $webpageRecord;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WebpageRecord  $webpageRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(WebpageRecord $webpageRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WebpageRecord  $webpageRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebpageRecord $webpageRecord)
    {
        $verifyWebpageRecord = WebpageRecord::find($request->id);

        if($verifyWebpageRecord != null){

          $webpageRecord= new WebpageRecord();

          $action= $request->$action;

          if (!(is_numeric($action))){
            $webpageRecord->updateOrCreate([
              'id'=>$request->id
            ],
            [
              'action'=>$action
            ]);
          }
          else{
            return "Error en los parametros ingresados.";
          }
        }
        else{
          return "Error al actualizar Webpage Record, llave primaria no existe.";
        }
        return WebpageRecord::all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WebpageRecord  $webpageRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebpageRecord $webpageRecord)
    {
        $webpageRecord= WebpageRecord::find($id);
        if($webpageRecord == null){
          return "no he encontrado el Webpage Record a eliminar.";
        }
        else{
          $webpageRecord->delete();
          return "se ha eliminado el Webpage Record";
        }
    }
}
