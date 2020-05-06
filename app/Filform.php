<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Filform extends Model
{
    protected $fillable = [
        'name_fill',
        'years',
        'radio',
        'city',
        'numb',
        'email',
        'model',
        'shop',
        'date',
        'app',
    ];
}
