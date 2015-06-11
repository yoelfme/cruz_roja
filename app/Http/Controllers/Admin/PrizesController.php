<?php
namespace App\Http\Controllers\Admin;

use App\Helpers\FormX;
use App\Repositories\Prize\PrizeRepo;

class PrizesController extends CRUDController
{
    protected $rules = array(
        'description' => 'required',
        'id_user' => 'required'
    );

    protected $module = '_prizes';

    function __construct(PrizeRepo $repo)
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