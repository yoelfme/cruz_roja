<?php
namespace App\Http\Controllers\Admin;

use App\Helpers\FormX;
use App\Repositories\Seller\SellerRepo;

class SellersController extends CRUDController
{
    protected $rules = array(
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required'
    );

    protected $module = '_sellers';

    function __construct(SellerRepo $repo)
    {
        parent::__construct();
        $this->repo = $repo;
    }

    function fields($data = null)
    {
        if ($data) {
            return FormX::make()
                ->input('name', 'Nombre:', 'Nombre', $data->name)
                ->input('phone', 'Telelefono:', 'Telelefono', $data->name)
                ->input('address', 'Direccion:', 'Direccion', $data->name)
                ->input('dpi', 'DPI:', 'DPI', $data->name);
        } else {
            return FormX::make()
                ->input('name', 'Nombre:', 'Nombre')
                ->input('phone', 'Telelefono:', 'Telelefono')
                ->input('address', 'Direccion:', 'Direccion')
                ->input('dpi', 'DPI:', 'DPI');
        }
    }

}