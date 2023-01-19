<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function point()
    {
        return $this->hasOne(Point::class);
    }
}
