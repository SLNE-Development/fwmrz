<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;

    protected $fillable = [
        "name",
        "email",
        "email_verified_at",
        "password",
        "remember_token",
    ];

    protected $hidden = [
        "password",
        "remember_token",
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function getRouteKeyName(): string
    {
        return 'name';
    }

    public function hasPermission(string $permission, ?string $guard = "web", ?Model $model = null): bool
    {
        return $this->getAllPermissions()->contains("*") || $this->hasPermissionTo($permission, $guard);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
