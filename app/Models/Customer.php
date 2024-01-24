<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * @property string $username
 * @property string $password
 */
class Customer extends User
{
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
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
        'password' => 'hashed',
        'role' => 'CUSTOMER'
    ];

    protected static function booted()
    {
        parent::booted();
        static::addGlobalScope('role', function (Builder $builder) {
            $builder->where('role', 'CUSTOMER');
        });
    }
}
