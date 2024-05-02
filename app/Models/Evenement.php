<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    public function universitare(){
        return $this->belongsTo(\App\Models\Universitaire::class);
    }

    protected $fillable = [
        'lieu','statue','universitaire_id'	
    ];
    use HasFactory;
}
