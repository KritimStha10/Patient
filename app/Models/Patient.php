<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Patient extends Model
{
    /** @use HasFactory<\Database\Factories\PatientFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = 'patients';

    protected $fillable = [
        'gender_id',
        'district_id',
        'pality_id',
        'code',
        'name',
        'phone_number',
        'description',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = false;

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function pality()
    {
        return $this->belongsTo(Pality::class);
    }

    public function hubbies()
    {
        return $this->belongsToMany(Hubby::class, 'patient_hubby')->withTimestamps();
    }
}
