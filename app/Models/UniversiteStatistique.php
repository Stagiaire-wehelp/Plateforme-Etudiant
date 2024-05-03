<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversiteStatistique extends Model
{
    public function universitare(){
        return $this->belongsTo(\App\Models\Universitaire::class);
    }
    protected $fillable=[
        'date',
        'nbr_visite',
        'universitaire_id'
    ];
    use HasFactory;
}
