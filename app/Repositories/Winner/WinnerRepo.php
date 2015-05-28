<?php
namespace App\Repositories\Winner;

use App\Models\Winner;
use App\Repositories\Base\BaseRepo;

class WinnerRepo extends BaseRepo
{
    public function getModel()
    {
        return new Winner();
    }
}