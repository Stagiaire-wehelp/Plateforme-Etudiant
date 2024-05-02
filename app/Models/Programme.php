<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    public function ecole(){
        return $this->belongsTo(\App\Models\Ecole::class);
    }

    public function domaineEtude(){
        return $this->hasMany(\App\Models\DomaineEtude::class);
    }
    protected $fillable = [
        'emplacement_geographique',
        'langue_enseignement' ,
                'niveau_etude',
                'nom' ,
                'possibilite_financement' ,
                'duree' ,
                'frais_scolarite' ,
                'ecole_id'
    ];
    use HasFactory;
}
