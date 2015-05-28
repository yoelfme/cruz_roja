<?php
namespace App\Models;

class Ticket extends BaseModel
{
    protected $table = 'tickets';

    public $_relations = [
        'book'
    ];

    protected $fillable = [
        'id_book',
        'code',
        'state'
    ];

    // Relations
    public function book()
    {
        return $this->hasOne('App\Models\Book', 'id', 'id_book');
    }

}