<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $with = ['school'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'name',
        'password',
        'email',
        'phone',
        'school_id',
        'photo'
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

    public static function boot()
    {
        parent::boot();
        
        static::saving(function ($user) {
            if ($user->role_id === 2 && (empty($user->phone) || empty($user->school_id))) {
                return false;
            }

            if ($user->role_id === 2) {
                $validator = Validator::make($user->toArray(), [
                    'phone' => 'unique:users,phone,NULL,id,role,2',
                ]);

                if ($validator->fails()) {
                    return false;
                }
            }

            if ($user->role_id === 1 && empty($user->email)) {
                return false;
            }
            
            if ($user->role_id === 1) {
                $validator = Validator::make($user->toArray(), [
                    'email' => 'unique:users,email,NULL,id,role,1',
                ]);

                if ($validator->fails()) {
                    return false;
                }
            }
        });
    }

    public function school(){
        return $this->belongsTo(School::class)->select('id','npsn','name');
    }
}
