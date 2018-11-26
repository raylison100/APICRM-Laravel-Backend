<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class MonitoramentoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = DB::table('providers')
            ->join('providers_status', 'providers.provider_status_id', '=', 'providers_status.id')
            ->groupBy('providers_status.title')
            ->select('providers_status.title', DB::raw("count(providers_status.title) as count"))
            ->get();

        if (count($providers) > 0) {
            return response()->json(['data' => $providers], 200);
        }
        return response()->json(['data' => ['error' => "Status não encontrado !"]], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $providers = DB::table('providers')
            ->join('providers_status', 'providers.provider_status_id', '=', 'providers_status.id')
            ->where("providers_status.title", '=', $id)
            ->groupBy('providers_status.title')
            ->select('providers_status.title', DB::raw("count(providers_status.title) as count"))
            ->get();


        if (count($providers) > 0) {
            return response()->json(['data' => $providers], 200);
        }
        return response()->json(['data' => ['error' => "Status não encontrado !"]], 404);

    }
}
