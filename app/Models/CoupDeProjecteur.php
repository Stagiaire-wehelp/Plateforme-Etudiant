<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoupDeProjecteur extends Model
{   
    protected $table= 'coup_de_projecteurs';
    public function ecole(){
        return $this->belongsTo(\App\Models\Ecole::class);

    }
    protected $fillable = [
        'description', 'titre','ecole_id'
    ];
    use HasFactory;
}