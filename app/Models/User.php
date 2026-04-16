<?php

namespace PMEexport\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use PMEexport\Notifications\CustomResetPassword;
use PMEexport\Traits\Uuids;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasRoles, Notifiable, SoftDeletes, Uuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
        'department_id',
        'cpf',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     * Get the user's display role name.
     */
    public function tipoUser(): string
    {
        $role = $this->roles->first();

        if (! $role) {
            return 'Utilizador';
        }

        if ($role->id == 8) {
            $parts = explode('_', $role->name);
            return ucwords(strtolower(implode(' ', $parts)));
        }

        return ucwords(strtolower($role->name));
    }

    /**
     * Send the password reset notification.
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new CustomResetPassword([
            'token'      => $token,
            'first_name' => $this->name,
        ]));
    }
}
