<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\Ticket\TicketRepo;
use App\Helpers\FormX;

class TicketsController extends CRUDController
{
    protected $rules = array(
        'description' => 'required',
        'id_user' => 'required'
    );

    protected $module = '_tickets';

    function __construct(TicketRepo $repo)
    {
        parent::__construct();
        $this->repo = $repo;
    }

    function fields($data = null)
    {
        if ($data) {
            return FormX::make()
                ->hidden('id_user', $data->id_user)
                ->input('description', 'Descripcion:', 'Descripcion', $data->description);
        } else {
            return FormX::make()
                ->hidden('id_user', \Auth::id())
                ->input('description', 'Descripcion:', 'Descripcion');
        }
    }
}