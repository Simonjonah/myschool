<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Subject;
use App\Models\User;
class Teacherassign extends Model
{
    use HasFactory;



    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
   
   
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
