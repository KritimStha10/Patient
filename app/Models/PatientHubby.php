<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientHubby extends Model
{
    protected $table = 'patient_hubby';

    protected $fillable = [
        'patient_id',
        'hubby_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = false;
}
