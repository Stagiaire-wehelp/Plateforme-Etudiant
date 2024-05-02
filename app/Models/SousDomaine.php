<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousDomaine extends Model
{
    
    public function domaineEtude(){
        return $this->belongsTo(\App\Models\DomaineEtude::class);
    }
    protected $fillable = [
        'description',
        'nom',
        'domaine_etude_id'
    ];
    use HasFactory;
}
