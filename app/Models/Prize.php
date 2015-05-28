<?php
namespace App\Models;

class Prize extends BaseModel
{
    protected $table = 'prizes';

    public $_relations = [
        'raffle'
    ];

    protected $fillable = [
        'id_raffle',
        'order',
        'description'
    ];

    // Relations
    public function raffle()
    {
        return $this->hasOne('App\Models\Raffle', 'id', 'id_raffle');
    }
}