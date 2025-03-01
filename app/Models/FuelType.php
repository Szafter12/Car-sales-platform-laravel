<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    use HasFactory;

    protected $table = 'fuel_types';
    protected $primaryKey = 'fuel_type_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    const CREATED_AT = 'create_date';
    const UPDATE_AT = 'update_date';
}
