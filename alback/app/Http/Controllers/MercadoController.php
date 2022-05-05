<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MercadoController extends Controller
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
        $padron=str_replace('-','',$request->padron);
//        return $padron;
        $eventual= DB::connection("merc20xx")->table("eventual")->where('padron',$padron)->get();
        if (count($eventual)>0){
            return trim($eventual[0]->paterno).' '.trim($eventual[0]->materno).' '.trim($eventual[0]->nombres).' EVENTUAL';
        }else{
            $formal= DB::connection("merc20xx")->table("formales")->where('padron',$padron)->get();

            if (count($formal)>0){
                return trim($formal[0]->paterno).' '.trim($formal[0]->materno).' '.trim($formal[0]->nombres).' FORMAL ';
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($padron)
    {
        $month = strtotime("1991-01-01");
        $end = strtotime(date('Y-m-d', strtotime("-1 year")));
        $gestiones=array();
        while($month <= $end) {
//            echo date('y', $month)."----- <br>";
            $query=DB::connection('bases')->table('lidgme'.date('y', $month))->where('padron',$padron);
            if ($query->count()>0){
//                echo date('y',$month)."---<br>";
//                array_push($gestiones,['gestion'=>date('Y',$month)]);
                array_push($gestiones,$query->get()->first());
            }
            $month = strtotime("+1 year", $month);
        }
        return $gestiones;
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
