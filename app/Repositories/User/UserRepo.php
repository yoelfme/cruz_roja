<?php
namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Base\BaseRepo;

class UserRepo extends BaseRepo
{
    public function getModel()
    {
        return new User();
    }
}