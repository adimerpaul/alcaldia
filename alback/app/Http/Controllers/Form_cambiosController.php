<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Form_cambiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
//        return $request;
        DB::connection('merc20xx')->table('formales')
            ->where("padron",$request->padron)
            ->update([
            "pad1"=>$request->pad1,
            "pad2"=>$request->pad2,
            "pad3"=>$request->pad3,
            "paterno"=>$request->paterno,
            "materno"=>$request->materno,
            "ap_esposo"=>$request->ap_esposo,
            "nombres"=>$request->nombres,
            "carnet"=>$request->carnet,
            "fono"=>$request->fono,
            "domicilio"=>$request->domicilio,
            "ruc"=>$request->ruc,
            "fecha_inic"=>$request->fecha_inic,
            "gest"=>$request->gest,
            "codigo"=>$request->codigo,
            "tipo_pues"=>$request->tipo_pues,
            "ancho"=>$request->ancho,
            "largo"=>$request->largo,
            "observ"=>$request->observ,
            "padant"=>$request->padant,
        ]);
        DB::connection('merc20xx')->table('form_cambios')->insert([
            "form23"=>$request->form23,
            "pad1"=>$request->pad1,
            "pad2"=>$request->pad2,
            "pad3"=>$request->pad3,
            "paterno"=>$request->paterno,
            "materno"=>$request->materno,
            "ap_esposo"=>$request->ap_esposo,
            "nombres"=>$request->nombres,
            "carnet"=>$request->carnet,
            "fono"=>$request->fono,
            "domicilio"=>$request->domicilio,
            "ruc"=>$request->ruc,
            "fecha_inic"=>$request->fecha_inic,
            "gest"=>$request->gest,
            "codigo"=>$request->codigo,
            "tipo_pues"=>$request->tipo_pues,
            "ancho"=>$request->ancho,
            "largo"=>$request->largo,
            "observ"=>$request->observ,
            "padron"=>$request->padron,
            "padant"=>$request->padant,
            "compr"=>$request->compr,
            "tipo"=>$request->tipo,
            "oper"=>$request->user()->username,
            "fecha"=>now(),
            "hora"=>now(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        return "a";
        return DB::connection('merc20xx')->table('form_cambios')
            ->whereDate('fecha','>=',$request->inicio)
            ->whereDate('fecha','<=',$request->fin)
            ->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
