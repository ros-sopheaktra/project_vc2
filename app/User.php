<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Position;
use App\Department;
class User extends Authenticatable
{
    use Notifiable;
 
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function leaves(){
        return $this->hasMany(Leave::class);
    }

    public function leave_requests(){
        return $this->hasMany(LeaveRequest::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }  
    public function position(){
        return $this->belongsTo(Position::class);
    } 

    public function managers()
    {
        return $this->hasMany(User::class, 'manager_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

}
