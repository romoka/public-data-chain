<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Birth extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pid_number', 'certificate_number', 'place_of_birth','hospital_of_birth',
        'father_id_number','mother_id_number','informant_id_number',
        'registrar_id_number','date_of_birth','date_of_issue'
    ];

    public function Person()
    {
        return $this->hasOne('App\Person','id_number','pid_number');
    }
}
