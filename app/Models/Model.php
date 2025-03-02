<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    use HasFactory;
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = ['maker_id', 'name'];
}
