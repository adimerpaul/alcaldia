<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultarecaudadoController extends Controller
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
        if ($request->tipo=='TASAS'){
            return DB::select("
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi92 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi93 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi94 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi95 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi96 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi97 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi98 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi99 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi00 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi01 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi02 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi03 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi04 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi05 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi06 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi07 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi08 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi09 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi10 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi11 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi12 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi13 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi14 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi15 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi16 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi17 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi18 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi19 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi20 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
UNION
SELECT comun,cantidad ,gest,fecha,Pagado FROM tasas20xx.archi21 a WHERE date(fecha)>='".$request->inicio."' AND date(fecha)<='".$request->fin."'
            ");
        }
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
        //
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
