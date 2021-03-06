<?php

namespace App;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function token()
    {
        return $this->hasOne(UserToken::class);
    }
    
    
    
    protected static function getUserByEmail($value)
    {
        $user = self::where('email', $value)->first();
        
        return $user;
        
    }
    
}
