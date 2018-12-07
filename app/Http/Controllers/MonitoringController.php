<?php

namespace App\Http\Controllers;

use App\Services\MonitoringService;



class MonitoringController extends Controller
{

    private $monitoringService;

    function __construct(MonitoringService $monitoring)
    {
        $this->monitoringService = $monitoring;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->monitoringService->getStatusALL();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->monitoringService->getStatusID($id);
    }
}
