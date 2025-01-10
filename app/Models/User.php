<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use BezhanSalleh\FilamentShield\FilamentShield;
use BezhanSalleh\FilamentShield\Support\Utils;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasPanelShield;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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
    protected static function booted(): void
    {
        if (config('filament-shield.mahasiswa_user.enabled', false)) {
            FilamentShield::createRole(name: config('filament-shield.mahasiswa_user.name', 'mahasiswa_user'));
        }
        static::created(function (User $user) {
            $user->assignRole(config('filament-shield.mahasiswa_user.name', 'mahasiswa_user'));
        });
        static::deleted(function (User $user) {
            $user->assignRole(config('filament-shield.mahasiswa_user.name', 'mahasiswa_user'));
        });
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if($panel->getId() === 'admin'){
            return $this->hasRole(Utils::getSuperAdminName());
        }elseif ($panel->getId() === 'mahasiswa'){
            return $this->hasRole(config('filament-shield.mahasiswa_user.name', 'mahasiswa_user'));
        }else{
            return false;
        }
    }
}
