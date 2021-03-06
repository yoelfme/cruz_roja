<?php
namespace App\Http\Controllers\Admin;

use App\Helpers\FormX;
use App\Repositories\Raffle\RaffleRepo;

class RafflesController extends CRUDController
{
    protected $rules = array(
        'description' => 'required',
        'title' => 'required'
    );

    protected $module = '_raffles';

    function __construct(RaffleRepo $raffleRepo)
    {
        parent::__construct();
        $this->repo = $raffleRepo;
    }

    function fields($data = null)
    {
        if ($data) {
            return FormX::make()
                ->input('title', 'Titulo:', 'Titulo', $data->title)
                ->input('description', 'Descripcion:', 'Descripcion', $data->description);
        } else {
            return FormX::make()
                ->input('title', 'Titulo:', 'Titulo')
                ->input('description', 'Descripcion:', 'Descripcion');
        }
    }


}