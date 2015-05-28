<?php
namespace App\Models;

class Seller extends BaseModel
{
    protected $table = 'sellers';

    public $_relations = [
        'book'
    ];

    protected $fillable = [
        'name',
        'phone',
        'address',
        'dpi',
        'profit'
    ];

    // Relations
    public function book()
    {
        return $this->hasMany('App\Models\Book', 'id_seller', 'id');
    }
}