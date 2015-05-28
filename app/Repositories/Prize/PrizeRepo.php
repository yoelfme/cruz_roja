<?php
namespace App\Repositories\Prize;

use App\Models\Prize;
use App\Repositories\Base\BaseRepo;

class PrizeRepo extends BaseRepo
{
    public function getModel()
    {
        return new Prize();
    }
}