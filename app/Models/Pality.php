<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pality extends Model
{
    /** @use HasFactory<\Database\Factories\PalityFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = 'palities';

    protected $fillable = [
        'district_id',
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

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
