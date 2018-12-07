<?php
/**
 * Created by PhpStorm.
 * User: raylison100
 * Date: 06/12/18
 * Time: 12:08
 */

namespace App\Repositories;


use App\Entities\Providers;

use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\DB;

class ProvidersRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Providers::class;
    }


    public function countStatus()
    {
        return  DB::table('providers')
                ->join('providers_status', 'providers.provider_status_id', '=', 'providers_status.id')
                ->groupBy('providers_status.title')
                ->select('providers_status.title')
                ->selectRaw("count(providers_status.title) as count")
                ->get();
    }

    public function countStatusID($id)
    {
        return DB::table('providers')
            ->join('providers_status', 'providers.provider_status_id', '=', 'providers_status.id')
            ->where("providers_status.title", '=', $id)
            ->groupBy('providers_status.title')
            ->select('providers_status.title', DB::raw("count(providers_status.title) as count"))
            ->get();

    }
}