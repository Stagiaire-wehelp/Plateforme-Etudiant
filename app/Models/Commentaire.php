<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commentaire extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['contenu','user_id','forum_discussion_id'];

    public function users(){
        return $this->hasOne(User::class);
    }
    public function forumdiscussions(){
        return $this->hasOne(ForumDiscussion::class);
    }
}
