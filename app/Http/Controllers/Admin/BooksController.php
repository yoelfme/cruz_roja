<?php
namespace App\Http\Controllers\Admin;


use App\Repositories\Book\BookRepo;
use App\Helpers\FormX;
use App\Repositories\Raffle\RaffleRepo;
use App\Repositories\Seller\SellerRepo;

class BooksController extends CRUDController
{
    protected $rules = array(
        'description' => 'required',
        'id_user' => 'required'
    );

    protected $module = '_books';

    protected $raffleRepo = null;

    protected $sellerRepo = null;

    function __construct(BookRepo $repo, RaffleRepo $raffleRepo, SellerRepo $sellerRepo)
    {
        parent::__construct();
        $this->repo = $repo;
        $this->raffleRepo = $raffleRepo;
        $this->sellerRepo = $sellerRepo;
    }

    function fields($data = null)
    {
        $raffles = ['0' => 'Seleccione Sorteo'] +  $this->raffleRepo->lists('title');
        $sellers = ['0' => 'Seleccione Vendedor'] + $this->sellerRepo->lists('name');


        if ($data) {
            return FormX::make()
                ->hidden('id_user', $data->id_user)
                ->select('id_raffle','Sorteo:', $raffles, $data->id_raffle)
                ->select('id_seller','Vendedor:',$sellers, $data->id_seller)
                ->input('description', 'Descripcion:', 'Descripcion', $data->description)
                ->input('quantity', 'Cantidad:', 'Cantidad', $data->quantity)
                ->input('start', 'Inicio:', 'Inicio', $data->quantity)
                ->input('end', 'Final:', 'Final', $data->quantity)
                ->input('price', 'Precio:', 'Precio', $data->quantity);
        } else {
            return FormX::make()
                ->hidden('id_user', \Auth::id())
                ->select('id_raffle','Sorteo:', $raffles)
                ->select('id_seller','Vendedor:',$sellers)
                ->input('description', 'Descripcion:', 'Descripcion')
                ->input('quantity', 'Cantidad:', 'Cantidad')
                ->input('start', 'Inicio:', 'Inicio')
                ->input('end', 'Final:', 'Final')
                ->input('price', 'Precio:', 'Precio');
        }
    }
}