<?php
namespace App\Repositories\Raffle;

use App\Models\Raffle;
use App\Repositories\Base\BaseRepo;

class RaffleRepo extends BaseRepo
{
    public function getModel()
    {
        return new Raffle();
    }
}