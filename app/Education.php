<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pid_number', 'level', 'institution','start_date','end_date','grade'
    ];

    public function Person()
    {
        return $this->hasOne('App\Person','id_number','pid_number');
    }
}
