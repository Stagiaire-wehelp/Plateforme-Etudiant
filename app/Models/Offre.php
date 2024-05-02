<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    public function universitare(){
        return $this->belongsTo(\App\Models\Universitaire::class);
    }

    protected $fillable = [
        'description','entreprise','lieu','statue',
        'titre','type_offre','universitaire_id','nbr_places','salaire'
    ];

    use HasFactory;
}
