<?php

namespace GES\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'address',
        'cep',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
    ];
}
