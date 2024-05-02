<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomaineEtude extends Model
{   
    
    public function programme(){
        return $this->belongsTo(\App\Models\Programme::class);
    }

    public function sousDomaine(){
        return $this->hasMany(\App\Models\SousDomaine::class);
    }
    protected $fillable = [
        'description',
        'nom',
        'programme_id'
    ];
    use HasFactory;
}
