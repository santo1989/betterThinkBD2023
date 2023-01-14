<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilityDynamic extends Model
{
    use HasFactory;
    protected $table = 'utility_dynamic';
    protected $fillable = [
        'name',
        'description',
        'picture',
        'type_of_placement',
    ];
    
}
