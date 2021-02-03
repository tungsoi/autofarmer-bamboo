<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * Table name
     */
    protected $table = "devices";

    /**
     * Fields
     */
    protected $fillable = [
        'imei',
        'action_profile_id',
        'connectivity',
        'token',
        'app_version_name',
        'android_version',
        'android_id',
        'device_name',
        'mac_address',
        'model',
        'status'
    ];

    public function user() {
        return $this->hasOne('App\User', 'token', 'token');
    }

    public function clones() {
        return $this->hasMany('App\Models\DeviceClone', 'device_imei', 'imei');
    }
}
