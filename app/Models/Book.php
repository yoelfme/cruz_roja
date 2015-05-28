<?php
namespace App\Models;

class Book extends BaseModel
{
    protected $table = 'books';

    protected $_relations = [
        'raffle',
        'seller',
        'user'
    ];

    protected $fillable = [
        'id_raffle',
        'id_seller',
        'id_user',
        'quantity',
        'start',
        'end',
        'price',
        'state'
    ];

    // Relations
    public function raffle()
    {
        return $this->hasOne('App\Models\Raffle', 'id', 'id_raffle');
    }

    public function seller()
    {
        return $this->hasOne('App\Models\Seller', 'id', 'id_seller');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}