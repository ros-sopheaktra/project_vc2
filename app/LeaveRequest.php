<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class LeaveRequest extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}