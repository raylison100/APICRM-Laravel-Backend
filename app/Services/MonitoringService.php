<?php
/**
 * Created by PhpStorm.
 * User: raylison100
 * Date: 06/12/18
 * Time: 11:16
 */


namespace App\Services;



use App\Entities\Providers;
use App\Entities\Providers_Status;
use App\Repositories\ProvidersRepository;
use App\Repositories\ProvidersStatusRepository;


/**
 * @property  providersStatusRepository
 */
class MonitoringService

{

    private  $providersRepository;
    private $providersStatusRepository;

    public function __construct(ProvidersRepository $providersRepository,ProvidersStatusRepository $providersStatusRepository )
    {
        $this->providersRepository = $providersRepository;
        $this->providersStatusRepository = $providersStatusRepository;
    }


    public function getStatusALL()
    {
        $providers = $this->providersRepository->countStatus();
        if (count($providers) > 0) {
            return response()->json(['data' => $providers], 200);
        }
        return response()->json(['data' => ['error' => "Status não encontrado !"]], 404);
    }

    public function getStatusID($id)
    {
        $providers = $this->providersRepository->countStatusID($id);

        if (count($providers) > 0) {
            return response()->json(['data' => $providers], 200);
        }
        return response()->json(['data' => ['error' => "Status não encontrado !"]], 404);
    }
}