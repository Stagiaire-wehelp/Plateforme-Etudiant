<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidature extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['choix','diplome', 'lettre_de_motivation','releves_de_notes','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
