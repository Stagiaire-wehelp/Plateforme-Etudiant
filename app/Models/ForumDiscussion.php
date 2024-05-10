<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumDiscussion extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['titre','contenu','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function commentaires(){
        return $this->hasMany(Commentaire::class);
    }

    public function universitaire(){
        return $this->belongsTo(Universitaire::class);
    }

}
