<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    // Définir les rôles valides comme une énumération
    const ROLES = [
        'administrateur',
        'etudiant',
        'annonceur',
        'responsable_universitaire',
        'manager',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'tel',
        'role',
        'nom_Organization',
        'level',
        'Date_Graduation'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Boot the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Méthode appelée lors de la création d'un nouvel utilisateur
        static::creating(function ($user) {
            // Si le rôle fourni n'est pas valide, utilisez le premier rôle de la liste
            if (!in_array($user->role, self::ROLES)) {
                $user->role = self::ROLES[1];
            }
        });
    }

    /**
     * Get the user's role.
     *
     * @return string|null
     */
    public function getRoleAttribute()
    {
        return $this->attributes['role'];
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }


    public function annonces(){
        return $this->hasMany(Annonce::class);
    }
    public function candidatures(){
        return $this->hasMany(Candidature::class);
    }
}
