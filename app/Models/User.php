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
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Un utilisateur peut désormais avoir plusieurs rôles (ex: Modo-test + Builder)
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id', 'id', 'id_role');
    }

    /**
     * Vérifie si l'utilisateur a au moins un des rôles donnés.
     * @param int|array $roles
     */
    public function hasRole(int|array $roles): bool
    {
        $roles = is_array($roles) ? $roles : [$roles];
        return $this->roles->pluck('id_role')->intersect($roles)->isNotEmpty();
    }

    // Tous les noms de rôles de l'utilisateur, séparés par une virgule
    public function roleName(): ?string
    {
        $names = $this->roles->pluck('name_role')->filter();
        return $names->isEmpty() ? null : $names->implode(', ');
    }

    // Fait partie du staff dès qu'un rôle autre que "user" (id 1) lui est attribué
    public function isStaff(): bool
    {
        return $this->roles->pluck('id_role')->diff([1])->isNotEmpty();
    }
}
