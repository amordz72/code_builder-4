<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_child extends Model
{
      use HasFactory;

      protected $table = 'tbl_children';

    protected $fillable = [
        'name',
        'tbl_id',

    ];

}
