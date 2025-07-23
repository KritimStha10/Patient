<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gender extends Model
{
    /** @use HasFactory<\Database\Factories\GenderFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = 'genders';

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
}
