<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Even_cambiosController extends Controller
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
        if ($request->pad1.$request->pad2.$request->pad3==$request->padron){
            $padant=$request->padant;
        }else{
            $padant=$request->padron;
        }
        DB::connection('merc20xx')->table('eventual')
            ->where("id",$request->id)
            ->update([
                "pad1"=>$request->pad1==null?'':$request->pad1,
                "pad2"=>$request->pad2==null?'':$request->pad2,
                "pad3"=>$request->pad3==null?'':$request->pad3,
                "padron"=>$request->pad1.$request->pad2.$request->pad3,
                "paterno"=>$request->paterno==null?'':$request->paterno,
                "materno"=>$request->materno==null?'':$request->materno,
                "ap_esposo"=>$request->ap_esposo==null?'':$request->ap_esposo,
                "nombres"=>$request->nombres==null?'':$request->nombres,
                "carnet"=>$request->carnet==null?'':$request->carnet,
                "fono"=>$request->fono==null?'':$request->fono,
                "domicilio"=>$request->domicilio==null?'':$request->domicilio,
                "ruc"=>$request->ruc==null?'':$request->ruc,
                "fecha_inic"=>$request->fecha_inic==null?'':$request->fecha_inic,
                "gest"=>$request->gest==null?'':$request->gest,
                "codigo"=>$request->codigo==null?'':$request->codigo,
                "tipo_pues"=>$request->tipo_pues==null?'':$request->tipo_pues,
                "ancho"=>$request->ancho==null?'':$request->ancho,
                "largo"=>$request->largo==null?'':$request->largo,
                "observ"=>$request->observ==null?'':$request->observ,
                "padant"=>$padant,
                "dias"=>$request->dias==null?'':$request->dias,
                "ubicacion"=>$request->ubicacion==null?'':$request->ubicacion,
            ]);
        DB::connection('merc20xx')->table('even_cambios')->insert([
            "form23"=>$request->form23==null?'':$request->form23,
            "pad1"=>$request->pad1==null?'':$request->pad1,
            "pad2"=>$request->pad2==null?'':$request->pad2,
            "pad3"=>$request->pad3==null?'':$request->pad3,
            "paterno"=>$request->paterno==null?'':$request->paterno,
            "materno"=>$request->materno==null?'':$request->materno,
            "ap_esposo"=>$request->ap_esposo==null?'':$request->ap_esposo,
            "nombres"=>$request->nombres==null?'':$request->nombres,
            "carnet"=>$request->carnet==null?'':$request->carnet,
            "fono"=>$request->fono==null?'':$request->fono,
            "domicilio"=>$request->domicilio==null?'':$request->domicilio,
            "ruc"=>$request->ruc==null?'':$request->ruc,
            "fecha_inic"=>$request->fecha_inic==null?'':$request->fecha_inic,
            "gest"=>$request->gest==null?'':$request->gest,
            "codigo"=>$request->codigo==null?'':$request->codigo,
            "tipo_pues"=>$request->tipo_pues==null?'':$request->tipo_pues,
            "ancho"=>$request->ancho==null?'':$request->ancho,
            "largo"=>$request->largo==null?'':$request->largo,
            "observ"=>$request->observ==null?'':$request->observ,
            "padron"=>$request->padron==null?'':$request->padron,
            "padant"=>$request->padant==null?'':$request->padant,
            "compr"=>$request->compr==null?'':$request->compr,
            "ubicacion"=>$request->ubicacion==null?'':$request->ubicacion,
            "dias"=>$request->dias==null?'':$request->dias,
            "tipo"=>$request->tipo==null?'':$request->tipo,
            "oper"=>$request->user()->username,
            "fecha"=>now(),
            "hora"=>now(),
        ]);
    }

    public function bajaeventual(Request $request){

        DB::connection('merc20xx')->table('eventual')
            ->where("id", $request->id)
            ->update([
                "hab" => 1
            ]);

        DB::connection('merc20xx')->table('even_bajas')->insert([
            "form23" => $request->form23 == null ?0 : $request->form23,
            "resoladm"=>$request->resoladm==null?'':$request->resoladm,
            "pad1" => $request->pad1 == null ? '' : $request->pad1,
            "pad2" => $request->pad2 == null ? '' : $request->pad2,
            "pad3" => $request->pad3 == null ? '' : $request->pad3,
            "paterno" => $request->paterno == null ? '' : $request->paterno,
            "materno" => $request->materno == null ? '' : $request->materno,
            "ap_esposo" => $request->ap_esposo == null ? '' : $request->ap_esposo,
            "nombres" => $request->nombres == null ? '' : $request->nombres,
            "carnet" => $request->carnet == null ? '' : $request->carnet,
            "fono" => $request->fono == null ? '' : $request->fono,
            "domicilio" => $request->domicilio == null ? '' : $request->domicilio,
            "ruc" => $request->ruc == null ? '' : $request->ruc,
            "oper" => $request->user()->username,
            "fecha" => now(),
            "hora" => now(),
            "fecha_inic" => $request->fecha_inic == null ? '' : $request->fecha_inic,
            "gest" => $request->gest == null ? '' : $request->gest,
            "codigo" => $request->codigo == null ? '' : $request->codigo,
            "tipo_pues" => $request->tipo_pues == null ? '' : $request->tipo_pues,
            "ubicacion" => $request->ubicacion == null ? '' : $request->ubicacion,
            "ancho" => $request->ancho == null ? '' : $request->ancho,
            "largo" => $request->largo == null ? '' : $request->largo,
            "observ" => $request->observ == null ? '' : $request->observ,
            "padron" => $request->padron == null ? '' : $request->padron,
            "padant" => $request->padant == null ? '' : $request->padant,
            "dias" => $request->dias == null ? '' : $request->dias,
            "compr" => $request->compr == null ? 0 : $request->compr,

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
        return DB::connection('merc20xx')->table('even_cambios')
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
