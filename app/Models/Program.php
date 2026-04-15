<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';

    protected $primaryKey = 'program_id';

    public $timestamps = false;

    protected $fillable = [
        'code',
        'title',
        'years',
    ];

    protected function casts(): array
    {
        return [
            'years' => 'integer',
        ];
    }
}
