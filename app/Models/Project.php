<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

 protected $table='projects';
    protected $fillable = [
        'name',
        'db',
        'url',
    ];


    public function tbls(): HasMany
    {
        return $this->hasMany(Tbl::class, 'project_id', 'id');
    }
}
