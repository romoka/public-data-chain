<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_number', 'name', 'sex','date_of_birth',
        'passport_number','nationality','photo','id_card_scan','address'
    ];
}
