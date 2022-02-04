<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'lang_id',
        'notes',
        'tag"',
    ];

    public function Lang()
    {
        return $this->hasOne(Lang::class, 'id','lang_id');
    }


    
}
