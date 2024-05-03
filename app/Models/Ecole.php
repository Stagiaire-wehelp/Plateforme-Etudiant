<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{   
    public function programmes(){
        return $this->hasMany(\App\Models\Programme::class);
        }

    public function coupdeProjecteur(){
        return $this->hasOne(\App\Models\CoupDeProjecteur::class);
    }
    public function universitare(){
        return $this->belongsTo(\App\Models\Universitaire::class);
    }
    protected $fillable = [
        'abreviation', 'title','universitaire_id'	
    ];
    use HasFactory;
}
