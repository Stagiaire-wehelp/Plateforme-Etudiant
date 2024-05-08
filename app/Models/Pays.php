<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pays extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titre'];


    public function villes(){
        return $this->hasMany(Ville::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }


}
