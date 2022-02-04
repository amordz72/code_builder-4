<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $table = 'codes';

    protected $fillable = [
        'lw',
        'model',
        'migration',
        'seeder',
        'route',
        'route_api',
        'link',
        'extend',
        'crud',
        'html',
        'tbl_id',
    ];

}
