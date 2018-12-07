<?php
/**
 * Created by PhpStorm.
 * User: raylison100
 * Date: 06/12/18
 * Time: 12:37
 */

namespace App\Repositories;

use App\Entities\Providers_Status;
use Prettus\Repository\Eloquent\BaseRepository;

class ProvidersStatusRepository extends BaseRepository
{
    public function model()
    {
        return Providers_Status::class;
    }
}