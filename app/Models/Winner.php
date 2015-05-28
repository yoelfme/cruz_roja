<?php
namespace App\Models;

class Winner extends BaseModel
{
    protected $table = 'winners';

    public $_relations = [
        'ticket',
        'prize'
    ];

    protected $fillable = [
        'id_ticket',
        'id_prize'
    ];

    // Relations
    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket', 'id', 'id_ticket');
    }

    public function prize()
    {
        return $this->hasOne('App\Models\Prize', 'id', 'id_prize');
    }

}