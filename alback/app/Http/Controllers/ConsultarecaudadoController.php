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
        }elseif ($request->tipo=='IC'){
            return DB::select("
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic95 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic96 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic97 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic98 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic99 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic00 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic01 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic02 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic03 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic04 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic05 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic06 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic07 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic08 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic09 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic10 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic11 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic12 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic13 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic14 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic15 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic16 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic17 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic18 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic19 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic20 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgic21 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'

            ");
        }elseif ($request->tipo=='MERCADOS'){
            return DB::select("
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme92 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme93 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme94 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme95 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme96 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme97 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme98 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme99 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme00 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme01 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme02 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme03 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme04 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme05 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme06 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme07 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme08 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme09 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme10 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme11 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme12 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme13 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme14 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme15 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme16 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme17 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme18 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme19 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme20 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
UNION
SELECT padron,control ,gestion,fech_pago,imp_pagar FROM bases.lidgme21 WHERE date(fech_pago)>='".$request->inicio."' AND date(fech_pago)<='".$request->fin."'
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
