<?php

namespace CodeCommerce;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','cpf','fone', 'email', 'password','is_admin'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany('CodeCommerce\Order');
    }

    public function enderecos()
    {
            return $this->hasMany('CodeCommerce\Endereco');
    }
}
