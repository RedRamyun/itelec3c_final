<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;
    
    protected $table = 'positions';
    protected $primaryKey = 'position_id';
    
    protected $fillable = [
        'position_name',
        'description',
        'created_at',
        'updated_at'
    ];
    
    protected $dates = ['deleted_at'];
}