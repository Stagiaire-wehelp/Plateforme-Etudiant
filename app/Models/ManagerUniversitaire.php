<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagerUniversitaire extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'user_id',
        'universitaire_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function universitaire()
    {
        return $this->belongsTo(Universitaire::class);
    }
}
