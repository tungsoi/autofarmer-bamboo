<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Encore\Admin\Auth\Database\Administrator;

class User extends Administrator
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function devices() {
        return $this->hasMany('App\Models\Device', 'token', 'token');
    }

    public function clones() {
        return $this->hasMany('App\Models\DeviceClone', 'token', 'token');
    }
}
