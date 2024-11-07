<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'phone_number',
        'email',
        'password',
        'user_type_id',
        'role_id',
        'active_status',
        'access_status',
        'random_code',
        'notificationToken',
        'language',
        'rtl_ltl',
        'selected_session',
        'can_login',
        'is_administrator',
        'is_registered',
        'device_token',
        'style_id',
        'company_id',
        'created_by',
        'updated_by',
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
        'active_status' => 'boolean',
        'access_status' => 'boolean',
        'is_administrator' => 'boolean',
        'is_registered' => 'boolean',
    ];

    /**
     * Relationships
     */
    
    // Define relationship with UserType
    public function userType()
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    // Define relationship with Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Define relationship with Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Define relationship with the user who created this user
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Define relationship with the user who last updated this user
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Accessor to get the full name by concatenating first and last names.
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}