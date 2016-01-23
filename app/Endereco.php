<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    //
    protected $table    = 'enderecos';
    protected $fillable = [
        'nome',
        'cidade',
        'estado',
        'rua',
        'bairro',
        'numero',
        'cep',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('CodeCommerce\User');
    }
}
