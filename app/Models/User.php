<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'steam_id',
        'avatar',
        'id_role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relation avec la table roles
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    /**
     * Vérifie si l'utilisateur a un rôle donné ou un des rôles donnés.
     * @param int|array $roles
     */




    public function hasRole(int|array $roles): bool
    {
        if (is_array($roles)) {
            return in_array($this->id_role, $roles);
        }
        return $this->id_role === $roles;
    }

    // Méthode pour récupérer le nom du rôle facilement
    public function roleName(): ?string
    {
        return $this->role?->name_role; // Utilise l'opérateur ?-> pour éviter les erreurs si role est null
    }
}
