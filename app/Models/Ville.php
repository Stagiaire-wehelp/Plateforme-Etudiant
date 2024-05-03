<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ville extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titre','pays_id'];

    public function pays(){
        return $this->belongsTo(Pays::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
