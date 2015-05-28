<?php
namespace App\Repositories\Seller;

use App\Models\Seller;
use App\Repositories\Base\BaseRepo;

class SellerRepo extends BaseRepo
{
    public function getModel()
    {
        return new Seller();
    }
}