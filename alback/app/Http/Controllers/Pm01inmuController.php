<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pm01inmuController extends Controller
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
        $month = strtotime("1992-01-01");
        $end = strtotime(date('Y-m-d', strtotime("-1 year")));
        $gestiones=array();
        $dat=DB::table('pm01inmu')->where('CodAut',$request->CodAut)->first();
        while($month <= $end)
        {
//            echo date('y', $month)."----- <br>";
            $query=DB::connection('tasas')
//                ->table('archi'.date('y', $month))
//                ->where('cantidad','like','%'.trim($dat->cantidad).'%')
//                ->where('comun','like','%'.trim($dat->comun).'%');
//                ->orderBy('pagado_en')
                ->select("SELECT * FROM archi".date('y', $month)." WHERE cantidad like '".trim($dat->cantidad)."%' AND comun like '".trim($dat->comun)."%' ORDER BY pagado_en " );
//            echo $query->get();
            if (count($query)>0){
//                echo date('y',$month)."---<br>";
//                array_push($gestiones,['gestion'=>date('Y',$month)]);
                array_push($gestiones,$query[0]);
            }
            $month = strtotime("+1 year", $month);
        }
        return $gestiones;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($comun)
    {
        return DB::table('pm01inmu')->where('comun',$comun)->get();
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
