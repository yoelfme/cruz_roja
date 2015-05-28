<?php
namespace App\Repositories\Ticket;

use App\Models\Ticket;
use App\Repositories\Base\BaseRepo;

class TicketRepo extends BaseRepo
{
    public function getModel()
    {
        return new Ticket();
    }
}