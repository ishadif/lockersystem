<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password','role_id'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['roles'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public static function boot() 
    {
        parent::boot();

        static::creating(function($staff){
            $staff->password = bcrypt("{$staff->id}@password");
        });
    }

    public function isAdmin() 
    {
        return $this->hasRole('admin');
    }
    

    public function roles() 
    {
        return $this->belongsToMany(Role::class);
    }

    public function assignRole($roleId) 
    {
        return $this->roles()->save(
            Role::findOrFail($roleId)
        );
    }
    
    
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('slug', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }

    public function scopeFilter($query, $filter) 
    {
        return $filter->apply($query);
    }
    
}
