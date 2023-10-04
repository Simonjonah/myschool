<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Student extends Model
{
    use HasFactory;

    public function results(): HasMany 
    {
        return $this->hasMany(Result::class);
    }
}