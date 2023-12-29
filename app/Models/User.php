<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// тут добавил для ролей
use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

// тут добавил для ролей
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(RoleUser::class, 'role_users');
    }
    
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

    
}
