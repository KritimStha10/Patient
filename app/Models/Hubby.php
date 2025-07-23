<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Hubby extends Model
{
    /** @use HasFactory<\Database\Factories\HubbyFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = 'hubbies';

    protected $fillable = [
        'title',
        'key',
        'slug',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = ['slug'];

    public $timestamps = false;

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'patient_hubby')->withTimestamps()->withPivot('created_by','updated_by');
    }
}
