<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
class Admin extends Authenticable
{
    use Notifiable;
    protected $fillable = [
        'username',
        'password',
        'name'
    ];

    public function getAuthPassword() {
        return $this->password;
    }

    // mutator for password field
    public function setPasswordAttribute($pass){
        $this->attributes['password'] = Hash::make($pass);
    }

}
