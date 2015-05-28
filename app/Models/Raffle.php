<?php
namespace App\Models;

class Raffle extends BaseModel
{
    protected $table = 'raffles';

    public $_relations = [
        'books',
        'prizes'
    ];

    protected $fillable = [
        'title',
        'description',
        'date'
    ];

    // Relations
    public function books()
    {
        return $this->hasMany('App\Models\Book', 'id', 'id_book');
    }

    public function prizes()
    {
        return $this->hasMany('App\Models\Prize', 'id', 'id_prize');
    }
}