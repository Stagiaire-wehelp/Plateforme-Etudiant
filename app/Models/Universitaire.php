<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universitaire extends Model
{
    public function ecoles(){
        return $this->hasMany(\App\Models\Ecole::class);
        }
        public function universiteStatistique(){
            return $this->hasMany(\App\Models\UniversiteStatistique::class);
            }
    
            public function evenements(){
            return $this->hasMany(\App\Models\Evenement::class);
            }
        
            public function offres(){
                return $this->hasMany(\App\Models\Offre::class);
                }
    protected $fillable=[
        'adresse','nom','site_web','type','tel'
    ];
    use HasFactory;
}
