<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchivoController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($padron)
    {
        $query=DB::connection('indcom')->table('natur')->where('npadron',$padron)->get();
        //        return $query[0];
        //        exit;
        if ($query->count()>0){
//            return $query->first();
            $q=$query->first();
            $nombre=$q->paterno.' '.$q->materno.' '.$q->nombre.' <br><b>Direc:</b>'.$q->ndireccion.'<span class=" badge badge-success">Natural</span>';
            $re['nombre']=$nombre;
            $re['tipo']='natur';
            $re['gest']=$q->gest;
            return $re;
//            $q=DB::table('pmjucont')->where('comun',$comun)->first();
//            return $q->paterno.' '.$q->materno.' '.$q->nombre.' <span class="badge badge-warning">J</span>';
        }else{
            $q=DB::connection('indcom')->table('jurid')->where('jpadron',$padron)->get()->first();
            $nombre=$q->razon.' <br><b>Direc:</b>'.$q->jdireccion.' <br><b>Repre:</b>'.$q->nomreplega.'<span class=" badge badge-warning">Juridico</span>';
//            $nombre=$q->paterno.' '.$q->materno.' '.$q->nombre.' '.$q->ndireccion.'<span class=" badge badge-success">Natural</span>';
            $re['nombre']=$nombre;
            $re['tipo']='jurid';
            $re['gest']=$q->gest;
            return $re;
//            $q = DB::table('pm01cont')->where('comun',$comun)->first();
//            return $q->paterno.' '.$q->materno.' '.$q->nombre.' <span class="badge badge-success">N</span>';
        }
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
